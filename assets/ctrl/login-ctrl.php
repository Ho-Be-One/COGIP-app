<?php
session_start();
if (isset($_POST['submit'])){
	date_default_timezone_set('Europe/Brussels');
	$mail = htmlspecialchars(trim($_POST['mail']));
	$mdp = htmlspecialchars(trim($_POST['mdp']));

	$erreur=array();
	
//// MAil ////////////////////////////////////////////////////////////////////////////////////////	
if (empty($mail)){
	$erreur['mail']='Indiquer votre <b>Adresse mail</b>';
	}
	else{
	$ValideEmail=(preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#',$mail))?$mail:null;
	if (empty($ValideEmail)){
		$erreur['mail']='Le format de <b>l\'adresse mail</b> est incorrecte';
			}
	}
	
//// Mot de passe ////////////////////////////////////////////////////////////////////////////////
if (empty($mdp)){
	$erreur['mdp']='Entrez <b>un mot de passe</b> !';
	}
		
	if (empty($erreur)){
		
		include "assets/connexion/bd.php";/* connexion a la base */
		$query = $bdd->prepare("SELECT mail FROM users WHERE mail=:mail"); // vérification si le mail existe dans la base de donnée
		$query->execute(array(
		'mail' => $_POST['mail']
		)); 
		$rows = $query->rowCount();
		
		if ($rows==1){
		
			$verif_mdp_hash = $bdd->prepare("SELECT * FROM users WHERE mail=:mail"); // extraction du mot de passe pour vérification 
			$verif_mdp_hash->execute(array(
			'mail' => $_POST['mail']
			)); 
			
			$result_mdp_hash = $verif_mdp_hash->fetch();/* fetch récupere la valeur en tableau*/
			$mdp_hash = $result_mdp_hash['mdp'];				
			
			if(password_verify($mdp, $mdp_hash)){

				$logs_89 = $bdd->prepare("SELECT * FROM users WHERE mail=?");
				$logs_89->execute(array($_POST['mail'])); 
				$_SESSION['auth'] = $logs_89->fetch();
								
				// $logs = $bdd->prepare("SELECT * FROM users WHERE mail=? AND (gender=? OR gender=?)");
				// $logs->execute(array($_POST['mail'],'1','2'));
				// $rowss = $logs->rowCount();
				// $result = $logs->fetch();
				
				$_SESSION['auth'] = $result;
				
				
				header('location:acceuil.php');
				
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