<?php
include "./assets/connexion/bd.php";
$listContact = $bdd->prepare("SELECT * FROM company  LIMIT 0, $limit");
$listContact->execute(array());
?>