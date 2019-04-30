<?php
/////
if (isset($_POST['submit'])){
	// date_default_timezone_set('Europe/Brussels');
	$contacts = intval(trim($_POST['id_contacts']));
	$company = intval(trim($_POST['company_id_company']));
	$invoice_numb = intval(trim($_POST['invoice_numb']));

    $dateInv = $_POST['invoiced_date'];
    $dateInvoice = date("Y-m-d H:i:s",strtotime($dateInv));

    $dateServ = $_POST['service_date'];
	$dateService = date("Y-m-d H:i:s",strtotime($dateServ));


    $erreur=array();

	if(empty($invoice_numb)){
		$erreur['invoice_numb'] = 'Indiquez un numéro de <b>facture </b>';
	}else{
		$valideInvoice=(preg_match('#^[0-9]{5}#',$invoice_numb))?$invoice_numb:null;
		if (empty($valideInvoice)){
			$erreur['invoice_numb'] = 'Indiquez un numéro de <b>facture </b> de 7 chiffres';
		}
	}
//////  Vérification si le numéro de facture existe déjà ...
$verifInvoice = $bdd->prepare('SELECT * FROM invoice WHERE invoice_numb=?');
$verifInvoice->execute(array(
$invoice_numb
)); 

$row = $verifInvoice->rowCount();
if($row){
	$erreur['invoice_numb'] = 'Ce numéro de <b>facture</b> existe déjà !';
}
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
	$req = $bdd->prepare('INSERT INTO invoice (contacts_id_contacts, company_id_company, invoice_num, invoiced_date, service_date) VALUES :contacts, :company, :invoice_num, :dateInvoice, 	:dateService)');
	
	$req->execute(array(
		'contacts'=> $contacts,
		'company'=> $company,
		'invoice_num'=> $invoice_num,
		'dateInvoice'=> $dateInvoice,
		'dateService'=> $dateService,
	));
    
/////Affichage d'un message...
    $_SESSION['flash']['success']="Les données ont été ajoutées";}
    header('Location:newFacture.php');
}
?>