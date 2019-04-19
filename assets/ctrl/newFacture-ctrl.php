<?php
/////
if (isset($_POST['submit']) && isset($_POST['idContact']) && isset($_POST['idCompany']) && isset($_POST['invoiceNum']) && isset($_POST['invoicedDate']) && isset($_POST['serviceDate'])){
	date_default_timezone_set('Europe/Brussels');
	$contact = intval(trim($_POST['idContact']));
	$company = intval(trim($_POST['idCompany']));
    $invoiceNum = intval(trim($_POST['invoiceNum']));

/////Manipulation de l'input date HTML (dd-mm-YYYY) pour insert mysql format (YYYY-mm-dd)...
    $dateInv=$_POST['invoicedDate'];
    $dateInvoice=date("Y-m-d H:i:s",strtotime($dateInv));

    $dateServ=$_POST['serviceDate'];
    $dateService=date("Y-m-d H:i:s",strtotime($dateServ));
	// $creationDate = date("Y-m-d H:i:s");
    $erreur=array();
    
///// Gestion erreur contact ........................................................
if (empty($contact)){
	$erreur['contact']='Indiquer un <b>Id Contact</b> !';
	}
	
///// Gestion erreur company ........................................................
if (empty($company)){
	$erreur['company']='Indiquer un <b>Id Société</b> !';
    }
    
///// Gestion erreur invoiceNum .....................................................
if (empty($invoiceNum)){
	$erreur['invoiceNum']='Entrez <b>un numéro de facture</b> !';
	}
	// else{
	// $validVat=(preg_match('#^[A-Z]{2}+[0-9]{9,11}$#',$vat))?$vat:null;
	// if (empty($validVat)){
	// 	$erreur['vat']='Le format du <b>numéro de TVA</b> est incorrect';
	// 		}
	// }
    
///// Connexion a la db .............................................................
    include "./assets/connexion/bd.php";
    
// vérification si le n° de facture existe déjà dans la base de données
		$queryData = $bdd->prepare("SELECT * FROM invoice WHERE invoice_number=:invoiceNum AND id_company!=:id_company"); 
		$queryData->execute(array(
		'invoiceNum' => $invoiceNum,
		'id_company' => $_GET['idCompany']
		)); 
		$rows = $queryData->rowCount();
		
		if ($rows){
			$erreur['alreadyInvoice']='Ce <b>numéro de facture</b> existe déjà!';
		}

//////Modification de données ds la db si aucune erreur détectée...
    if (empty($erreur)){
        if($_POST['modif'] == 'modif'){
        $modifyData = $bdd->prepare('UPDATE invoice SET contacts_id_contacts=:contact, company_id_company=:company, invoice_num=:invoiceNum, invoiced_date=:dateInvoice, service_date=:dateService)');
    
	$modifyData->execute(array(
        $_POST['idContact'],
        $_POST['idCompany'],
		$_POST['invoiceNum'],
		$dateInvoice,
		$dateService,
    ));
$_SESSION['flash']['success']="Les données ont été modifiées";
}else{
    $req = $bdd->prepare('INSERT INTO invoice (contacts_id_contacts, company_id_company, invoice_num, invoiced_date, service_date) VALUES (?,?,?,?,?)');
    
	$req->execute(array(
        $_POST['idContact'],
        $_POST['idCompany'],
		$_POST['invoiceNum'],
		$dateInvoice,
		$dateService,
    ));
/////Affichage d'un message...
    $_SESSION['flash']['success']="Les données ont été ajoutées";}
    header('Location:newFacture.php');
}
}
?>