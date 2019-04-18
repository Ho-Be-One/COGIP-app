<?php
    include "./assets/connexion/bd.php";
    include "index.php";
/////On récupère invoice_num=? dans l'URL $_GET['id'] (> voir index.php) situé dans header('Location:factures.php'); ...
    $del = $bdd->prepare('DELETE FROM invoice WHERE invoice_num=?');
    $del -> execute(array($_GET['id']));
    header('Location:./factures/factures/02');
?>