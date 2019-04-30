<?php

if(isset($url[1])){
$invoiceModify = $bdd->prepare("SELECT * FROM invoice WHERE invoice_numb =:invoice_numb");
$invoiceModify->execute(array('invoice_numb'=>$url[1]));
$resultat = $invoiceModify->fetch();
$row = $invoiceModify->rowCount();
}
?>

<div class="container pb-5">
    <br>
    <p class="text-center">
    <?php  if($row){
           echo 'Modification de facture : '
            . $resultat["invoice_numb"];
        } elseif ($_GET['id']==0) {
            echo 'Nouvelle facture';
    }
        ?>
    </p>

    <div class="card bg-light">
        <article class="card-body mx-auto col-xl-5">

<!--/////Formulaire method post ou get à determiner ici...-->
            <form method="post" action="">
            <?php
            if ($row){
                ?>
            <input type="hidden" name="modif" value="modif"/>
            <?php
            }
            ?>

<!--/////Input formulaire N°Facture...-->
    <div class="form-group has-danger">
        <label class="form-control-label" for="inputDanger1">N° facture</label>
        <input type="text" name="invoice_numb" value="<?php if(isset($_POST['invoice_numb'])){echo $_POST['invoice_numb'];}else{echo $resultat['invoice_numb'];}?>"  class="form-control <?php if(array_key_exists('invoice_numb',$erreur)){echo "is-invalid";}?>">
        <div class="invalid-feedback"><?php if(array_key_exists('invoice_numb',$erreur)){echo $erreur['invoice_numb'];}?></div>
    </div>

<!--/////Input formulaire Date Facture format "date"...-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Date facture</label>
            <input type="date" name="invoiced_date" value="<?php if(isset($_POST['invoiced_date'])){echo $_POST['invoiced_date'];}else{echo $resultat['invoiced_date'];}?>" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">
            </div>
        </div>

<!--/////Input formulaire Date Service format "date"...-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Date service</label>
            <input type="date" name="service_date" value="<?php if(isset($_POST['service_date'])){echo $_POST['service_date'];}else{echo $resultat['service_date'];}?>" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">...</div>
        </div>

<!--////SELECT INNER JOIN Last_name, First_name, Comp_name, Id_comp, Id_contact dans liste déroule "select" > "option"///-->
<div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">Société</label>
        <select class="form-control <?php if(array_key_exists('societe',$erreur)){echo "is-invalid";}?>"  name="societe">
      
            <option value="" ><?php if($_POST['societe']){echo $value['comp_name'];}else{echo 'Société';}?></option>
            <?php
            $queryCompany = $bdd->prepare("SELECT * FROM company LEFT JOIN contacts ON contacts.company_id_company = company.id_company"); 
            $queryCompany->execute(array()); 
            
            foreach ($queryCompany as $key => $value){
            ?>
            <option <?php if($resultat['id_company'] == $value['id_company']){echo "selected='selected'";}elseif($_POST['societe'] == $value['id_company']){echo "selected='selected'";}?> value="<?= $value['id_company'];?>">
            <?= $value['comp_name'].' <-> '.$value['first_name'].' '.$value['last_name'];?>
            </option>
            <?php
            }
            ?>
        </select>
        <div class="invalid-feedback"><?php if(array_key_exists('societe',$erreur)){echo $erreur['societe'];}?></div>
    </div>

        


       

<!--/////Button submit...-->
        <div class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block"> Submit </button>
        </div>

            </form>
        </article>
    </div>
</div>
