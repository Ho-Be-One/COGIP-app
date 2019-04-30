<?php
$req1 = $bdd->prepare('SELECT * FROM invoice WHERE invoice_numb = ?');
$req1->execute(array($url[1]));

$req2 = $bdd->prepare('SELECT * FROM company INNER JOIN invoice ON invoice.company_id_company = company.id_company WHERE invoice.invoice_numb = ?');
$req2->execute(array($url[1]));

$req3 = $bdd->prepare('SELECT * FROM contacts INNER JOIN invoice ON invoice.contacts_id_contacts = contacts.id_contacts WHERE invoice.invoice_numb = ?');
$req3->execute(array($url[1]));
