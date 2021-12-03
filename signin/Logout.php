<?php
		 session_start();  
		session_destroy();
		session_unset();
		$_SESSION['usr']=null;
		header('Location: ../indix.php');
		 exit;
?>