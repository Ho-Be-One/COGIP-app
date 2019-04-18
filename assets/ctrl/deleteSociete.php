<?php
session_start();
include "./assets/connexion/bd.php";
$stmt = $bdd->prepare("DELETE FROM company WHERE id_company = ?");
$stmt->execute(array($_GET['id']));
$_SESSION['flash']['success'] = "La société a été supprimée avec succès";
header('Location:../company/03');
?>