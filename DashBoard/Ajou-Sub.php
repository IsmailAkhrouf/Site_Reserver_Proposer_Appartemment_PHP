<?php 
    include '../PHPMailer/email.php';
	$email = new email();
					try{
		              $pdo=new PDO('mysql:host=localhost:3307;dbname=locationline','root','');
					  if(isset($_GET["btn"])){
						  $stmt = $pdo->prepare("SELECT * FROM appartementproposee where idAppartement=:id");
						  $stmt->execute(array(':id'=>$_GET['idAppartement'])); 
						  while($row=$stmt->fetch()){
						   
                       $stmt1=$pdo->prepare("insert into appartement Values 
					  (:id,:Ville,:Address,:NbrChambre,:NbrEtage,:PrixNuit,:Emailprop)");
                       $stmt1->execute(array(':Ville'=>$row['ville'],':Address'=>$row['Address']
					   ,':NbrChambre'=>$row['NbrChambre'],':NbrEtage'=>$row['NbrEtage'],
				      ':PrixNuit'=>$row['Prixnuit'],':Emailprop'=>$row['Email'],':id'=>$_GET['idAppartement']));
					  $email->confirmation_proposition($row['Email'],$_GET['idAppartement'],'Chere Client');
					  }
			   
						$stmt2 = $pdo->prepare("delete FROM appartementproposee where idAppartement=:id");
						$stmt2->execute(array(':id'=>$_GET['idAppartement']));
						
						   header("location:Ajouter.php");
					}elseif(isset($_GET['btn1'])){
					   $stmt2=$pdo->prepare("delete from appartementproposee where idAppartement=:id");
                       $stmt2->execute(array(':id'=>$_GET['idAppartement']));
					   $stmt3=$pdo->prepare("delete from photos where idAppartement=:id");
                       $stmt3->execute(array(':id'=>$_GET['idAppartement']));
					   header("location:Ajouter.php");
                    }  
			       
                    }
                    catch(Exception $e){
	                 exit();
                    }
					?>