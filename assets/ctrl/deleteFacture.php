<?php
    include "./assets/connexion/bd.php";
    // include "index.php";
/////On récupère invoice_num=? dans l'URL $_GET['id'] (> voir index.php) situé dans header('Location:factures.php'); ...
    $delInvoice = $bdd->prepare('DELETE FROM invoice WHERE invoice_num=?');
    $delInvoice -> execute(array($_GET['id']));
    $_SESSION['flash']['success'] = "La facture a été supprimée avec succès";
    header('Location:../factures/02');
?>