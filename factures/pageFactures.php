<?php session_start();
  include './assets/connexion/bd.php';
  include './assets/ctrl/login-ctrl.php';
  include './head/header.php';
  include './head/menu.php';
?>
<div class="container col-xl-6" style="text-align:center">
<?php
include './flash-alert.php';
?>
    <h1 class="p-5">Listing des factures</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">##</th>
      <th scope="col">N° facture</th>
      <th scope="col">Date facture</th>
      <th scope="col">Société</th>
         
      <?php

/////SI la session est authetifiée "godmode" afficher les icones...
      if($_SESSION['auth']['level']=='godmode')
                {?>
      <th scope="col"><i class="fa fa-pencil"></i></th>
      <th scope="col"><i class="fa fa-times"></i></th>
      <?php
                }
      ?>
    </tr>
  </thead>
  <tbody>

    <?php 
/////SELECT INNER JOIN Id_invoice, Invoice_num, Invoice_date, Comp_name par ORDRE desc...
$req = $bdd->prepare('SELECT invoice.id_invoice, invoice.invoice_num, invoice.invoiced_date, company.comp_name FROM company INNER JOIN invoice ON company.id_company = invoice.company_id_company ORDER BY invoiced_date DESC');

$req->execute(array());
 while ($resultat = $req->fetch())
 {
/////Afficher le résultat boucle WHILE et lien vers detailFactures...
  ?>
    <tr>
      <td><?= $resultat['id_invoice']?></td>
      <td><a href='detailFactures.php<?= '?' . 'invoice=' . $resultat['invoice_num']?>'><?=$resultat['invoice_num']?></a></td>
      <td><?= $resultat['invoiced_date']?></td>
      <td><?= $resultat['comp_name']?></td>
      <?php

/////SI la session est authetifiée "godmode" afficher les icones liens vers newFacture et deleteFacture...--> 
        if($_SESSION['auth']['level']=='godmode')
                {?>
      <td><a href='newFacture.php<?='?invoice='. $resultat['invoice_num']?>'><i class="fa fa-pencil"></i></td>
      <td><a href='deleteFacture.php<?= '?invoice=' . $resultat['invoice_num']?>'><i class='fa fa-times text-danger'></i></a></td>
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

<?php
include './foot/footer.php';
?>