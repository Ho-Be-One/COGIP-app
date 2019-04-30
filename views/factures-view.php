<div class="container col-xl-6">
    <?php
    require 'flash-alert.php';
    ?>
    <h4 class="pt-5 pb-5">Listing des factures</h4>
    <table class="table table-hover">
    <thead>
    <tr>
    <th scope="col">##</th>
    <th scope="col">N° facture</th>
    <th scope="col">Date facture</th>
    <th scope="col">Société</th>
    <th class='text-center'><i class="fa fa-eye"></i></th>
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
        while ($resultat = $req->fetch()){
        ?>
        <tr>
        <td><?= $resultat['id_invoice']?></td>
        <td><?=$resultat['invoice_numb']?></td>
        <td><?= $resultat['invoiced_date']?></td>
        <td><?= $resultat['comp_name']?></td>
        <td class='text-center'><a href="detailFactures-<?= $resultat['invoice_numb'];?>"><i class="fa fa-eye"></i></a></td>
        <?php
        if($_SESSION['auth']['level']=='godmode'){
            ?>
                <td class='text-center'><a href='newfacture-<?=$resultat['invoice_numb']?>'  class='text-success'><i class="fa fa-pencil"></i></td>
                <td class='text-center'><a href='deleteFacture.php<?= '?invoice=' . $resultat['invoice_numb']?>' class='text-danger'><i class='fa fa-times text-danger'></i></a></td>
            <?php
            }
        ?>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>