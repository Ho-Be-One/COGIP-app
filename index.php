<?php
session_start();
$url = '';
if (isset($_GET['url'])) {
    $url = explode('-',$_GET['url']);
}
include "public/connexion/bd.php";
// PAGE CONNEXION ///////////////////////////////////////////////////////
if($url[0] == '' || $url[0] == 'login'){
    if(!isset($_SESSION[auth])){
    require './controllers/login-ctrl.php';
    }
    else{
        require './controllers/accueil-ctrl.php';
    }
}
// PAGE ACCUEIL ///////////////////////////////////////////////////////
elseif($url[0] == 'accueil'){
    require './controllers/accueil-ctrl.php';
}
// PAGE FACTURES ///////////////////////////////////////////////////////
elseif($url[0] == 'factures'){
    require './controllers/factures-ctrl.php';
}
elseif($url[0] == 'detailFactures'){
    require './controllers/detailFactures-ctrl.php';
}
elseif($url[0] == 'newfacture' AND isset($_SESSION['auth'])){
    require './controllers/newfacture-ctrl.php';
}
elseif($url[0] == 'deleteFacture' AND isset($_SESSION['auth'])){
    require './controllers/deleteFacture-ctrl.php';
}
// PAGE COMPANY ///////////////////////////////////////////////////////
elseif($url[0] == 'company'){
    require './controllers/company-ctrl.php';
}
elseif($url[0] == 'detailSociete'){
    require './controllers/detailSociete-ctrl.php';
}
elseif($url[0] == 'newSociete' AND isset($_SESSION['auth'])){
    require './controllers/newSociete-ctrl.php';
}
elseif($url[0] == 'deleteSociete' AND isset($_SESSION['auth'])){
    require './controllers/deleteSociete-ctrl.php';
}
// PAGE CONTACTS ///////////////////////////////////////////////////////
elseif($url[0] == 'contacts'){
    require './controllers/contacts-ctrl.php';
}
elseif($url[0] == 'detailContact'){
    require './controllers/contacts-detail-ctrl.php';
}
elseif($url[0] == 'contacts'){
    require './controllers/contacts-ctrl.php';
}
elseif($url[0] == 'newContact' AND isset($_SESSION['auth'])){
    require './controllers/contacts-new-ctrl.php';
}
elseif($url[0] == 'deleteContact' AND isset($_SESSION['auth'])){
    require './controllers/deleteContact-ctrl.php';
}
// DECONNEXION /////////////////////////////////////////////////
elseif($url[0] == 'logout' AND isset($_SESSION['auth'])){
    require './controllers/logout.php';
}
// ERREUR PAGE 404 ///////////////////////////////////////////
else{
    echo '<h1>Erreur 404 :( </h1><br>';
    ?>
    <a href='accueil-5'>Go back to COGIP</a>
    <?php
}
