<?php session_start();
include './assets/ins/function.php';
// include './assets/ctrl/newFacture-ctrl.php';
include './head/header.php';
include './head/menu.php';
noConnected();
include './assets/connexion/bd.php';

// $_POST['lastName'];
// $rec = explode('-','$lastName');
// var_dump $rec;

$idBis=explode ("&", $_GET['id']);

if(isset($_GET['id'])){
$invoiceModify = $bdd->prepare("SELECT * FROM invoice WHERE invoice_num =:invoice_num");
$invoiceModify->execute(array('invoice_num'=>$_GET['id']));
$resultat = $invoiceModify->fetch();
$row = $invoiceModify->rowCount();
}

// vérification si le mail existe et recupération du mot de passe
$queryInvoice = $bdd->prepare("SELECT * FROM invoice"); 
$queryInvoice->execute(array());
?>

<div class="container pb-5">
    <br>
    <p class="text-center">
    <?php
        if($row){
            echo 'Modification de facture : '
            . $resultat["invoice_num"];
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
        <input type="text" name="invoice_num" value="<?php if(isset($_POST['invoice_num'])){echo $_POST['invoice_num'];}else{echo $resultat['invoice_num'];}?>"                 class="form-control <?php if(array_key_exists('invoice_num',$erreur)){echo "is-invalid";}?>">
        <div class="invalid-feedback"><?php if(array_key_exists('invoice_num',$erreur)){echo $erreur['invoice_num'];}?></div>
</div>

<!--/////Input formulaire Date Facture format "date"...-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Date facture</label>
            <input type="date" name="invoiced_date" value="<?php echo $resultat['invoiced_date'];?>" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">
            </div>
        </div>

<!--/////Input formulaire Date Service format "date"...-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Date service</label>
            <input type="date" name="service_date" value="<?php echo $resultat['service_date'];?>" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">...</div>
        </div>

<!--////SELECT INNER JOIN Last_name, First_name, Comp_name, Id_comp, Id_contact dans liste déroule "select" > "option"///-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Nom Contact N°Id & Société N°Id</label>
            <select class="form-control" name="dataNewInvoice" required><option selected>Selectionner dans la liste...</option>
            <?php $req=$bdd->prepare('SELECT contacts.last_name, contacts.first_name, contacts.id_contacts, contacts.company_id_company, company.comp_name FROM contacts INNER JOIN company ON company_id_company = id_company');

        $req->execute(array());
            while ($resultat = $req->fetch())
                {
            ?>
            <option><?=$resultat['last_name'] . " " . $resultat['first_name'] . " N° id " . $resultat['id_contacts'] . " / " . $resultat['comp_name'] . " N° id Société " . $resultat['company_id_company']?></option>
<!--/////Select en valeurs cachée "hidden"-->
            <option value='idContact' hidden ><?=$resultat['id_contacts']?></option>
            <option value='idCompany' hidden ><?=$resultat['company_id_company']?></option>
            <?php
                };
            ?>
            </select>
        </div>

<!--/////Input Id_contact-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1"><br><b>Confirmation : </b><br><br>N°id contact</label>
            <input type="text" name="id_contact" value="<?php echo $resultat['id_contacts'];?>" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">...</div>
        </div>

<!--/////Input Id_comp...-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">N°id société</label>
            <input type="text" name="id_company" value="<?php echo $resultat['company_id_company'];?>" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">...</div>
        </div>

<!--/////Button submit...-->
        <div class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block"> Submit </button>
        </div>

            </form>
        </article>
    </div>
</div>

<?php
include './foot/footer.php';
?>