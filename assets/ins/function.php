<?php
session_start();
function noConnected(){
	if(session_status() == PHP_SESSION_NONE){
	session_start();
	}
	if(!isset($_SESSION['auth']))
	{
	?>
	<script LANGUAGE="JavaScript">
	document.location.href="index.php"
	</script>
	<?php
	}
}

function connected(){
	if(session_status() == PHP_SESSION_NONE){
	session_start();
	}
	if(isset($_SESSION['auth']))
	{
	?>
	<script LANGUAGE="JavaScript">
	document.location.href="accueil.php"
	</script>
	<?php
	}
}
   	
function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890')/*Génération d'une chaine aléatoire*/
			{
		    $nb_lettres = strlen($chaine) - 1;
		    $generation = '';
		    for($i=0; $i < $nb_car; $i++)
		    {
		    $pos = mt_rand(0, $nb_lettres);
		    $car = $chaine[$pos];
		    $generation .= $car;
		    }
			return $generation;
			}
			
