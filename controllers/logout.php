<?php 
session_start();

if(isset($_SESSION['auth'])){
	unset($_SESSION['auth']);
	session_destroy();
	setcookie('remember',NULL, -1);
	session_start();
	$_SESSION['flash']['info']="Vous avez été déconnecté.";	
	header('location:accueil-5');				
	}
	else
		{
		header('location:accueil-5');				
		}
?>