

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
  </tbody>
</table>