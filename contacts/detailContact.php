<?php session_start();
include './assets/ins/function.php';
include './assets/ctrl/login-ctrl.php';
include './head/header.php';
include './head/menu.php';
include "./assets/connexion/bd.php";
$contact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON company.id_company=contacts.company_id_company WHERE contacts.id_contacts=? ");
$contact->execute(array(
$_GET['id']   
));
$value = $contact->fetch();
?>
<div class="container col-xl-6 ">
    <h4 class="pt-5 pb-5"><strong>Contact</strong> : <?= $value['last_name'].' '.$value['first_name']?></h4>
    <div class="card col-xl-4 mr-3 float-left">
        <div class="card-body">
            <h5 class="card-title"><?= $value['last_name'].' '.$value['first_name']?></h5>
            <p class="card-text"><i class="fa fa-building-o text-primary"></i> <?= $value['comp_name']?></p>
            <p class="card-text"><i class="fa fa-at text-primary"></i> <?= $value['mail']?></p>
            <p class="card-text"><i class="fa fa-phone text-primary"></i> <?= $value['Telephone']?></p>
        </div>
    </div>
    <div class="card col-xl-7 float-left">
        <table class="table table-hover col-xl-7 float-left">
            <thead>
                <tr>
                <th scope="col">##</th>
                <th scope="col">Facture</th>
                <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $listContact = $bdd->prepare("SELECT * FROM invoice WHERE contacts_id_contacts=?");
            $listContact->execute(array(
            $_GET['id']   
            ));
            foreach ($listContact as $key => $echoValue){
            $key +=1;    
            ?>
                <tr>
                <th><?= $key ?></th>
                <td><?= $echoValue['invoice_numb'];?></td>
                <td><?= $echoValue = date('d-m-Y', strtotime($echoValue['invoiced_date']));?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
         </table>
    </div>
</div> 
<?php
include './foot/footer.php';
?>
<!-- is-invalid -->
