<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">##</th>
      <th scope="col">Numéro facture</th>
      <th scope="col">Date</th>
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
    <?php
    foreach ($listInvoice as $key => $value) {
    
    $key +=1;
    $cptKey = strlen($key);
    if($cptKey <= 1){$zero = '0';}
    ?>
    <tr>
      <td><?= $zero.''.$key?></td>
      <td><?= $value['invoice_numb'];?></td>
      <td><?= $date = date('d-m-Y', strtotime($value['invoiced_date']));?></td>
      <td><?= $value['comp_name'];?></td>
      <td class="text-center"><a href="detailFactures-<?= $value['invoice_numb'];?>"><i class="fa fa-eye"></i></a></td>
      <?php
      if($_SESSION['auth']['level'] == 'godmode'){ 
      ?>
      <td class="text-center"><a href="newfacture-<?= $value['invoice_numb'];?>&edite=edite" class="text-success"><i class="fa fa-pencil"></i></a></td>
      <td class="text-center"><a href="deleteFacture-<?= $value['invoice_numb'];?>" class="text-danger"><i class="fa fa-times"></i></a></td>
      <?php
      }
      ?>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
