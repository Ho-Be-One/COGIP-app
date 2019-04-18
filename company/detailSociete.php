<?php session_start();
include './assets/ins/function.php';
include './head/header.php';
include './head/menu.php';
include "./assets/connexion/bd.php";

$queryDataContact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON contacts.company_id_company = company.id_company WHERE company.id_company=?"); 
$queryDataContact ->execute(array($_GET['id']));
$nameComp = $queryDataContact->fetch();
?>
<div class="container col-xl-6">
<h1 class="p-5" style="text-align:center">Société: <?=$nameComp['comp_name']?></h1>
<h2>Personnes de contact</h2>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Mail</th>
        <th class="text-center"><i class="fa fa-eye"></i></th>
        <?php
        if($_SESSION['auth']['level'] == 'godmode'){
        ?>
        <th class="text-center"><i class="fa fa-pencil"></i></th>
        <th class="text-center"><i class="fa fa-times"></i></th>
        <?php
        }
        ?>
        </tr>
    </thead>
    <tbody>
        <tr class="table">
        <?php
        $queryDataContact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON contacts.company_id_company = company.id_company WHERE company.id_company=?"); 
        $queryDataContact ->execute(array($_GET['id']));
        while ($resultat = $queryDataContact->fetch()) {
        ?>
        <td><?=$resultat['last_name']?></td>
        <td><?=$resultat['first_name']?></td>
        <td><?=$resultat['Telephone']?></td>
        <td><?=$resultat['mail']?></td>
        <td class="text-center"><a href="../detailContact/<?= $resultat['id_contacts'];?>"><i class="fa fa-eye"></i></a></td>
        <?php
        if($_SESSION['auth']['level'] == 'godmode'){ 
        ?>
        <td class="text-center"><a href="../newContact/<?= $resultat['id_contacts'];?>" class="text-success"><i class="fa fa-pencil"></i></a></td>
        <td class="text-center"><a href="../deleteContact/<?= $value['id_contacts'];?>-<?= $value['id_company'];?>" class="text-danger"><i class="fa fa-times"></i></a></td>
        <?php
        }
        ?>
        </tr>
        <?php
        };
        ?> 
    </tbody>
</table>

<h2>Factures</h2>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">N° de facture</th>
        <th scope="col">Date facture</th>
        <th scope="col">Personne de contact</th>
        <th class="text-center"><i class="fa fa-eye"></i></th>
        <?php
        if($_SESSION['auth']['level'] == 'godmode'){
        ?>
        <th class="text-center"><i class="fa fa-pencil"></i></th>
        <th class="text-center"><i class="fa fa-times"></i></th>
        <?php
        }
        ?>
        </tr>
    </thead>
    <tbody>
        <tr class="table">
        <?php
        $queryDataInvoice = $bdd->prepare("SELECT * FROM invoice LEFT JOIN company ON company.id_company = invoice.company_id_company LEFT JOIN contacts ON contacts.company_id_company = company.id_company WHERE company.id_company = ?"); 
        $queryDataInvoice ->execute(array($_GET['id']));

        while ($resultat = $queryDataInvoice->fetch()) {
        ?>
        <td><?=$resultat['invoice_numb']?></td>
        <td><?=$resultat['invoiced_date']?></td>
        <td><?=$resultat['first_name'].' '.$resultat['last_name']?></td>
        <td class="text-center"><a href="../detailContact/<?= $resultat['id_contacts'];?>"><i class="fa fa-eye"></i></a></td>
        <?php
        if($_SESSION['auth']['level'] == 'godmode'){ 
        ?>
        <td class="text-center"><a href="../newContact/<?= $resultat['id_contacts'];?>" class="text-success"><i class="fa fa-pencil"></i></a></td>
        <td class="text-center"><a href="./assets/ctrl/deleteContact.php?contact=<?= $value['id_contacts'];?>&delete=supp&company=<?= $value['id_company'];?>" class="text-danger"><i class="fa fa-times"></i></a></td>
        <?php
        }
        ?>
        </tr>
        <?php
        };
        ?>
    </tbody>
</table>


