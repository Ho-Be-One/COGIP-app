<?php session_start();
include './assets/ins/function.php';
include './assets/ctrl/login-ctrl.php';
include './head/header.php';
include './head/menu.php';
include "assets/connexion/bd.php";
?>
<div class="container col-xl-6 ">
    <?php
    include 'flash-alert.php';
    ?>
    <h4 class="pt-5 pb-5"><strong>COGIP</strong> : Annuaire des sociétés</h4>
    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#clients">Cliens</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#fournisseurs">Fournisseurs</a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content pt-4 ">
        <div class="tab-pane fade show active" id="clients">
        <?php
        $listContact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON company.id_company=contacts.company_id_company WHERE company.comp_type=:comp_type");
        $listContact->execute(array(
        'comp_type' => 'client'     
        ));
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
        </tbody>
        </table>
        </div>
        <div class="tab-pane fade" id="fournisseurs">
        <div class="tab-pane fade show active" id="clients">
        <?php
        $listContact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON company.id_company=contacts.company_id_company WHERE company.comp_type=:comp_type");
        $listContact->execute(array(
        'comp_type' => 'fournisseur'     
        ));
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
        </tbody>
        </table>
        </div>
    </div>
</div> 
<?php
include './foot/footer.php';
?>
