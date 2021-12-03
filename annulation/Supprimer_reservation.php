<?php
$nb=0;
$sq="";
$s='';
session_start(); 
if(isset($_POST['btn'])){
		if(!empty($_SESSION['Nom'])){
			$nb=1;
		}
	   
}else{
		$nb=1;
		$sq='<ul class="nav navbar-right top-nav">          
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" style="color:white; margin-top:4px;"><b>'.$_SESSION["Nom"].'</b></a>
                <ul class="dropdown-menu">
                    <li><a href="../signin/Changer.php"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="../signin/Logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>';
	}
	
?>
<?php 
    include '../Notifications/NotificationsClass.php';
	$Notification = new InsertClassNotifications ();
if($nb==1){
try{
   $bdd=new PDO('mysql:host=localhost:3307;dbname=locationline','root','');
   $stmt1=$bdd->prepare("select * from annulereservation where idAppartement=:id");
   $stmt1->execute(array(':id'=>$_GET['idAppartement']));
   if($stmt1->rowCount()==0){
   $stmt=$bdd->prepare("insert into annulereservation Values (?,?,?)");
	   $stmt->bindParam(1,$_GET['idAppartement']);
	   $stmt->bindParam(2,$_SESSION['email']);
	   $stmt->bindParam(3,$_GET['idReservation']);
	   $stmt->execute();
	   $nid = uniqid('no');
	   $sujet="Demande Annulation Reservation";
	   $objet="Appartement";
	   $Date=date("Y-m-d H:i:s");
	   $email=$_SESSION["email"];
	   $nom=$_SESSION['Nom'];
	   $Notification->insert_notifications($nid,$sujet,$objet,$Date,$email,$nom); 
	$s='<div class="container-fluid">
			<div class="alert alert-success" role="alert">
				<strong>Demande Annulation Reservation Complete !!! </strong>  <a href="#" class="alert-link"> La demande  est entree avec succes . Vous devriez recevoir un email de confirmation de votre demande apres un jour au maximum.</a>.
				<a href="../indix.php">Retour Accueil</a>
			</div>
    </div>';
   }else{
	   $s='<div class="container-fluid">
			<div class="alert alert-success" role="alert">
				<strong>Demande Annulation Reservation Incomplete !!! </strong>  <a href="#" class="alert-link">Vous ne pouvez pas refaire la demande de annulation </a>
				<a href="../indix.php">Retour Accueil</a>
			</div>
    </div>';
   }
}catch(Exception $e){
	   exit();
} 
}
?>
<doctype!>
<html>
<head>
<title>LE CATALOGUE</title>


<link rel="stylesheet" href="../style13.css"/>
<?php include '../inheader.php';?>
<style>
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
    color: #fff;
    background-color: purple ;
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
footer.nb-footer {
margin-top: 400px;
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
<li><a href="../indix.php">LocationLine</a></li>
<li><a href="../indix.php">Home</a></li>
<li><a href="../FAQ.php">Aide</a></li>
</ul>
<?php  if($nb==1){echo $sq;}?>

</div>
</nav>
<?php if($nb==1){ echo $s;}
?>
<?php include_once '../Footer/footer.php';?>
</div>

</body>
</html>
