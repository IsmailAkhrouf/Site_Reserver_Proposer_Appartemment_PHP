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
<html>
<head>
<title>SurNous-LocationLine</title>
<head>
<?php include 'inheader.php';?>
<style>
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
.q{
	font-size:20px;
	color:blue;
}
</style>
</head>
<body>
<div class="bg">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<ul class="nav navbar-nav">
<li><a href="indix.php">LocationLine</a></li>
<li><a href="indix.php">Home</a></li>
<li><a href="#">Aide</a></li>
</ul>

<?php echo $sq; ?>

</div>
</nav>
<div class="container-fluid">
 <div class="row">
 <div class="col-sm-12 col-md-12 well"> 
 <span>
 <h2>1.LocationLine c’est quoi?</h2>
 <p class="q">LocationLine : site de locations de vacances.
 Trouvez votre location de vacances idéale partout dans le maroc et ne perdez plus votre temps à chercher les meilleures offres sur Internet 
 – nous le ferons pour vous! Concentrez-vous sur le plus important : profiter de votre voyage.</p>
 <p></p>
 <h2>2.Pourquoi devrais-je utiliser LocationLine au lieu de chercher directement une location sur les sites des différentes agences marocaines ?</h2>
 <p class="q">Saviez-vous que les prix des locations peuvent varier en fonction du site où vous les réservez?
 Heureusement, LocationLine est là! Nous recherchons et comparons des  locations de vacances
 que qui répondent à vos critères et nous affichons les offres de tous les sites où elles sont proposées.</p>
 <h2>3.Date Creation:</h2>
 <p class="q">Implantée depuis 2020 au Maroc, LocationLine est aujourd’hui la nouvelle plateforme digitale
 de référence dans le secteur immobilier national présente dans plus de 10 villes au Maroc et possede 1000 appartement de louer,
 disponible en Français et en English.</p>
 </span>
 </div>
 </div>
 </div>
 <?php include_once 'infooter.php';?>
 </div>
 
 </body>
 </html>
 