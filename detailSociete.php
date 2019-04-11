<?php session_start();
include './assets/ins/function.php';
include './head/header.php';
include './head/menu.php';
noConnected();
include "./assets/connexion/bd.php";

?>

<div class="container col-xl-12">
    <h1 class="p-5" style="text-align:center">Société: <?=$_GET['company']?></h1>
    <h2>Personnes de contact</h2>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Mail</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table">
    <?php
    $queryDataContact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON contacts.company_id_company = company.id_company WHERE comp_name = ?"); 
    $queryDataContact ->execute(array($_GET['company']));

    while ($resultat = $queryDataContact->fetch()) {
        ?>
        <td><?=$resultat['last_name']?></td>
        <td><?=$resultat['first_name']?></td>
        <td><?=$resultat['Telephone']?></td>
        <td><?=$resultat['mail']?></td>
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
    </tr>
  </thead>
  <tbody>
    <tr class="table">
    <?php
    $queryDataInvoice = $bdd->prepare("SELECT * FROM invoice LEFT JOIN company ON company.id_company = invoice.company_id_company LEFT JOIN contacts ON contacts.company_id_company = company.id_company WHERE company.comp_name = ?"); 
    $queryDataInvoice ->execute(array($_GET['company']));

    while ($resultat = $queryDataInvoice->fetch()) {
?>
        <td><?=$resultat['invoice_numb']?></td>
        <td><?=$resultat['invoiced_date']?></td>
        <td><?=$resultat['first_name'].' '.$resultat['last_name']?></td>
    </tr>
    <?php
    };
    ?>
  </thead>
  <tbody>
    <tr class="table">
    </tbody>
  </table>

