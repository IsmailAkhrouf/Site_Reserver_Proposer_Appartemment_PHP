<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php session_start() ;
$str="";
$nb=0;
	if(isset($_GET["submit1"])){
		if(isset($_GET["code"])){
			if(strcmp($_GET["code"],$_SESSION["code"])==0){
				$dsn = "mysql:host=localhost:3307;dbname=locationline";
				$user = "root";
				$passwd = "";
				$pdo = new PDO($dsn, $user, $passwd);
				$stmt1 = $pdo->prepare("select nom,email,telephone,motdepasse from inscription where email=:email");
				$stmt1->execute(array('email'=>$_SESSION["email"]));
				$version = $stmt1->fetch();
				$stmt = $pdo->prepare("INSERT INTO `client`(`Nom`, `Email`, `Telephone`, `Motdepasse`) values (:a1,:a2,:a3,:a4)");
				$nom=$version['nom'];
				$email=$version['email'];
				$telephone=$version['telephone'];
				$mdp=$version['motdepasse'];
				$stmt->execute(array(':a1'=>$nom,':a2'=>$email,':a3'=>$telephone,':a4'=>$mdp));
				$str='<br><div style="text-align:center">Vous avez inscrit avec succes<br> <a href="../indix.php">Retour Accueil</a></div>';
				$_SESSION["Nom"]=$version["nom"];
				$_SESSION["email"]=$version["email"];
			    if(!empty($_SESSION["ville"]) && !empty($_SESSION["nbr_vacance"]) && !empty($_SESSION["Nom"])){
					$stmt2 = $pdo->prepare("delete from inscription where email=:email");
				    $stmt2->execute(array('email'=>$_SESSION["email"]));
					$nb=1;
					echo "<script> window.location.replace('../Reservation/Reservation.php') </script>";
					exit();
				}
				if(!empty($_SESSION["ville"]) && !empty($_SESSION["prixnuit"]) &&  !empty($_SESSION["Nom"])){
					$stmt2 = $pdo->prepare("delete from inscription where email=:email");
					$stmt2->execute(array('email'=>$_SESSION["email"]));
					$nb=1;
					echo "<script> window.location.replace('../Proposer.php') </script>";
					exit();
				}
				$nb=1;
			}
			else{
				$str='<br><div style="text-align:center">ERREUR</div>';
			}
		}
	}
?>
<?php if($nb==1){
	$stmt2 = $pdo->prepare("delete from inscription where email=:email");
	$stmt2->execute(array('email'=>$_SESSION["email"]));
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <title>Connection</title>
	<style>
	body{background-color:#b78c33;}
	#logreg-forms{
    width:412px;
    margin:10vh auto;
    background-color:#f3f3f3;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}
#logreg-forms form {
    width: 100%;
    max-width: 410px;
    padding: 15px;
    margin: auto;
}
#logreg-forms .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
}
#logreg-forms .form-control:focus { z-index: 2; }
#logreg-forms .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}
#logreg-forms .form-signin input[type="password"] {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

#logreg-forms .social-login{
    width:390px;
    margin:0 auto;
    margin-bottom: 14px;
}
#logreg-forms .social-btn{
    font-weight: 100;
    color:white;
    width:190px;
    font-size: 0.9rem;
}
#logreg-forms a{
    display: block;
    padding-top:10px;
    color:lightseagreen;
}

#logreg-form .lines{
    width:200px;
    border:1px solid red;
}


#logreg-forms button[type="submit"]{ margin-top:10px; }
#logreg-forms .facebook-btn{  background-color:#3C589C; }

#logreg-forms .google-btn{ background-color: #DF4B3B; }

#logreg-forms .form-reset, #logreg-forms .form-signup{ display: none; }

#logreg-forms .form-signup .social-btn{ width:210px; }

#logreg-forms .form-signup input { margin-bottom: 2px;}

.form-signup .social-login{
    width:210px !important;
    margin: 0 auto;
}
@media screen and (max-width:500px){
    #logreg-forms{
        width:300px;
    }
    
    #logreg-forms  .social-login{
        width:200px;
        margin:0 auto;
        margin-bottom: 10px;
    }
    #logreg-forms  .social-btn{
        font-size: 1.3rem;
        font-weight: 100;
        color:white;
        width:200px;
        height: 56px;
        
    }
    #logreg-forms .social-btn:nth-child(1){
        margin-bottom: 5px;
    }
    #logreg-forms .social-btn span{
        display: none;
    }
    #logreg-forms  .facebook-btn:after{
        content:'Facebook';
    }
  
    #logreg-forms  .google-btn:after{
        content:'Google+';
    }
    
}
	</style>
</head>
<body>
    <div id="logreg-forms">
        <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">VERIFIER VOTRE EMAIL</h1>
            <p>Verifier votre email avec le code qui est envoyé vers l'email: <?php  echo $_SESSION["email"] ?></p>
            <input type="text" id="inputPassword" class="form-control" name="code">
			<button name="submit1" class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> VERIFIER</button>
            <hr>
			</form>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block" type="button" id="btn-signup" data-target="inscription.php"><i class="fas fa-user-plus">
                
            </i>CONNECTER AVEC UN NOUVEAU COMPTE</button>
			<?php echo $str;  ?>
            

            
			<br>
            
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
</html>