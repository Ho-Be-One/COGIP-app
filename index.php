<?php

$url = '';
if (isset($_GET['url'])) {
    $url = explode('/',$_GET['url']);
}
if($url[0] == ''){
    header('location:./accueil/01');
}
elseif($url[0] == 'accueil' AND !empty($_GET['id'])){
    require './accueil/accueil.php';
}
elseif($url[0] == 'factures' AND !empty($_GET['id'])){
    require './factures/factures.php';
}
elseif($url[0] == 'company' AND !empty($_GET['id'])){
    require './company/company.php';
}
elseif($url[0] == 'contacts' AND !empty($_GET['id'])){
    require './contacts/contacts.php';
}
elseif($url[0] == 'newContact' AND !empty($_GET['id'])){
    require './contacts/newContact.php';
}
elseif($url[0] == 'connexion' AND !empty($_GET['id'])){
    require './connexion/connexion.php';
}
elseif($url[0] == 'detailContact' AND !empty($_GET['id'])){
    require './contacts/detailContact.php';
}
elseif($url[0] == 'deleteContact' AND !empty($_GET['id'])){
    require './assets/ctrl/deleteContact.php';
}
elseif($url[0] == 'logout' AND !empty($_GET['id'])){
    require './assets/ctrl/logout.php';
}
else{
    echo 'Erreur 404 :(';
}


