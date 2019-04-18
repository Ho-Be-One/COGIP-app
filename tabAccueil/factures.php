<?php
include "assets/connexion/bd.php";
$listContact = $bdd->prepare("SELECT * FROM invoice LEFT JOIN company ON company.id_company=invoice.company_id_company LIMIT 0, $limit");
$listContact->execute(array());
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">##</th>
<<<<<<< HEAD
      <th scope="col">Numéro facture</th>
      <th scope="col">Date</th>
=======
      <th scope="col">Numéro de facture</th>
      <th scope="col">Date facturation</th>
>>>>>>> a51b41b0b7271077e13ea92f920075f7dde164de
      <th scope="col">Société</th>
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
<<<<<<< HEAD
    <?php
    foreach ($listContact as $key => $value) {
    
    $key +=1;
    $cptKey = strlen($key);
    if($cptKey <= 1){$zero = '0';}
    ?>
    <tr>
      <td><?= $zero.''.$key?></td>
      <td><?= $value['invoice_num'];?></td>
      <td><?= $date = date('d-m-Y', strtotime($value['invoiced_date']));?></td>
      <td><?= $value['comp_name'];?></td>
      <td class="text-center"><a href="../detailFactures/<?= $value['invoice_num'];?>"><i class="fa fa-eye"></i></a></td>
      <?php
      if($_SESSION['auth']['level'] == 'godmode'){ 
      ?>
      <td class="text-center"><a href="../newfacture/<?= $value['invoice_num'];?>&edite=edite" class="text-success"><i class="fa fa-pencil"></i></a></td>
      <td class="text-center"><a href="../deleteFacture/<?= $value['invoice_num'];?>" class="text-danger"><i class="fa fa-times"></i></a></td>
      <?php
      }
      ?>
    </tr>
    <?php
    }
    ?>
=======
    <tr class= "table">
  <?php 

include './assets/connexion/bd.php';

$req = $bdd->prepare('SELECT invoice.id_invoice, invoice.invoice_num, invoice.invoiced_date, company.comp_name FROM company INNER JOIN invoice ON company.id_company = invoice.company_id_company ORDER BY invoiced_date DESC LIMIT 0, 5');

$req->execute(array());

 while ($resultat = $req->fetch())
 {
  ?>
 		<td><?= $resultat['id_invoice']?></td>
 		<td><?= $resultat['invoice_num']?></td>
 		<td><?= $resultat['invoiced_date']?></td>
 		<td><?= $resultat['comp_name']?></td>
 	</tr>
 	<?php
 };
?>
>>>>>>> a51b41b0b7271077e13ea92f920075f7dde164de
  </tbody>
</table>