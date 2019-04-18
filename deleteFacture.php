<?php
    include "./assets/connexion/bd.php";
    $del = $bdd->prepare('DELETE FROM invoice WHERE invoice_num=?');
    $del -> execute(array($_GET['invoice']));
    header('Location:pageFactures.php');
?>