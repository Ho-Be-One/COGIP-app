<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">##</th>
      <th scope="col">Numéro de facture</th>
      <th scope="col">Date facturation</th>
      <th scope="col">Société</th>
    </tr>
  </thead>
  <tbody>
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
  </tbody>
</table>