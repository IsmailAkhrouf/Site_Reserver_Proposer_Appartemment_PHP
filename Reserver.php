<?php
function make_slide_indicators($pdo,$id)
{
 $output = ''; 
 $count = 0;
 $stmt=$pdo->prepare("select name,mine,data from photos where idAppartement=:id");
 $stmt->execute(array(':id'=>$id));
 while($row1=$stmt->fetch())
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#show'.$id.'" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#show'.$id.'" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($pdo,$id)
{
 $output = '';
 $count = 0;
 $stmt=$pdo->prepare("select name,mine,data from photos where idAppartement=:id");
 $stmt->execute(array(':id'=>$id));
 while($row1=$stmt->fetch())
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="data:'.$row1['mine'].';base64,'.base64_encode($row1['data']).'" width="300" height="100" class="card-img-top"/>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>
<?php  
$sq="";

    if(!isset($_SESSION)) {
	  session_start();  
	if(empty($_SESSION['Nom'])) {
		 $sq='<ul class="nav navbar-nav navbar-right">
			  <li><a href="signin/inscription.php"><span class="glyphicon glyphicon-user"></span>Inscription</a></li>
			  <li><a href="signin/connection.php"><span class="glyphicon glyphicon-log-in"></span> Connection</a></li>
			  </ul>';
	}
	if(!empty($_SESSION['Nom'])){
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
 }
?>
<doctype!>
<html>
<head>
<title>LE CATALOGUE</title>

<style>

h5 {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
    margin: 0;
}

.card {
    font-size: 1em;
    overflow: hidden;
    padding: 0;
    border: none;
    border-radius: .28571429rem;
    box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
	
}

.card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;
}

.card-img-top {
    
    width: 100%;
    height: auto;
}

.card-title {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
}

.card-text {
    clear: both;
    margin-top: .5em;
    color: rgba(0, 0, 0, .68);
}

.card-footer {
    font-size: 1em;
    position: static;
    top: 0;
    left: 0;
    max-width: 100%;
    padding: .75em 1em;
    color: rgba(0, 0, 0, .4);
    border-top: 1px solid rgba(0, 0, 0, .05) !important;
    background: #fff;
}

.card-inverse .btn {
    border: 1px solid rgba(0, 0, 0, .05);
}

.profile {
    position: absolute;
    top: -12px;
    display: inline-block;
    overflow: hidden;
    box-sizing: border-box;
    width: 25px;
    height: 25px;
    margin: 0;
    border: 1px solid #fff;
    border-radius: 50%;
}

.profile-avatar {
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 50%;
}

.profile-inline {
    position: relative;
    top: 0;
    display: inline-block;
}

.profile-inline ~ .card-title {
    display: inline-block;
    margin-left: 4px;
    vertical-align: top;
}

.text-bold {
    font-weight: 700;
}
#show{
		
		 width:auto;
		 

	}
a.right carousel-control{margin-left:50px;}
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
<?php include 'inheader.php';?>

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

<div class="container-fluid">
 <div class="row">
<?php
   try{
   $bdd1=new PDO('mysql:host=localhost:3307;dbname=locationline','root','');
   if(isset($_POST['btn'])){
	   $ville1=$_POST['localitation'];
	   $arrivee=$_POST['arrivee'];
	   $depart=$_POST['depart'];
	   $arrivee=date("Y-m-d",strtotime($arrivee));
	   $depart=date("Y-m-d",strtotime($depart));
	   $_SESSION["arrive"]=$arrivee;
	   $_SESSION["depart"]=$depart;
	   $a=(int)$_POST["enfants"] + (int)$_POST["adultes"];
	   $_SESSION["nbr_vacance"]=''.$a.' Voyageurs ( '.$_POST["enfants"].' enfants + '.$_POST["adultes"].' adultes )';
	   $arriveeday=strtotime($_SESSION["arrive"]);
	   $arriveeday=date("d", $arriveeday);
	   $arriveemonth=strtotime($_SESSION["arrive"]);
	   $arriveemonth=date("m", $arriveemonth);
	   $arriveeyear=strtotime($_SESSION["arrive"]);
	   $arriveeyear=date("y", $arriveeyear);

	   $stmt3=$bdd1->prepare("SELECT *
							from appartement
							where appartement.ville=:ville
							and appartement.idAppartement not in(
							SELECT reservation.idAppartement
							FROM reservation
							where day(reservation.depart) > :arriveeday
							and month(reservation.depart) >= :arriveemonth
							and year(reservation.depart) >= :arriveeyear)");
	   $stmt3->execute(array(':ville'=>$ville1,':arriveeday'=>$arriveeday,':arriveemonth'=>$arriveemonth,':arriveeyear'=>$arriveeyear));


		while($row=$stmt3->fetch()){
			$var=$row["idAppartement"];
			echo '
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4" >
			<form action="Reservation/Reservation.php" action="get">
            <div class="card">
			<input type="hidden" name="id" value="'.$row['idAppartement'].'">
            <div id="show'.$var.'" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">';
		    
            echo make_slide_indicators($bdd1,$var);
            echo '</ol>
            <div class="carousel-inner">';
            echo make_slides($bdd1,$var);
            echo '</div>
            <a class="left carousel-control" href="#show'.$var.'" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#show'.$var.'" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
            </div>
            <div class="card-block" style="background:white;">
			<input type="hidden" name="ville" value="'.$row['ville'].'">
            <h4 class="card-title mt-3">Ville : '.$row['ville'].'</h4>
            <div class="meta">
			<input type="hidden" name="NbrChambre" value="'.$row['NbrChambre'].'"/>
            <a>NombreChambre : '.$row['NbrChambre'].'</a>
            </div>
            <div class="card-text">
		    <input type="hidden" name="NbrEtage" value="'.$row['NbrEtage'].'"/>
            NombreEtage:'.$row['NbrEtage'].'
            </div>
			<div class="card-text">
            <input type="hidden" name="Address" value="'.$row['Address'].'"/>
			Address:'.$row['Address'].'
			</div>
            </div>
            <div class="card-footer">
			<small style="padding-right:120px;">PrixNuit:'.$row['Prixnuit'].'DH</small>
            <button type="submit" name="btn" class="btn btn-secondary float-right btn-sm">    Reserver</button>
            </div>
            </div>
		    </form>
            </div>';
		}


   } 
   }catch(Exception $e){
	   exit();
   }
?>
</div>
</div>
<?php include_once 'infooter.php';?>
</div>
</body>
</html>



