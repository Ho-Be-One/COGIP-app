<?php session_start();
include './assets/ins/function.php';
include './head/header.php';
include './head/menu.php';

noConnected();

?>

<div class="container col-xl-6" style="text-align:center">
<?php
include './flash-alert.php';
?>
    <h1 class="p-5">Annuaire des sociétés</h1>
    <div class="clients col-xl-12">
    <h2>Clients</h2>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">TVA</th>
      <th scope="col">Pays</th>
      <?php
      if($_SESSION['auth']['level']=='godmode')
                {?>
      <th scope="col"><i class="fa fa-eye"></i></th>
      <th scope="col"><i class="fa fa-pencil"></i></th>
      <th scope="col"><i class="fa fa-times"></i></th>
      <?php
                }
      ?>
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
      <td><?=$resultat['comp_name']?></a></td>
      <td><?=$resultat['vat_number']?></td>
      <td><?=$resultat['country']?></td>
      <?php
        if($_SESSION['auth']['level']=='godmode')
                {?>
      <td><a href='detailSociete.php<?='?company='.$resultat['comp_name']?>'><i class="fa fa-eye"></i></a></td>
      <td><a href='newSociete.php<?='?companyid='.$resultat['id_company']?>'><i class="fa fa-pencil"></i></a></td>
      <td><a href='deleteSociete.php<?='?companyid='.$resultat['id_company']?>'><i class="fa fa-times text-danger"></i></a></td>
      <?php
                }
      ?>
    </tr>
<?php
};
?> 
  </tbody>
</table>
    </div>
    <div class="fournisseurs col-xl-12"></div>
    <h2>Fournisseurs</h2>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">TVA</th>
      <th scope="col">Pays</th>
      <?php
      if($_SESSION['auth']['level']=='godmode')
                {?>
      <th scope="col"><i class="fa fa-eye"></i></th>          
      <th scope="col"><i class="fa fa-pencil"></i></th>
      <th scope="col"><i class="fa fa-times" ></i></th>
      <?php
                }
      ?>
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
      <?php
        if($_SESSION['auth']['level']=='godmode')
                {?>
      <td><a href='detailSociete.php<?='?company='.$resultat['comp_name']?>'><i class="fa fa-eye"></i></a></td>
      <td><a href='newSociete.php<?='?companyid='.$resultat['id_company']?>'><i class="fa fa-pencil"></i></td>
      <td><a href='deleteSociete.php<?='?companyid='.$resultat['id_company']?>'><i class="fa fa-times text-danger"></i></a></td>
      <?php
                }
      ?>
    </tr>
<?php
};
?> 
  </tbody>
</table>
    </div>
