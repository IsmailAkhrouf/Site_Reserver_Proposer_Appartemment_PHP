 <?php 
					try{
		              	$pdo=new PDO('mysql:host=localhost:3307;dbname=locationline','root','');
						//if(isset($_GET['Confirmer'])){
						$stmt2 = $pdo->prepare("delete FROM appartement where idAppartement=:id");
						$stmt2->execute(array(':id'=>$_GET['idAppartement']));
						$stmt3=$pdo->prepare("delete from photos where idAppartement=:id");
                        $stmt3->execute(array(':id'=>$_GET['idAppartement']));
						$stmt4=$pdo->prepare("delete FROM annuleproposition where idAppartement=:id");
						$stmt4->execute(array(':id'=>$_GET['idAppartement']));
						header("location:Supprimer.php");
						
				
                    }
                    catch(Exception $e){
	                 exit();
                    }
?>