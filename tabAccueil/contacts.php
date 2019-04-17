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
      <th scope="col">Prénom</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Mail</th> 
      <th scope="col">Société</th>
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
      <td><?= $value['first_name'];?></td>
      <td><?= $value['last_name'];?></td>
      <td><?= $value['Telephone'];?></td>
      <td><?= $value['mail'];?></td>
      <td><?= $value['comp_name'];?></td>
      <td><a href="../detailContact/<?= $value['id_contacts'];?>"><i class="fa fa-eye"></i></a></td>
      <?php
      if($_SESSION['auth']['level'] == 'godmode'){ 
      ?>
      <td><a href="../newContact/<?= $value['id_contacts'];?>" class="text-success"><i class="fa fa-pencil"></i></a></td>
      <td><a href="../deleteContact/<?= $value['id_contacts'];?>-<?= $value['id_company'];?>" class="text-danger"><i class="fa fa-times"></i></a></td>
      <?php
      }
      ?>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>