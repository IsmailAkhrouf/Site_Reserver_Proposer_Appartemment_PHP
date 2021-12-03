<html lang="en">
<head>
<title>Notifications</title>
<?php include 'header.php';?>
<style>
.btn{
	background-color:purple;
	color:white;
	width:100px;
}
</style>
</head>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
<?php include 'nav.php';?>
<div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                
 <?php 
		try{
	$dsn = "mysql:host=localhost:3307;dbname=locationline";
    $user = "root";
    $passwd = "";
	$pdo = new PDO($dsn, $user, $passwd);
	$stmt1 = $pdo->prepare("select idNotification,Sujet,Objet,Date,notifications.EmailUser,notifications.NomUser from notifications,client where 
	notifications.EmailUser=client.Email and notifications.NomUser=client.Nom");    
								
	echo '<div class="col-sm-12 col-md-12 well" id="content">';
				   echo ' <h3><b>Consulter Les Notifications:</b></h3><br/>';
	$stmt1->execute();
	while($version = $stmt1->fetch()){
		echo'<div class="form-row">
		<div class="panel panel-primary">
		<div class="panel-heading" style="background-color:#b78c33;">Notification: '.$version["Date"].'</div>
		<div class="panel-body" >
		Nom Client: '.$version["NomUser"].'<br>
		Email Client: '.$version["EmailUser"].'<br>
		Sujet: '.$version["Sujet"].' '.$version["Objet"].'
		</div>
		</div>
		</div>
		';
	}
	echo '</div>';
	}
    catch(Exception $e){
	 exit();
    }
?>
 </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript" src="animation.js">
</script>
</body>
</html>
				