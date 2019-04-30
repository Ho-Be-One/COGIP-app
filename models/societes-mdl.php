<?php
$queryDataClient = $bdd->prepare("SELECT * FROM company WHERE comp_type='client'"); 
$queryDataClient->execute(array());

$queryDataFournisseur = $bdd->prepare("SELECT * FROM company WHERE comp_type='fournisseur'"); 
$queryDataFournisseur->execute(array());

