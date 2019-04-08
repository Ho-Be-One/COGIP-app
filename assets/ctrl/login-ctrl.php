<?php
session_start();
if (isset($_POST['submit']) && isset($_POST['mail']) && isset($_POST['mdp'])){
	date_default_timezone_set('Europe/Brussels');
	$mail = htmlspecialchars(trim($_POST['mail']));
	$mdp = htmlspecialchars(trim($_POST['mdp']));

	$erreur=array();
	
//// mail ////////////////////////////////////////////////////////////////////////////////////////	
if (empty($mail)){
	$erreur['mail']='Indiquer votre <b>Adresse mail</b>';
	}
	else{
	$ValideEmail=(preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#',$mail))?$mail:null;
	if (empty($ValideEmail)){
		$erreur['mail']='Le format de <b>l\'adresse mail</b> est incorrecte';
			}
	}
	
//// mot de passe ////////////////////////////////////////////////////////////////////////////////
if (empty($mdp)){
	$erreur['mdp']='Entrez <b>un mot de passe</b> !';
	}
		
	if (empty($erreur)){
		
		/* connexion a la base */
		include "assets/connexion/bd.php";

		// vérification si le mail existe et recupération du mot de passe
		$queryData = $bdd->prepare("SELECT * FROM users WHERE mail=:mail"); 
		$queryData->execute(array(
		'mail' => $mail
		)); 
		$rows = $queryData->rowCount();
		
		if ($rows){
			$valueData = $queryData->fetch();
		
			// comparaison des mots de passe
			if(password_verify($mdp, $valueData['mdp'])){
			
				// injection des données dans une session
				$_SESSION['auth'] = $valueData;

				// rédirection vers la page accueil
				header('location:accueil.php');				
				}
				else{		
					$_SESSION['flash']['danger']="<b>Adresse svsd mail</b> ou <b>mot de passe</b> incorrect !";
				}
		}
		else{
			$_SESSION['flash']['danger']="<b>Adresse mail</b> ou <b>mot de passe</b> incorrect !";
		}
	}																					
}
?>