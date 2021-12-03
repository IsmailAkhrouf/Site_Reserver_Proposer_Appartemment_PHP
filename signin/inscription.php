<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<?php
	session_start();
	include '../PHPMailer/email.php';
	$email = new email();
	if(isset($_GET["Submit"])){
		if(isset($_GET["nom-complet"]) && isset($_GET["email"]) && isset($_GET["region"]) && isset($_GET["tel"]) && isset($_GET["mdp"]) && isset($_GET["conf-mdp"]) ){
			if(strcmp($_GET["mdp"], $_GET["conf-mdp"]) == 0){
				$dsn = "mysql:host=localhost:3307;dbname=locationline";
				$user = "root";
				$passwd = "";
				$pdo = new PDO($dsn, $user, $passwd);
				$stmt1 = $pdo->prepare("select nom-complet from client where email=:email");
				$stmt1->execute(array('email'=>$_GET["email"]));
				$nb=$stmt1->rowCount();
				if($nb==0){
					$num = $_GET["region"].$_GET["tel"];
					$stmt = $pdo->prepare("INSERT INTO inscription VALUES (:nom,:email,:tel,:mdp)");
					$stmt->execute(array(':nom'=>$_GET["nom-complet"],':email'=>$_GET["email"],':tel'=>$num,':mdp'=>$_GET["mdp"]));
					$code = rand(1000000,9999999);
					$_SESSION["code"]=$code;
					$_SESSION["email"]=$_GET["email"];
					$email->confirmation($_SESSION["email"],$_SESSION["code"],$_GET["nom-complet"]);
					header("Location: Confirmation.php");
				}
				else{
				   $str='<br><div style="text-align:center">cette email est deja inscrit</div>';
				}
			}
			else{
				$str='<br><div style="text-align:center">Confirmation de Mot de passe est incorrete</div>';
			}
		}else{
			$str='<br><div style="text-align:center">Remplir les champs</div>';
		}
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/style.css">
    <title>Inscription</title>
	<style>
	body{background-color:#b78c33;}
	/* sign in FORM */
#logreg-forms{
    width:312px;
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

/* Mobile */

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
  .card bg-light{
	  position:center;
	  width:40%;
  }	  
}
	</style>
</head>
<body>
<div class="container">



<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	 <form class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Inscription</h1>
            </form>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nom-complet" class="form-control" placeholder="NOM-COMPLET" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="ADDRESS-EMAIL" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select name="region" class="custom-select" style="max-width: 120px;">
		    <option selected="" value="+971">+971</option>
		    <option value="+972">+972</option>
		    <option value="+198">+198</option>
		    <option value="+701">+701</option>
			<option value="+212">+212</option>

		</select>
    	<input name="tel" class="form-control" placeholder="TELEPHONE" type="text">
    </div> <!-- form-group// -->
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="mdp" class="form-control" placeholder="ENTRER:MOT-DE-PASSE" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="conf-mdp" class="form-control" placeholder="CONFERMER:MOT-DE-PASSE" type="password">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="Submit"> CREER-COMPTE </button>
    </div> <!-- form-group// -->      
    <p class="text-center">AVEZ-VOUS UN COMPTE? <a href="connection.php">CONNECTER</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
</body>
</html>
