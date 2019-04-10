<?php
session_start();
if (isset($_POST['submit']) && isset($_POST['companyName']) && isset($_POST['companyCountry']) && isset($_POST['companyVat']) && isset($_POST['companyType'])){
	date_default_timezone_set('Europe/Brussels');
	$company = htmlspecialchars(trim($_POST['companyName']));
	$country = htmlspecialchars(trim($_POST['companyCountry']));
	$vat = htmlspecialchars(trim($_POST['companyVat']));
	$type = htmlspecialchars($_POST['companyType']);
	$creation = date("Y-m-d H:i:s");
	$erreur=array();
	
//// company ////////////////////////////////////////////////////////////////////////////////////////	
if (empty($company)){
	$erreur['company']='Indiquer un <b>Nom de Société</b> !';
	}
	// else{
	// $ValideEmail=(preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#',$mail))?$mail:null;
	// if (empty($ValideEmail)){
	// 	$erreur['mail']='Le format de <b>l\'adresse mail</b> est incorrecte';
	// 		}
	// }
	
//// country ////////////////////////////////////////////////////////////////////////////////
if (empty($country)){
	$erreur['country']='Entrez <b>un pays</b> !';
	}

//// N° de TVA ////////////////////////////////////////////////////////////////////////////////
if (empty($vat)){
	$erreur['vat']='Entrez <b>un numéro de TVA</b> !';
	}
	else{
	$validVat=(preg_match('#^[A-Z]{2}+[0-9]{9,11}$#',$vat))?$vat:null;
	if (empty($validVat)){
		$erreur['vat']='Le format du <b>numéro de TVA</b> est incorrect';
			}
	}

	// 		/* connexion a la base */
	include "./assets/connexion/bd.php";

// vérification si le n° de TVA existe déjà dans la base de données
		$queryData = $bdd->prepare("SELECT * FROM company WHERE vat_number=:vat"); 
		$queryData->execute(array(
		'vat' => $vat
		)); 
		$rows = $queryData->rowCount();
		
		if ($rows){
			$erreur['vat']='Ce <b>numéro de TVA</b> existe déjà!';
		}
if (empty($erreur)){

		$insertData = $bdd->prepare("INSERT INTO company (comp_name,country,vat_number,creation_date,comp_type) VALUES (:compname,:compcountry,:compvat,:compcreation,:comptype)");
		$insertData->bindParam(':compname', $company);
		$insertData->bindParam(':compcountry', $country);
		$insertData->bindParam(':compvat', $vat);
		$insertData->bindParam(':compcreation', $creation);
		$insertData->bindParam(':comptype', $type);
		$insertData->execute();
		$_SESSION["flash"]["Success"]="Les données ont été ajoutées";
}
}