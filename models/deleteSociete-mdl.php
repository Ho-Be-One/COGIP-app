<?php
$stmt = $bdd->prepare("DELETE FROM company WHERE id_company = ?");
$stmt->execute(array($url[1]));
$_SESSION['flash']['success'] = "La société a été supprimée avec succès";
header('Location:company');