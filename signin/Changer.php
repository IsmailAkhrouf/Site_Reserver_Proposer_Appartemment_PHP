<?php 
	session_start();
	include '../PHPMailer/email.php';
	$email = new email();
	$str="";
	if(isset($_GET["Submit"])){
		if(isset($_GET["email"])  && isset($_GET["pass"]) && isset($_GET["rpass"]) ){
			if(strcmp($_GET["pass"], $_GET["rpass"]) == 0){
				$dsn = "mysql:host=localhost:3307;dbname=locationline";
				$user = "root";
				$passwd = "";
				$pdo = new PDO($dsn, $user, $passwd);
				$stmt1 = $pdo->prepare("select nom-complet from client where email=:email");
				$stmt1->execute(array(':email'=>$_GET["email"]));
				$nb=$stmt1->rowCount();
				if($nb == 0){
					$code = rand(1000000,9999999);
					$_SESSION["code"]=$code;
					$_SESSION["email"]=$_GET["email"];
					$_SESSION["passe"]=$_GET["pass"];
					$email->confirmation_changement_password($_SESSION["email"],$_SESSION["code"],"Chere Client");
					header("Location: Confirmation_Changement.php");
				}
				else{
				   $str='<br><div style="text-align:center">Client nexiste pas!!!!</div>';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Changement </title>
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
            <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">CHANGEMENT:</h2>
            <input type="email" id="inputEmail" class="form-control" placeholder="ADDRESS-EMAIL" required="" name="email">
            <input type="password" id="inputPassword" class="form-control" placeholder="NOUVELLE MOT-DE-PASSE" required="" name="pass">
			<input type="password" id="inputPassword" class="form-control" placeholder="REPETER MOT-DE-PASSE" required="" name="rpass">
			<button class="btn btn-success btn-block" type="submit" name="Submit"><i class="fas fa-sign-in-alt"></i> CHANGER</button>
            
            <hr>
            <!-- <p>Don't have an account!</p>  -->
			<?php echo $str; ?>
            </form>

            
			<br>
            
    </div>

</body>
</html>