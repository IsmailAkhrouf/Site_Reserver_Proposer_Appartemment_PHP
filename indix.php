<?php  
$sq="";
$nb=0;
    if(!isset($_SESSION)) {
	  session_start();  
	if(empty($_SESSION['Nom'])) {
		
		 $sq='<ul class="nav navbar-nav navbar-right">
			  <li><a href="signin/inscription.php"><span class="glyphicon glyphicon-user"></span>Inscription</a></li>
			  <li><a href="signin/connection.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
			  </ul>';
	}
	if(!empty($_SESSION['Nom'])){
	 $nb++;
	 $sq='<ul class="nav navbar-right top-nav">          
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" style="color:white; margin-top:4px;"><b>'.$_SESSION["Nom"].'</b></a>
                <ul class="dropdown-menu" style="background-color:white;">
                    <li><a href="signin/Changer.php"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="signin/Logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>';
	}
 }
?>
<!doctype>
<html>
<head>
<title>Le Meilleur Site Reservation Des Appartements au Maroc</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style12.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	
	
	
    <style type="text/css">
	.panel-body{
		height:100%;
		height:auto;
	}
	.p1 {
	padding-bottom:200px;
}
@media only screen and (max-width: 768px) {
	panel-body{
		padding-bottom:0;
	}
}
#mesReservations{
	min-height:200px;
}
#mesProposer{
	min-height:200px;
}

.top-nav {
    padding: 0 15px;
}

.top-nav>li {
    display: inline-block;
    float: left;
}

.top-nav>li>a {
    padding-top: 20px;
    padding-bottom: 20px;
    line-height: 20px;
    color: white;
}

.top-nav>li>a:hover,
.top-nav>li>a:focus,
.top-nav>.open>a,
.top-nav>.open>a:hover,
.top-nav>.open>a:focus {

    background-color: black ;
}


