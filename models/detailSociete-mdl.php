<?php
$queryData1 = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON contacts.company_id_company = company.id_company WHERE company.id_company=?"); 
$queryData1 ->execute(array($url[1]));
$nameComp = $queryData1->fetch();


$queryData2 = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON contacts.company_id_company = company.id_company WHERE company.id_company=?"); 
$queryData2 ->execute(array($url[1]));

$queryData3 = $bdd->prepare("SELECT * FROM invoice LEFT JOIN company ON company.id_company = invoice.company_id_company LEFT JOIN contacts ON contacts.company_id_company = company.id_company WHERE company.id_company = ?"); 
$queryData3 ->execute(array($url[1]));