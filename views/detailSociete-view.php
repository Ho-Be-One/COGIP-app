<div class="container col-xl-6">
<h3 class="pb-5 pt-5">Société: <?=$nameComp['comp_name']?></h3>
<h4 class="pt-5">Personnes de contact</h4>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Mail</th>
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
        <tr class="table">
        <?php
       
        while ($resultat = $queryData2->fetch()) {
        ?>
        <td><?=$resultat['last_name']?></td>
        <td><?=$resultat['first_name']?></td>
        <td><?=$resultat['Telephone']?></td>
        <td><?=$resultat['mail']?></td>
        <td class="text-center"><a href="detailContact-<?= $resultat['id_contacts'];?>"><i class="fa fa-eye"></i></a></td>
        <?php
        if($_SESSION['auth']['level'] == 'godmode'){ 
        ?>
        <td class="text-center"><a href="../newContact/<?= $resultat['id_contacts'];?>" class="text-success"><i class="fa fa-pencil"></i></a></td>
        <td class="text-center"><a href="../deleteContact/<?= $value['id_contacts'];?>-<?= $value['id_company'];?>" class="text-danger"><i class="fa fa-times"></i></a></td>
        <?php
        }
        ?>
        </tr>
        <?php
        };
        ?> 
    </tbody>
</table>

<h4 class="pt-5">Factures</h4>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">N° de facture</th>
        <th scope="col">Date facture</th>
        <th scope="col">Personne de contact</th>
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
        <tr class="table">
        <?php
        

        while ($resultat = $queryData3->fetch()) {
        ?>
        <td><?=$resultat['invoice_num']?></td>
        <td><?=$resultat['invoiced_date']?></td>
        <td><?=$resultat['first_name'].' '.$resultat['last_name']?></td>
        <td class="text-center"><a href="detailFactures-<?= $resultat['invoice_numb'];?>"><i class="fa fa-eye"></i></a></td>
        <?php
        if($_SESSION['auth']['level'] == 'godmode'){ 
        ?>
        <td class="text-center"><a href="../newContact/<?= $resultat['id_contacts'];?>" class="text-success"><i class="fa fa-pencil"></i></a></td>
        <td class="text-center"><a href="./assets/ctrl/deleteContact.php?contact=<?= $value['id_contacts'];?>&delete=supp&company=<?= $value['id_company'];?>" class="text-danger"><i class="fa fa-times"></i></a></td>
        <?php
        }
        ?>
        </tr>
        <?php
        };
        ?>
    </tbody>
</table>


