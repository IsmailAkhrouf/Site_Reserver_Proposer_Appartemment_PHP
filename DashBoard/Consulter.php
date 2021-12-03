<?php
function make_slide_indicators($pdo,$id)
{
 $output = ''; 
 $count = 0;
 $stmt=$pdo->prepare("select name,mine,data from photos where idAppartement=:id");
 $stmt->execute(array(':id'=>$id));
 while($row1=$stmt->fetch())
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#show'.$id.'" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#show'.$id.'" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($pdo,$id)
{
 $output = '';
 $count = 0;
 $stmt=$pdo->prepare("select name,mine,data from photos where idAppartement=:id");
 $stmt->execute(array(':id'=>$id));
 while($row1=$stmt->fetch())
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="data:'.$row1['mine'].';base64,'.base64_encode($row1['data']).'" width="300" height="100" class="carousel slide"/>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>
<html lang="en">
<head>
<title>Consulter Reservations</title>
<?php include 'header.php';?>
<style>
.btn{
	background-color:purple;
	color:white;
	width:100px;
	
	}
	#show{
		
		 width:25%;
		 

	}
a.right carousel-control{margin-left:50px;}
.s{
	width:25%;
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
	$stmt1 = $pdo->prepare
	                      ("
							select DISTINCT idReservation,confirmationreservation.idAppartement,emailreser,NbrVacanciers,confirmationreservation.Ville,appartement.address,arrivee,depart,'pendu' as etat
							from confirmationreservation,client,appartement
							where client.email=confirmationreservation.Emailreser
                            and appartement.idAppartement=confirmationreservation.idAppartement
							and confirmationreservation.idReservation not in (
                             select idReservation
							 from reservation,client
							 where client.email=reservation.Emailreser
                            )");    
								
	echo '<div class="col-sm-12 col-md-12 well" id="content">';
				   echo ' <h3><b>Consulter Les Reservations:</b></h3><br/>';
	$stmt1->execute();
	while($version = $stmt1->fetch()){
	if($version["etat"]=='pendu'){
		
		$var=$version["idAppartement"];	 
		echo'<div class="form-row" >
		<div class="panel panel-primary">
		<div class="panel-heading" style="background-color:#b78c33;">Appartement '.$version["address"].' '.$version["Ville"].'</div>
		<div class="panel-body">
		<div class="s">
		<div id="show'.$var.'" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">';
        echo make_slide_indicators($pdo,$var);
        echo '</ol>
        <div class="carousel-inner">';
        echo make_slides($pdo,$var);
        echo '</div>
        <a class="left carousel-control" href="#show'.$var.'" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#show'.$var.'" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
        </a>
        </div>
		</div>
		Id Appartement: '.$version["idAppartement"].'<br>
		Id Reservation: '.$version["idReservation"].'<br>
		Email Reserver: '.$version["emailreser"].'<br>
		Etat : <span style="color:red;">'.$version["etat"].'</span></div>
		</div>
		      
		</div>
		';
	}
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