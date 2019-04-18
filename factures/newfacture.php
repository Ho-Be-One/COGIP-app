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

$queryModify = $bdd->prepare("SELECT * FROM invoice WHERE id_invoice = ?");
$queryModify->execute(array($_GET["id"]));
$result = $queryModify->fetch();
$row = $queryModify->rowCount();
?>

<div class="container pb-5">
    <br>
    <p class="text-center">
    <?php
        if ($row){
            ?>
            Modification de facture :
            <?php
            echo $_GET["id"];}
        else echo ('Nouvelle facture');
        ?>
    </p>

    <div class="card bg-light">
        <article class="card-body mx-auto col-xl-5">

<!--/////Formulaire method post ou get...-->
            <form method="post" action="">
            <?php
            // if ($row){
                ?>
            <!-- <input type="hidden" name="modif" value="modif"/> -->
            <?php
            // }
            ?>

<!--/////Input formulaire N°Facture...-->
    <div class="form-group has-danger">
        <label class="form-control-label" for="inputDanger1">N° facture</label>
        <input type="text" value="
<?php
            // if(isset($_POST['invoiceNum'])){echo $_POST['invoiceNum'];}else{echo $result['invoice_num'];}
?>
        " name="invoiceNum" class="form-control
<?php
            // if(array_key_exists('invoice',$erreur)){echo
?>
        " id="inputInvalid">
        <div class="invalid-feedback">
<?php
        // if(array_key_exists('invoice',$erreur)){echo $erreur['invoice'];}
?>
    </div>
</div>

<!--/////Input formulaire Date Facture format "date"...-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Date facture</label>
            <input type="date" value="" name="invoicedDate" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">
            </div>
        </div>

<!--/////Input formulaire Date Service format "date"...-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Date service</label>
            <input type="date" value="" name="serviceDate" class="form-control" id="inputInvalid">
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
            <option value='idContact' hidden ><?= $resultat['id_contacts']?></option>
            <option value='idCompany' hidden ><?=$resultat['company_id_company']?></option>
            <?php
                };
            ?>
            </select>
        </div>

<!--/////Input Id_contact-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1"><br><b>Confirmation : </b><br><br>N°id contact</label>
            <input type="text" value="" name="idContact" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">...</div>
        </div>

<!--/////Input Id_comp...-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">N°id société</label>
            <input type="text" value="" name="idCompany" class="form-control" id="inputInvalid">
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