<div class="container col-xl-6">
    <h1 class="p-5" style="text-align:center">Facture: <?=$url[1]?></h1>

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
        while ($resultat = $req1->fetch()){
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
                while ($resultat = $req2->fetch()){
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
                        while ($resultat = $req3->fetch()){
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