<?php
$limit = $url[1];

$listInvoice = $bdd->prepare("SELECT * FROM invoice LEFT JOIN company ON company.id_company=invoice.company_id_company ORDER BY invoice.invoiced_date DESC LIMIT 0, $limit");
$listInvoice->execute(array());

$listContact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON company.id_company=contacts.company_id_company LIMIT 0, $limit");
$listContact->execute(array());

$listCompany = $bdd->prepare("SELECT * FROM company  LIMIT 0, $limit");
$listCompany->execute(array());