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
<title>Contactez-nous-LocationLine</title>
<head>
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
margin-top: 80px;
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
.email{
	color:#b78c33;
	font-size:20px;
}
 .social-media {
margin-top: 15px; }
 .social-media ul li a {	
display: inline-block;
width: 45px;
height: 45px;
line-height: 45px;
font-size: 16px;
color: blue;
border: 1px solid rgba(255, 255, 255, 0.3); }
 .social-media ul li a:hover {
background: #b78c33;
color: #fff;
border-color: #b78c33; }
.a{
	color:blue;
	font-size:20px;
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
 <h2><span>Des questions ? Une réaction ?</span></h2><br>
 <p class="a" ><span>Nous aimerions avoir des nouvelles de vous </span></p>
 <p class="email" ><span>Email:</span></p>
 <p class="email"><span><a>LocationLine@gmail.com </a></span></p>
 <p class="email" ><span>Contact:</span></p>
 <div class="social-media">
		<ul class="list-inline">
			<li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-facebook"></i></a></li>
			<li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-twitter"></i></a></li>
			<li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-google-plus"></i></a></li>
			<li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-instagram"></i></a></li>
		</ul>
	</div>
 <p class="email"><span>Telephone:</span></p>
 <p class="a"><span>+212723445568</span></p>
	</div>
	</div>
	</div>
	
	</div>
	<?php include_once 'infooter.php';?>
	</body>
	</html>
	
	
	
 
 
 
 







