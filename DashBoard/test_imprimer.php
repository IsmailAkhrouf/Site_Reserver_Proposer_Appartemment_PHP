<?php
  include_once '../PHPMailer/email.php';
	$email= new email();
  require'dompdf/autoload.inc.php'; 
  use Dompdf\Dompdf;
	try{
		$dsn = "mysql:host=localhost:3307;dbname=locationline";
		$user = "root";
		$passwd = "";
		$pdo = new PDO($dsn, $user, $passwd);
	}catch(Exception $e){
		exit();
	}

  $pdf= new Dompdf();
  //if(isset($_GET['imprimer'])){
  $stmt= $pdo->prepare("SELECT appartement.idAppartement,appartement.ville,address,Nbrchambre,Nbretage,prixnuit,
  reservation.idReservation,emailreser,NbrVacanciers,arrivee,depart from appartement ,reservation 
  where reservation.idReservation=:id and reservation.idAppartement=appartement.idAppartement");
  $stmt->execute(array(':id'=>$_GET['idReservation']));  
  $output="
<style>
.section{margin-bottom:70px;text-align:justify;}
.sec-gauche{float:left;font-weight:bold;font-size:19px;margin-top:30px;color:white;margin-left:30px;}
.sec-droite{margin-left:300px;margin-top:22px;margin-bottom:70px;}
h2{text-align:center;border:1px solid yellow;color:yellow;
text-transform:uppercase;font-size:28px;color:yellow;}
gauche{font-weight:normal;font-style:italic;font-size:16px;}
.droite{font-weight:bold;font-size:20px;color:white;}
#comp-droite p{margin-bottom:23px;}
#Total {border:1px solid yellow;}
.MOT{text-align:center;}
h1{font-size:28px;color:yellow;}
body{background:black;}
</style>
  ";
  while($row = $stmt->fetch()){
	$address=$row['address'];
	$ville=$row['ville'];
	$Nbrchambre=$row['Nbrchambre'];
	$Nbretage=$row['Nbretage'];
	$idAppartement=$row['idAppartement'];
	$idReservation=$row['idReservation'];
	$arrivee=$row['arrivee'];
	$depart=$row['depart'];
	$NbrVacanciers=$row['NbrVacanciers'];
	$emailreser=$row['emailreser'];
	
	$arriveeday=strtotime($arrivee);
	$arriveeday=date("d", $arriveeday);
	$departday=strtotime($depart);
	$departday=date("d", $departday);
	$arriveemonth=strtotime($arrivee);
	$arriveemonth=date("m", $arriveemonth);
	$departmonth=strtotime($depart);
	$departmonth=date("m", $departmonth);
	if($departday > $arriveeday && $arriveemonth==$departmonth ){
		$nbjours=$departday - $arriveeday;
	}
	if($arriveemonth < $departmonth ){
		$nbjours=$departday + 30 - $arriveeday;
	}
	$prixnuit=$row['prixnuit'];
	$produit=$prixnuit*$nbjours;
	$Frais_Menage=50;
	$Frais_Service=50;
	$Total=$produit+$Frais_Menage+$Frais_Service;
	
}
    $output.='
	<body>

<header>
<div class="MOT">
<p><h1>Tarif Reservation:</h1></p>
</div>
</header>
<div class="section">
<h2><b>Informations Appartement</b></h2>
<div class="sec-gauche" >
<p><span class="gauche">Adresse:</p><br>
<p><span class="gauche">Ville:</p><br>
<p><span class="gauche">Nombre Chambre:</p><br>
<p><span class="gauche">Nombre Etage:</p><br>
<p><span class="gauche">ID Appartement:</p>
</div>
<div class="sec-droite" id="comp-droite">
<p><span class="droite">'.$address.' </span></p><br>
<p><span class="droite">'.$ville.'</span></p><br>
<p><span class="droite">'.$Nbrchambre.'</span></p><br>
<p><span class="droite">'.$Nbretage.'</span></p><br>
<p><span class="droite">'.$idAppartement.'</span></p>
</div>
</div>
<div class="section">
<h2><b>Information Reservation:</b></h2>
<div class="sec-gauche" >
<p><span class="gauche">ID Reservation:</p><br>
<p><span class="gauche">Date Arrivee:</p><br>
<p><span class="gauche">Date Depart:</p><br>
<p><span class="gauche">Nombre Vacanciers:</p><br>
<p><span class="gauche">Email Reservation:</p>
</div>
<div class="sec-droite" id="comp-droite">
<p><span class="droite">'.$idReservation.'</span></p><br>
<p><span class="droite">'.$arrivee.'</span></p><br>
<p><span class="droite">'.$depart.'</span></p><br>
<p><span class="droite">'.$NbrVacanciers.'</span></p><br>
<p><span class="droite">'.$emailreser.'</span></p>
</div>
</div>
<div class="section">
<h2><b>Prix:</b></h2>
<div class="sec-gauche" >
<p><span class="gauche">'.$prixnuit.'DH X '.$nbjours.'(nuits)</p><br>
<p><span class="gauche">Frais Menage:</p><br>
<p><span class="gauche">Frais Service:</p><br>
<p><span class="gauche">Total:</p>

</div>
<div class="sec-droite" id="comp-droite">
<p><span class="droite">'.$produit.'DH</span></p><br>
<p><span class="droite">'.$Frais_Menage.'DH</span></p><br>
<p><span class="droite">'.$Frais_Service.'DH</span></p><br>
<p><span class="droite" id="Total">'.$Total.'DH</span></p>
</div>
</div>
</body>
';
$pdf->loadHtml($output); 
$pdf->setPaper('A4','landscape');
$pdf->render();
$file=$pdf->output();
 file_put_contents("tarif.pdf", $file);
 $email->sendpdf($emailreser,'Chere Client','tarif.pdf');
 $pdf->stream('Tarif_Reservation.pdf',array('Attachment'=>0));
?>