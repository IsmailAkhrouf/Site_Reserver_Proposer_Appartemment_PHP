<?php
  class InsertClass {
  private $pdo;

  public function __construct() {
    $this->pdo= new PDO("mysql:host=localhost:3307;dbname=locationline",'root','');
  }
  function insert($id,$name, $mine, $data) {
	   
	   $stmt=$this->pdo->prepare("insert into photos Values (:id,:a1,:a2,:a3)");
	   return $stmt->execute(array(':id'=>$id,':a1'=>$name,'a2'=>$mine,'a3'=>$data));
  }
}
?> 
<?php

function reArrayFiles($file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
    }

?>

<?php
    
$nb=0;
$a="";
$sq='';
session_start(); 
if(isset($_POST['btn'])){
	   $_SESSION['ville']=$_POST['Ville'];
	   $_SESSION['address']=$_POST['address'];
	   $_SESSION['nbch']=$_POST['nbch'];
	   $_SESSION['etage']=$_POST['nbet'];
	   $_SESSION['prixnuit']=$_POST['prixnuit'];
	   
	   if(empty($_SESSION['Nom'])) {
			$_SESSION["nb"]=1;
			header("Location: signin/inscription.php");
			exit();
		}
		if(!empty($_SESSION['Nom'])){
			$nb=1;
		}
	   
}else{
	if($_SESSION["nb"]==1){
		$nb=1;
		$sq='<ul class="nav navbar-right top-nav">          
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" style="color:white; margin-top:4px;"><b>'.$_SESSION["Nom"].'</b></a>
                <ul class="dropdown-menu">
                    <li><a href="signin/Changer.php"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="signin/Logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>';
	}
	
}?>
<?php 
    include 'Notifications/NotificationsClass.php';
	$Notification = new InsertClassNotifications ();
if($nb==1){
	$bdd1=new PDO('mysql:host=localhost:3307;dbname=locationline','root','');
	$stmt1=$bdd1->prepare("select * from appartementproposee where Address=:add and Emailprop=:resr");
	$stmt1->execute(array(':add'=>$_SESSION['address'],':resr'=>$_SESSION["email"]));
	$x=$stmt1->rowCount();
	if($x==0){
	$a='<div class="container-fluid">
			<div class="alert alert-success" role="alert">
				<strong>Proposition Complete !!! </strong><a href="#" class="alert-link"> La proposition est entree avec succes . Vous devriez recevoir un email de confirmation de votre proposition apres un jour au maximum</a>.
			</div>
	</div>';
try{
   $y=uniqid();
   $bdd=new PDO('mysql:host=localhost:3307;dbname=locationline','root','');
   $stmt2=$bdd->prepare("insert into appartementproposee Values (:a1,:a2,:a3,:a4,:a5,:a6,:a7)");
   $stmt2->execute(array(':a1'=>$y,':a2'=>$_SESSION['ville'],':a3'=>$_SESSION['address'],':a4'=>$_SESSION['nbch'],':a5'=>$_SESSION['etage'],':a6'=>$_SESSION['prixnuit'],'a7'=>$_SESSION['email']));
   $obj0=new InsertClass();
	   
	   if(isset($_FILES['myfile1'])){
		  $file_array = reArrayFiles($_FILES['myfile1']);
		  
		
		       for($i=0;$i<count($file_array);$i++){
			     
                 $obj0->insert($y,$file_array[$i]['name'],$file_array[$i]['type'], file_get_contents($file_array[$i]['tmp_name']));
			   }
	   }  
	$nid = uniqid('no');
	$sujet="Proposition";
	$objet="Appartement";
	$Date=date("Y-m-d H:i:s");
	$email=$_SESSION["email"];
	$nom=$_SESSION['Nom'];   
	$Notification->insert_notifications($nid,$sujet,$objet,$Date,$email,$nom); 
}catch(Exception $e){
	   exit(); 
}
	}else{
		$a='<div class="container-fluid">
			<div class="alert alert-success" role="alert">
				<strong>Reservation Incomplete !!! </strong> <a href="#" class="alert-link">Erreur:La proposition est deja entrer </a>.
			</div>
	    </div>';
	}
}
?>
<doctype!>
<html>
<head>
<title>LE CATALOGUE</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style12.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<?php include 'inheader.php';?>
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

<?php echo $sq;?>

</div>
</nav>
<?php if($nb==1){ echo $a;}
?>
<?php include_once 'infooter.php';?>
</div>
</body>
</html>
