<?php session_start();
include './assets/ins/function.php';
// include './assets/ctrl/login-ctrl.php';
include './head/header.php';
include './head/menu.php';
noConnected();
include './assets/connexion/bd.php';
?>
<div class="container col-xl-6">
    <h1 class="p-5" style="text-align:center">Facture: <?=$_GET['invoice']?></h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">##</th>
            <th scope="col">N° facture</th>
            <th scope="col">Date facture</th>
            <th scope="col">Date service</th>
        </tr>
    </thead>
    <tbody>
        <tr class="table">
        <?php
        $req = $bdd->prepare('SELECT id_invoice, invoice_num, invoiced_date, service_date FROM invoice WHERE invoice_num = ?');

        $req->execute(array($_GET["invoice"]));

        while ($resultat = $req->fetch()){
            ?>
            <td><?= $resultat['id_invoice']?></td>
            <td><?= $resultat['invoice_num']?></td>
            <td><?= $resultat['invoiced_date']?></td>
            <td><?= $resultat['service_date']?></td>
        </tr>
    </tbody>
<?php
};
?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Société</th>
                    <th scope="col">Type</th>
                    <th scope="col">N° TVA</th>
                    <th scope="col">Pays</th>
                </tr>
            </thead>

            <tbody>
                <tr class="table">
                <?php
                $req = $bdd->prepare('SELECT company.comp_name, company.comp_type, company.vat_number, company.country FROM company INNER JOIN invoice ON company_id_company = id_company WHERE invoice_num = ?');

                $req->execute(array($_GET["invoice"]));

                while ($resultat = $req->fetch()){
                ?>
                    <td><?= $resultat['comp_name']?></td>
                    <td><?= $resultat['comp_type']?></td>
                    <td><?= $resultat['vat_number']?></td>
                    <td><?= $resultat['country']?></td>
                </tr>
            </tbody>
<?php
};
?>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nom contact</th>
                            <th scope="col">Prénom contact</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>

                    <tbody>
                    <tr class="table">
                        <?php
                        $req = $bdd->prepare('SELECT contacts.last_name, contacts.first_name, contacts.mail, contacts.Telephone FROM contacts INNER JOIN invoice ON contacts_id_contacts = id_contacts WHERE invoice_num = ?');

                        $req->execute(array($_GET["invoice"]));

                        while ($resultat = $req->fetch()){
                        ?>
                        
                            <td><?= $resultat['last_name']?></td>
                            <td><?= $resultat['first_name']?></td>
                            <td><?= $resultat['mail']?></td>
                            <td><?= $resultat['Telephone']?></td>
                        </tr>
                    </tbody>
<?php
};
?>             
    </table>
</div>
<?php
include './foot/footer.php';
?>