<?php
$req = $bdd->prepare("SELECT * FROM invoice LEFT JOIN company ON company.id_company=invoice.company_id_company ORDER BY invoice.invoiced_date");
$req->execute(array());
