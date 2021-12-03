<?php 
    include '../PHPMailer/email.php';
	$email = new email();
					try{
		              	$pdo=new PDO('mysql:host=localhost:3307;dbname=locationline','root','');
						//if(isset($_GET['Annuler'])){
						$stmt2 = $pdo->prepare("delete FROM reservation where idReservation=:id");
						$stmt2->execute(array(':id'=>$_GET['idReservation']));
					    $email->confirmation_annulation_reservation($_GET['emailreser'],$_GET['idReservation'],"Chere Client");
						$stmt3=$pdo->prepare("delete FROM annulereservation where idReservation=:id");
						$stmt3->execute(array(':id'=>$_GET['idReservation']));
						header("location:Annuler.php");
						
				
                    }
                    catch(Exception $e){
	                 exit();
                    }
?>