<?php 
$queryModify = $bdd->prepare("SELECT * FROM company WHERE id_company = ?");
$queryModify->execute(array($url[1]));
$resultat = $queryModify->fetch();
$row = $queryModify->rowCount();




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

// vérification si le n° de TVA existe déjà dans la base de données
		$queryData = $bdd->prepare("SELECT * FROM company WHERE vat_number=:vat AND id_company!=:id_company"); 
		$queryData->execute(array(
		'vat' => $vat,
		'id_company' => $url[1]
		)); 
		$rows = $queryData->rowCount();
		
		if ($rows){
			$erreur['vat']='Ce <b>numéro de TVA</b> existe déjà!';
		}
if (empty($erreur)){
	session_start();
	if($_POST['modif'] == 'modif'){
	$modifyData = $bdd->prepare("UPDATE company SET comp_name=:company,country=:newCountry,vat_number=:newVat,comp_type=:newType WHERE id_company=:id_company");
	$modifyData->execute(array(
		'company'=> $company,
		'newCountry' => $country,
		'newVat'=> $vat,
		'newType' => $type,
		'id_company' => $url[1]
	));
	$_SESSION['flash']['success']="Les données ont été modifiées";
	?>
    <script LANGUAGE="JavaScript">
    document.location.href="company-"
    </script>
    <?php
	}else{
		$insertData = $bdd->prepare("INSERT INTO company (comp_name,country,vat_number,creation_date,comp_type) VALUES (:compname,:compcountry,:compvat,:compcreation,:comptype)");
		$insertData->bindParam(':compname', $company);
		$insertData->bindParam(':compcountry', $country);
		$insertData->bindParam(':compvat', $vat);
		$insertData->bindParam(':compcreation', $creation);
		$insertData->bindParam(':comptype', $type);
		$insertData->execute();
		$_SESSION['flash']['success']="Les données ont été ajoutées";}
		?>
        <script LANGUAGE="JavaScript">
        document.location.href="company-"
        </script>
        <?php
		
}
}