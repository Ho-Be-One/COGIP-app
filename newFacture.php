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

// $queryModify = $bdd->prepare("SELECT id_invoice, invoice_num, invoiced_date, service_date FROM invoice WHERE id_invoice = ?");
// $queryModify->execute(array($_GET["invoice"]));
// $result = $queryModify->fetch();
// $row = $queryModify->rowCount();

if (isset($_POST['submit']) && isset($_POST['invoiceNum'])){
	// date_default_timezone_set('Europe/Brussels');
	// $invoiceNum = htmlspecialchars(trim($_POST['invoiceNum']));  
    // $erreur=array();
    
///////Connexion a la db
	include "./assets/connexion/bd.php";

//////Insertion de nouvelles données ds la db SI le bouton est défini

    $req = $bdd->prepare('INSERT INTO invoice (contacts_id_contacts, company_id_company, invoice_num, invoiced_date, service_date) VALUES (?,?,?,?,?)');
    
	$req->execute(array(
        $_POST['idContact'],
        $_POST['idCompany'],
		$_POST['invoiceNum'],
		$_POST['invoicedDate'],
		$_POST['serviceDate'],
    ));
    $_SESSION['flash']['success']="Les données ont été ajoutées";
    header('Location:newFacture.php');
}
?>

<div class="container pb-5">
    <br>
    <p class="text-center">
    <?php
        // if($row){
            ?>
            <!-- Modification de facture -->
            <?php
        //     echo $result['invoice_num'];}
        // else echo ('Nouvelle société');
        ?>
    </p>

    <div class="card bg-light">
        <article class="card-body mx-auto col-xl-5">
            <form method="post" action="">
            <?php
            // if ($row){
                ?>
            <!-- <input type="hidden" name="modif" value="modif"/> -->
            <?php
            // }
            ?>
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

        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Date facture</label>
            <input type="text" value="" name="invoicedDate" class="form-control" id="inputInvalid" placeholder="AAAA-MM-JJ">
            <div class="invalid-feedback">
            </div>
        </div>

        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Date service</label>
            <input type="text" value="" name="serviceDate" class="form-control" id="inputInvalid" placeholder="AAAA-MM-JJ">
            <div class="invalid-feedback">...</div>
        </div>

        <!--////Select de tous les last_name and first name dans une liste déroulante///-->
        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">Nom Contact N°Id & Société N°Id</label>
            <select class="form-control" name="dataNewInvoice" required><option selected>Selectionner dans la liste...</option>
            <?php $req=$bdd->prepare('SELECT contacts.last_name, contacts.first_name, contacts.id_contacts, contacts.company_id_company, company.comp_name FROM contacts INNER JOIN company ON company_id_company = id_company');

        $req->execute(array());
            while ($resultat = $req->fetch())
                {
            ?>
            <option><?=$resultat['last_name'] . " " . $resultat['first_name'] . " N° id " . $resultat['id_contacts'] . " / " . $resultat['comp_name'] . " N° id Société " . $resultat['company_id_company']?></option>
            <option value='idContact' hidden ><?= $resultat['id_contacts']?></option>
            <option value='idCompany' hidden ><?=$resultat['company_id_company']?></option>
            <?php
                };
            ?>
            </select>
        </div>

        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1"><br><b>Confirmation : </b><br><br>N°id contact</label>
            <input type="text" value="" name="idContact" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">...</div>
        </div>

        <div class="form-group has-danger">
            <label class="form-control-label" for="inputDanger1">N°id société</label>
            <input type="text" value="" name="idCompany" class="form-control" id="inputInvalid">
            <div class="invalid-feedback">...</div>
        </div>

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