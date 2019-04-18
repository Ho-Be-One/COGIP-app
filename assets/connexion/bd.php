<?php 
try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
		$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$bdd->exec("SET NAMES 'UTF8'");		
		}
			catch(Exception $e)
		{
		// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}

?>