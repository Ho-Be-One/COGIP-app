<<<<<<< HEAD
<?php
include "assets/connexion/bd.php";
$listContact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON company.id_company=contacts.company_id_company LIMIT 0, $limit");
$listContact->execute(array());
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">##</th>
      <th scope="col">Nom</th>
      <th scope="col">TVA</th>
      <th scope="col">Pays</th>
      <th scope="col">Type</th> 
      <th scope="col"><i class="fa fa-eye"></i></th>
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
    <?php
    foreach ($listContact as $key => $value) {
    
    $key +=1;
    $cptKey = strlen($key);
    if($cptKey <= 1){$zero = '0';}
    ?>
    <tr>
      <td><?= $zero.''.$key?></td>
      <td><?= $value['comp_name'];?></td>
      <td><?= $value['vat_number'];?></td>
      <td><?= $value['country'];?></td>
      <td><?= $value['comp_type'];?></td>
      <td><a href="detailContact.php?contact=<?= $value['id_contacts'];?>"><i class="fa fa-eye"></i></a></td>
      <?php
      if($_SESSION['auth']['level'] == 'godmode'){ 
      ?>
      <td><a href="newContact.php?contact=<?= $value['id_contacts'];?>&edite=edite" class="text-success"><i class="fa fa-pencil"></i></a></td>
      <td><a href="./assets/ctrl/deleteContact.php?contact=<?= $value['id_contacts'];?>&delete=supp&company=<?= $value['id_company'];?>" class="text-danger"><i class="fa fa-times"></i></a></td>
      <?php
      }
      ?>
    </tr>
    <?php
    }
    ?>
=======


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">TVA</th>
      <th scope="col">Pays</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table">
      <?php
include "./assets/connexion/bd.php";

$queryData = $bdd->prepare("SELECT * FROM company ORDER BY creation_date DESC limit 5"); 
$queryData->execute(array());

while ($resultat = $queryData->fetch()) {
?>
      <td><?=$resultat['comp_name']?></td>
      <td><?=$resultat['vat_number']?></td>
      <td><?=$resultat['country']?></td>
      <td><?=$resultat['comp_type']?></td>
    </tr>
<?php
};
?> 
>>>>>>> jmb
  </tbody>
</table>