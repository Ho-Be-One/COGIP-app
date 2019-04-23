<?php
/////
if (isset($_POST['submit'])){
	// date_default_timezone_set('Europe/Brussels');
	$contacts = intval(trim($_POST['id_contacts']));
	$company = intval(trim($_POST['company_id_company']));
    $invoice_num = intval(trim($_POST['invoice_num']));

/////Manipulation de l'input date HTML (dd-mm-YYYY) pour insert mysql format (YYYY-mm-dd)...
    $dateInv=$_POST['invoiced_date'];
    $dateInvoice=date("Y-m-d H:i:s",strtotime($dateInv));

    $dateServ=$_POST['service_date'];
	$dateService=date("Y-m-d H:i:s",strtotime($dateServ));

	include "assets/connexion/bd.php";

	// $creationDate = date("Y-m-d H:i:s");
    $erreur=array();
    
///// Gestion erreur contact ........................................................
// if (empty($contacts)){
// 	$erreur['contacts']='Indiquer un <b>Id Contact</b> !';
// 	}
	
///// Gestion erreur company ........................................................
// if (empty($company)){
// 	$erreur['company']='Indiquer un <b>Id Société</b> !';
//     }
    
///// Gestion erreur invoice_num .....................................................
// if (empty($invoice_num)){
// 	$erreur['invoice_num']='Entrez <b>un numéro de facture</b> !';
// 	}
	// else{
	// $validVat=(preg_match('#^[A-Z]{2}+[0-9]{9,11}$#',$vat))?$vat:null;
	// if (empty($validVat)){
	// 	$erreur['vat']='Le format du <b>numéro de TVA</b> est incorrect';
	// 		}
	// }
    
///// Connexion a la db .............................................................
    include "./assets/connexion/bd.php";
    
// vérification si le n° de facture existe déjà dans la base de données
		// $queryData = $bdd->prepare("SELECT * FROM invoice WHERE invoice_num=:invoice_num AND id_company!=:id_company"); 
		// $queryData->execute(array(
		// 'invoice_num' => $invoice_num,
		// 'id_company' => $_GET['idCompany']
		// )); 
		// $rows = $queryData->rowCount();
		
		// if ($rows){
		// 	$erreur['alreadyInvoice']='Ce <b>numéro de facture</b> existe déjà!';
		// }

//////Modification de données ds la db si aucune erreur détectée...
    if (empty($erreur)){
		session_start();
		if(isset($_POST['modif'])){
        if($_POST['modif'] == 'modif'){
        $modifyData = $bdd->prepare('UPDATE invoice SET contacts_id_contacts=:contacts, company_id_company=:company, invoice_num=:invoice_num, invoiced_date=:dateInvoice, service_date=:dateService)');
    
	$modifyData->execute(array(
		'contacts'=> $contacts,
		'company'=> $company,
		'invoice_num'=> $invoice_num,
		'dateInvoice'=> $dateInvoice,
		'dateService'=> $dateService,
	));
}
$_SESSION['flash']['success']="Les données ont été modifiées";
		}
}else{
	$req = $bdd->prepare('INSERT INTO invoice (contacts_id_contacts, company_id_company, invoice_num, invoiced_date, service_date) VALUES :contacts, :company, :invoice_num,
	:dateInvoice,
	:dateService)');
	
	$req->execute(array(
		'contacts'=> $contacts,
		'company'=> $company,
		'invoice_num'=> $invoice_num,
		'dateInvoice'=> $dateInvoice,
		'dateService'=> $dateService,
	));
    
	// $req->execute(array(
    //     $_POST['idContact'],
    //     $_POST['idCompany'],
	// 	$_POST['invoice_num'],
	// 	$dateInvoice,
	// 	$dateService,
    // ));
/////Affichage d'un message...
    $_SESSION['flash']['success']="Les données ont été ajoutées";}
    // header('Location:newFacture.php');
}
}
?>