.top-nav>.open>.dropdown-menu {
    float: left;
    position: absolute;
    margin-top: 0;
    /*border: 1px solid rgba(0,0,0,.15);*/
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    background-color: purple;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.top-nav>.open>.dropdown-menu>li>a {
    white-space: normal;
	color:black;
}
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
.dropdown-menu{
	background:none;
	background-color:none;
}
footer.nb-footer {
background: #222;
border-top: 4px solid #b78c33; }
footer.nb-footer .about {
margin: 0 auto;
margin-top: 40px;
max-width: 1170px;
text-align: center; }
footer.nb-footer .about p {
font-size: 13px;
color: #999;
margin-top: 30px; }
footer.nb-footer .about .social-media {
margin-top: 15px; }
footer.nb-footer .about .social-media ul li a {	
display: inline-block;
width: 45px;
height: 45px;
line-height: 45px;
border-radius: 50%;
font-size: 16px;
color: #b78c33;
border: 1px solid rgba(255, 255, 255, 0.3); }
footer.nb-footer .about .social-media ul li a:hover {
background: #b78c33;
color: #fff;
border-color: #b78c33; }
footer.nb-footer .footer-info-single {
margin-top: 30px; }
footer.nb-footer .footer-info-single .title {
color: #aaa;
text-transform: uppercase;
font-size: 16px;
border-left: 4px solid #b78c33;
padding-left: 5px; }
footer.nb-footer .footer-info-single ul li a {
display: block;
color: #aaa;
padding: 2px 0;
 }
footer.nb-footer .footer-info-single ul li a:hover {
color: #b78c33; }
footer.nb-footer .footer-info-single p {
font-size: 13px;
line-height: 20px;
color: #aaa; }
footer.nb-footer .copyright {
margin-top: 15px;
background: #111;
padding: 7px 0;
color: #999; }
footer.nb-footer .copyright p {
margin: 0;
padding: 0; }
</style>
   
</head>

<body>
<div class="bg">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<ul class="nav navbar-nav">
<li><a href="indix.php">LocationLine</a></li>
<li><a href="indix.php">Home</a></li>
<li><a href="FAQ.php">Aide</a></li>
</ul>

<?php echo $sq; ?>

</div>
</nav>
   <div class="panel-body p1" >
        <ul class="nav responsive nav-tabs" id="tabNav">
            <li class="active" data-placement="bottom" data-toggle="tooltip" ><a href="#Louer" data-toggle="tab"><div>Louer</div></a></li>
            <li data-placement="bottom" data-toggle="tooltip" ><a href="#Proposer" data-toggle="tab"><div>Proposer</div></a></li>
			<?php if($nb>0){ echo '<li data-placement="bottom" data-toggle="tooltip" ><a href="#mesProposer" data-toggle="tab"><div>Mes Propositions</div></a></li>'; 
			                echo '<li data-placement="bottom" data-toggle="tooltip" ><a href="#mesReservations" data-toggle="tab"><div>Mes Reservations</div></a></li>'; } ?>
            </ul>
  <div class="tab-content responsive">
<form action="Reserver.php" method="post" id="Louer" class="tab-pane active" role="tabpanel" aria-labelledby="nav-home-tab">
<div class="mot2"><h2>Réservez des hébergements</h2></div></br>
<div class="form-row" >
    <div class="form-group col-lg-3"  >
      <label for="Ville1"><h4><b>Ville</b></h4></label>
      <input type="text" class="form-control" id="Ville1"  name="localitation" placeholder="Dans quelle ville?">
    </div>
    <div class="form-group col-lg-3">  
       <label for="Ville"><h4><b>Arrive</b></h4></label>	
       <input type="text" id="datepicker" name="arrivee" class="form-control"/>  
       <script>
           
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
       </script> 
    </div>
	 <div class="form-group col-lg-3" >  
       <label for="Ville"><h4><b>Depart</b></h4></label>	
       <input type="text" id="datepicker1" name="depart" class="form-control"/>  
       <script>
           
        $('#datepicker1').datepicker({
            uiLibrary: 'bootstrap'
        });
       </script> 
    </div> 
	<div class="form-group col-lg-3"  >
	<label for="vacance"><h4><b>Vacanciers</b></h4></label>
    <div class="dropdown form-control ">
  <span data-toggle="dropdown" id="label1"></span>
  <span class="caret caret1"></span></button>
  <ul class="dropdown-menu form-control drop">
    <li class="form-control button" style="text-align:center;">
						<div class="qty mt-5">
						<b>Adultes</b>
                        <span class="minus1 bg-dark">-</span>
                        <input type="text" class="karil1" name="adultes" id="adultes" value="0"/>
                        <span class="plus1 bg-dark">+</span>
                    </div></li>
    <li class="form-control button" style="text-align:center;">
						<div class="qty mt-5"><b>Enfants</b>
                        <span class="minus bg-dark">-</span>
                        <input type="text" class="karil" name="enfants" id="enfants" value="0"/>
                        <span class="plus bg-dark">+</span>
                    </div></li></li>
  </ul>
</div>  
</div>
</div>
<button type="submit" class="btn" name="btn">Envoyer</button>
</form>
<form id="Proposer" class="tab-pane" role="tabpanel" aria-labelledby="nav-profile-tab" action="Proposer.php" method="post" enctype="multipart/form-data">
<div class="mot2"><h2>Proposer des hébergements</h2></div></br>
<div class="form-row">
    <div class="form-group col-lg-2">
      <label for="Ville"><h4><b>Ville</b></h4></label>
      <input type="text" class="form-control" id="Ville" name="Ville" placeholder="Dans quelle ville?">
    </div>
	<div class="form-group col-lg-2">
      <label for="address"><h4><b>Address</b></h4></label>
      <input type="text" class="form-control" id="address" name="address"placeholder="Dans quelle address?">
    </div>
	<div class="form-group col-lg-2">
	<label for="nbch"><h4><b>NombreChambre</b></h4></label>
    <input type="number" class="form-control" placeholder="Quelle est le nombre de chambre?" 
	name="nbch" id="nbch" required>
	</div>  
	<div class="form-group col-lg-2">
	<label for="nbet"><h4><b>NombreEtage</b></h4></label>
    <input type="number" class="form-control" placeholder="Quelle est le nombre des etages?" name="nbet" id="nbet" required>
	</div><div class="form-group col-lg-2">
	<label for="myfile"><h4><b>Images</b></h4></label>
    <input type="file" class="form-control"placeholder="Donnez moi des images d'appartement?" name="myfile1[]" id="myfile" multiple="" required>
	</div>
    <div class="form-group col-lg-2">
	<label for="prixnuit"><h4><b>PrixNuit</b></h4></label>
    <input type="number" class="form-control"placeholder="Quelle est le prix de nuit?" name="prixnuit" id="prixnuit"required>
	</div>
</div>
<button type="submit" class="btn" name="btn">Envoyer</button>
</form>
<?php if($nb>0){ 
try{
	$dsn = "mysql:host=localhost:3307;dbname=locationline";
	$user = "root";
	$passwd = "";
	$pdo = new PDO($dsn, $user, $passwd);
	$stmt1 = $pdo->prepare("(select idAppartement,ville,address,Nbrchambre,Nbretage,prixnuit,'pendu' as etat
							from appartementproposee,client
							where client.email=:email and client.email=appartementproposee.email 
							and appartementproposee.idAppartement not in ( 
								select idAppartement from appartement )
							)UNION(
							select idAppartement,ville,address,Nbrchambre,Nbretage,prixnuit,'accepter' as etat
							from appartement,client
							where client.email=:email and client.email=appartement.emailprop
							and appartement.idAppartement not in ( 
								select idAppartement from appartementproposee)
                            and appartement.idAppartement not in ( 
                                select idAppartement from reservation 
                                where day(reservation.depart) > day(now())
                                and day(reservation.arrivee) < day(now())
                            )
							)UNION(
							select idAppartement,ville,address,Nbrchambre,Nbretage,prixnuit,'reserver' as etat
							from appartement,client
							where client.email=:email and client.email=appartement.emailprop
							and appartement.idAppartement in (
                             select idAppartement from reservation 
                                where day(reservation.depart) > day(now())
                                and day(reservation.arrivee) < day(now())
                            )
							)");
	echo'<div id="mesProposer" class="tab-pane" role="tabpanel" aria-labelledby="nav-profile-tab">';
	$stmt1->execute(array('email'=>$_SESSION["email"]));
	while($version = $stmt1->fetch()){
	if($version["etat"]=='pendu' || $version["etat"]=='reserver'){
		echo'<div class="form-row" >
		<div class="panel panel-primary">
		<div class="panel-heading">Appartement '.$version["address"].' '.$version["ville"].'</div>
		<div class="panel-body">Id de votre Proposition : '.$version["idAppartement"].'<br>Etat : <span style="color:blue;">'.$version["etat"].'</span></div>
		</div>
		</div>';
	}
	if($version["etat"]=='accepter'){
		echo '<form action="annulation/Supprimer_proposition.php" method="get">
			 <input type="hidden" value="'.$version["idAppartement"].'" name="idAppartement" />';
		echo'<div class="form-row" >
		<div class="panel panel-primary">
		<div class="panel-heading">Appartement '.$version["address"].' '.$version["ville"].'</div>
		<div class="panel-body">Id de votre Proposition : '.$version["idAppartement"].'<br>Etat : <span style="color:red;">'.$version["etat"].'</span></div>
		</div><button type="submit" class="btn" name="btn">Supprimer</button>
		
		</div></form>
		';
	}
	}
	echo '</div>';
	}catch(Exception $e){
		exit();
	}
 try{
	$dsn = "mysql:host=localhost:3307;dbname=locationline";
	$user = "root";
	$passwd = "";
	$pdo = new PDO($dsn, $user, $passwd);
	$stmt2 = $pdo->prepare("(select idReservation,reservation.idAppartement,emailreser,NbrVacanciers,reservation.Ville,address,arrivee,depart,'termine' as etat
							from reservation,client,appartement
							where client.email=:email and client.email=reservation.Emailreser
							and day(reservation.depart) < day(now()) and month(reservation.depart) <= month(now()) and year(reservation.depart) <= year(now())
 							and appartement.idAppartement=reservation.idAppartement
							and reservation.idReservation not in (
                             select idReservation
							 from confirmationreservation,client
							 where client.email=:email and client.email=confirmationreservation.Emailreser
                            )
						 )UNION
                         (select idReservation,reservation.idAppartement,emailreser,NbrVacanciers,reservation.Ville,address,arrivee,depart,'encours' as etat
							from reservation,client,appartement
							where client.email=:email and client.email=reservation.Emailreser
							and day(reservation.depart) > day(now()) and month(reservation.depart) >= month(now()) and year(reservation.depart) >= year(now())
                            and day(reservation.arrivee) < day(now()) and month(reservation.arrivee) <= month(now()) and year(reservation.arrivee) <= year(now())
                          	and appartement.idAppartement=reservation.idAppartement
							and reservation.idReservation not in (
                             select idReservation
							 from confirmationreservation,client
							 where client.email=:email and client.email=confirmationreservation.Emailreser
                            )
						  )UNION(
							select idReservation,confirmationreservation.idAppartement,emailreser,NbrVacanciers,confirmationreservation.Ville,address,arrivee,depart,'pendu' as etat
							from confirmationreservation,client,appartement
							where client.email=:email and client.email=confirmationreservation.Emailreser
                            and appartement.idAppartement=confirmationreservation.idAppartement
							and confirmationreservation.idReservation not in (
                             select idReservation
							 from reservation,client
							 where client.email=:email and client.email=reservation.Emailreser
                            )
							)UNION
							(select idReservation,reservation.idAppartement,emailreser,NbrVacanciers,reservation.Ville,address,arrivee,depart,'accepter' as etat
							from reservation,client,appartement
							where client.email=:email and client.email=reservation.Emailreser
							and (day(reservation.arrivee) <= day(now()) or day(reservation.arrivee) >= day(now())) and month(reservation.arrivee) >= month(now()) and year(reservation.arrivee) >= year(now())
 							and appartement.idAppartement=reservation.idAppartement
							and reservation.idReservation not in (
                             select idReservation
							 from confirmationreservation,client
							 where client.email=:email and client.email=confirmationreservation.Emailreser
                            )
						 )");
	echo'<div id="mesReservations" class="tab-pane" role="tabpanel" aria-labelledby="nav-profile-tab">';
	$stmt2->execute(array('email'=>$_SESSION["email"]));
	while($version = $stmt2->fetch()){
	if($version["etat"]=='pendu' || $version["etat"]=='termine' || $version["etat"]=='encours'){
		echo'<div class="form-row" >
		<div class="panel panel-primary">
		<div class="panel-heading">Appartement '.$version["address"].' '.$version["Ville"].'</div>
		<div class="panel-body">Id de votre Reservation : '.$version["idReservation"].'<br>Etat : <span style="color:yellow;">'.$version["etat"].'</span><br>NbrVacanciers : '.$version["NbrVacanciers"].'<br>Arrivee : '.$version["arrivee"].'<br>Depart : '.$version["depart"].'<br></div>
		</div>
		</div>';
	}
	if($version["etat"]=='accepter'){
		echo '<form action="annulation/Supprimer_reservation.php" action="get">
			 <input type="hidden" value="'.$version["idReservation"].'" name="idReservation" />
			 <input type="hidden" value="'.$version["idAppartement"].'" name="idAppartement" />';
		echo'<div class="form-row" >
		<div class="panel panel-primary">
		<div class="panel-heading">Appartement '.$version["address"].' '.$version["Ville"].'</div>
		<div class="panel-body">Id de votre Reservation : '.$version["idReservation"].'<br>Etat : <span style="color:yellow;">'.$version["etat"].'</span><br>NbrVacanciers : '.$version["NbrVacanciers"].'<br>Arrivee : '.$version["arrivee"].'<br>Depart : '.$version["depart"].'<br></div>
		</div><button type="submit" class="btn" name="btn">Supprimer</button>
		
		</div></form>
		';
	}
	
	}
	echo '</div>';
	}catch(Exception $e){
		exit();
	}
}?>
</div>
</div>
<?php include 'infooter.php';?>
</div>
</body>
<script>
$(document).ready(function(){
	var adultes = parseInt(document.getElementById('adultes').value);
	var enfants = parseInt(document.getElementById('enfants').value);
	var total = adultes + enfants;
	document.getElementById('label1').innerHTML =  total+' Voyageurs ( '+ adultes +' enfants + ' + adultes+ ' adultes )';
	$(document).on('click','.plus1',function(){
				$('#adultes').val(parseInt($('#adultes').val()) + 1 );
		if(adultes >=0 && enfants >=0){
			var total = parseInt($('#adultes').val() , 10) + parseInt($('#enfants').val() , 10);
			document.getElementById('label1').innerHTML =  total+' Voyageurs ( '+$('#enfants').val()+' enfants + ' +$('#adultes').val()+ ' adultes )';
		}
    		});
    $(document).on('click','.minus1',function(){
    			$('#adultes').val(parseInt($('#adultes').val()) - 1 );
    				if ($('#adultes').val() == 0) {
						$('#adultes').val(1);
					}
		if(adultes >=0 && enfants >=0){
			var total = parseInt($('#adultes').val() , 10) + parseInt($('#enfants').val() , 10);
			document.getElementById('label1').innerHTML =  total+' Voyageurs ( '+$('#enfants').val()+' enfants + ' +$('#adultes').val()+ ' adultes )';
		}
    });
	$(document).on('click','.minus',function(){
    			$('#enfants').val(parseInt($('#enfants').val()) - 1 );
    				if ($('#enfants').val() == 0) {
						$('#enfants').val(1);
					}
		if(adultes >=0 && enfants >=0){
			var total = parseInt($('#adultes').val() , 10) + parseInt($('#enfants').val() , 10);
			document.getElementById('label1').innerHTML =  total+' Voyageurs ( '+$('#enfants').val()+' enfants + ' +$('#adultes').val()+ ' adultes )';
		}
    });
	$(document).on('click','.plus',function(){
				$('#enfants').val(parseInt($('#enfants').val()) + 1 );
		if(adultes >=0 && enfants >=0){
			var total = parseInt($('#adultes').val() , 10) + parseInt($('#enfants').val() , 10);
			document.getElementById('label1').innerHTML =  total+' Voyageurs ( '+$('#enfants').val()+' enfants + ' +$('#adultes').val()+ ' adultes )';
		}
	});
	$('#adultes , #enfants ').on('change paste keyup input click', function(){
		alert($('#adultes').val());
		if(adultes >=0 && enfants >=0){
			var total = parseInt($('#adultes').val() , 10) + parseInt($('#enfants').val() , 10);
			document.getElementById('label1').innerHTML =  total+' Voyageurs ( '+$('#enfants').val()+' enfants + ' +$('#adultes').val()+ ' adultes )';
		}
	});
	$('.button').on('click', function(){
		$(".drop").css("display","table");
	});

	$(".caret1 , #label1 ").on("click",function(){
		$(".drop").toggle();
	});
})
</script>
</html>


