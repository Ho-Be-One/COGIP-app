<?php
include "./assets/connexion/bd.php";
$stmt = $bdd->prepare("DELETE FROM company WHERE id_company = ?");
$stmt->execute(array($_GET['companyid']));
header('Location:pageSocietes.php');
?>