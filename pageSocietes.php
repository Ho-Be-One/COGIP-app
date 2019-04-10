<?php session_start();
include './assets/ins/function.php';
include './head/header.php';
include './head/menu.php';
noConnected();
?>
<div class="container col-xl-6">
    <h1 class="p-5">Annuaire des sociétés</h1>
    <div class="clients col-xl-6">
    <h2>Clients</h2>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">TVA</th>
      <th scope="col">Pays</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table">
      <?php
include "./assets/connexion/bd.php";

$queryData = $bdd->prepare("SELECT * FROM company WHERE comp_type='client'"); 
$queryData->execute(array());

while ($resultat = $queryData->fetch()) {
?>
      <td><?=$resultat['comp_name']?></td>
      <td><?=$resultat['vat_number']?></td>
      <td><?=$resultat['country']?></td>
    </tr>
<?php
};
?> 
  </tbody>
</table>
    </div>
    <div class="fournisseurs col-xl-6"></div>
    <h2>Fournisseurs</h2>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">TVA</th>
      <th scope="col">Pays</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table">
      <?php
$queryData = $bdd->prepare("SELECT * FROM company WHERE comp_type='fournisseur'"); 
$queryData->execute(array());

while ($resultat = $queryData->fetch()) {
?>
      <td><?=$resultat['comp_name']?></td>
      <td><?=$resultat['vat_number']?></td>
      <td><?=$resultat['country']?></td>
    </tr>
<?php
};
?> 
  </tbody>
</table>
    </div>
