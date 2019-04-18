<?php

$url = '';
if (isset($_GET['url'])) {
    $url = explode('/',$_GET['url']);
}
// PAGE ACCUEIL ///////////////////////////////////////////////////////
if($url[0] == ''){
    header('location:./accueil/01');
}
elseif($url[0] == 'accueil' AND !empty($_GET['id'])){
    require './accueil/accueil.php';
}
// FACTURES ///////////////////////////////////////////////////////////
elseif($url[0] == 'factures' AND !empty($_GET['id'])){
    require './factures/factures.php';
}
elseif($url[0] == 'newfacture' AND !empty($_GET['id'])){
    require './factures/newfacture.php';
}
elseif($url[0] == 'detailFactures' AND !empty($_GET['id'])){
    require './factures/detailFactures.php';
}
elseif($url[0] == 'deleteFacture' AND !empty($_GET['id'])){
    require './factures/deleteFacture.php';
}
// COMPANY ////////////////////////////////////////////////////////////
elseif($url[0] == 'company' AND !empty($_GET['id'])){
    require './company/company.php';
}
elseif($url[0] == 'detailSociete' AND !empty($_GET['id'])){
    require './company/detailSociete.php';
}
elseif($url[0] == 'newSociete' AND !empty($_GET['id'])){
    require './company/newSociete.php';
}
elseif($url[0] == 'deleteSociete' AND !empty($_GET['id'])){
    require './assets/ctrl/deleteSociete.php';
}
// CONTACT ///////////////////////////////////////////////////////////
elseif($url[0] == 'contacts' AND !empty($_GET['id'])){
    require './contacts/contacts.php';
}
elseif($url[0] == 'newContact' AND !empty($_GET['id'])){
    require './contacts/newContact.php';
}
elseif($url[0] == 'detailContact' AND !empty($_GET['id'])){
    require './contacts/detailContact.php';
}
elseif($url[0] == 'deleteContact' AND !empty($_GET['id'])){
    require './assets/ctrl/deleteContact.php';
}
// CONNEXION ET DéCONNEXION ///////////////////////////////////////////
elseif($url[0] == 'connexion' AND !empty($_GET['id'])){
    require './connexion/connexion.php';
}
elseif($url[0] == 'logout' AND !empty($_GET['id'])){
    require './assets/ctrl/logout.php';
}
// ERREUR PAGE 404 ///////////////////////////////////////////
else{
    echo 'Erreur 404 :(';
}
