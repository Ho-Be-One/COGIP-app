<?php
include "./assets/connexion/bd.php";
$listContact = $bdd->prepare("SELECT * FROM company  LIMIT 0, $limit");
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
        <td><a href="../detailSociete/<?= $value['id_company'];?>"><i class="fa fa-eye"></i></a></td>
        <?php
        if($_SESSION['auth']['level'] == 'godmode'){ 
        ?>
        <td><a href="../newSociete/<?= $value['id_company'];?>" class="text-success"><i class="fa fa-pencil"></i></a></td>
        <td><a href="../deleteSociete/<?= $value['id_company'];?>" class="text-danger"><i class="fa fa-times"></i></a></td>
        <?php
        }
        ?>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>