<?php
$contact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON company.id_company=contacts.company_id_company WHERE contacts.id_contacts=? ");
$contact->execute(array(
$url[1]   
));
$value = $contact->fetch();


$listContact = $bdd->prepare("SELECT * FROM invoice WHERE contacts_id_contacts=?");
$listContact->execute(array(
$url[1]   
));