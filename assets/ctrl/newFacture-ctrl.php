<?php
// session_start();

if (isset($_GET['submit']) && isset($_GET['invoiceNum'])){
	// date_default_timezone_set('Europe/Brussels');
	// $invoiceNum = htmlspecialchars(trim($_GET['invoiceNum']));  
    // $erreur=array();
    
///////Connexion a la db
	include "./assets/connexion/bd.php";

//////Insertion de nouvelles données ds la db SI le bouton est défini

    $req = $bdd->prepare('INSERT INTO invoice (contacts_id_contacts, company_id_company, invoice_num, invoiced_date, service_date) VALUES (?,?,?,?,?)');
    
	$req->execute(array(
        $_POST['idContact'],
        $_POST['idCompany'],
		$_POST['invoiceNum'],
		$_POST['invoicedDate'],
		$_POST['serviceDate'],
    ));
    $_SESSION['flash']['success']="Les données ont été ajoutées";
    header('Location:newFacture.php');
}
?>