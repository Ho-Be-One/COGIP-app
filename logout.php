<?php 
session_start();

if(isset($_SESSION['auth'])){
	unset($_SESSION['auth']);
	session_destroy();
	setcookie('remember',NULL, -1);
	session_start();
	$_SESSION['flash']['info']="Vous avez été déconnecté.";
	header("Location:index.php");
	exit();
	}
	else
		{
		die(header("Location:index.php"));
		}
?>