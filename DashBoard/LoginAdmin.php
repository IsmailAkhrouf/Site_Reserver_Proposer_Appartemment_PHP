<?php
    session_start();
   try{
		$pdo=new PDO('mysql:host=localhost:3307;dbname=locationline','root','');
   if(isset($_POST['email']) && isset($_POST['password'])){
	   $stmt = $pdo->prepare("SELECT Nom,Email,Mdp FROM admin where Email=:email AND Mdp=:mdp");
	   $stmt->execute(array(':email'=>$_POST["email"],':mdp'=>$_POST["password"]));
	   $version = $stmt->fetch();
	   $nb=$stmt->rowCount();
	   if($nb!=0){
		   $_SESSION['NomAdmin']=$version["Nom"];
		   $_SESSION['EmailAdmin']=$version["Email"];
		   header("location:DashBoard.php");
	   }else{
		   header("location: Login.php?$log=1");
	   }
	  
       
   } 
   }catch(Exception $e){
	   exit();
   }
?>