<?php 
    include '../PHPMailer/email.php';
	$email = new email();
					try{
		              $pdo=new PDO('mysql:host=localhost:3307;dbname=locationline','root','');
					  if(isset($_GET["btn"])){
						  $stmt = $pdo->prepare("SELECT * FROM confirmationreservation where idReservation=:id");
						  $stmt->execute(array(':id'=>$_GET['idReservation'])); 
						  while($row=$stmt->fetch()){
						     
                       $stmt1=$pdo->prepare("INSERT INTO reservation
					   VALUES (:id,:id1,:arrivee,:depart,:ville,:NbrVacan,:Emailreser)");
                       $stmt1->execute(array(':id1'=>$row['idAppartement'],':arrivee'=>$row['arrivee'],':depart'=>$row['depart']
					   ,':ville'=>$row['Ville'],':NbrVacan'=>$row['NbrVacanciers'],':Emailreser'=>$row['Emailreser'],':id'=>$_GET['idReservation']));
				      $email->confirmation_reservation($row['Emailreser'],$_GET['idReservation'],'Chere Client');
					}
			   
						$stmt2 = $pdo->prepare("delete FROM confirmationreservation where idReservation=:id ");
						$stmt2->execute(array(':id'=>$_GET['idReservation']));
						   header("location:Valider.php");
					}elseif(isset($_GET['btn1'])){
					   $stmt2=$pdo->prepare("delete from confirmationreservation where idReservation=:id");
                       $stmt2->execute(array(':id'=>$_GET['idReservation']));
					   header("location:Valider.php");
                    }  
			       
                    }
                    catch(Exception $e){
	                 exit();
                    }
					?>