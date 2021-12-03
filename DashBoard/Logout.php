<?php
session_start();
if(isset($_SESSION['em'])&& isset($_SESSION['pass'])){
	unset($_SESSION);
	session_destroy();
	header("location:Login.php");
}
	else{
		header("location:Login.php");
	}

?>