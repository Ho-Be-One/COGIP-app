<?php session_start();
include './assets/ins/function.php';
include './head/header.php';
include './head/menu.php';
include "./assets/connexion/bd.php";
?>
<div class="container col-xl-6" style="text-align:center">
    <?php
    include './flash-alert.php';
    ?>
    <h2 class="p-5">Annuaire des sociétés</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#clients">Clients</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#fournisseurs">Fournisseurs</a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content pt-4">
        <div class="tab-pane fade show active" id="clients">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">TVA</th>
                    <th scope="col">Pays</th>
                    <th class="text-center"><i class="fa fa-eye"></i></th>
                    <?php
                    if($_SESSION['auth']['level']=='godmode')
                    {?>
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

                    $queryData = $bdd->prepare("SELECT * FROM company WHERE comp_type='client'"); 
                    $queryData->execute(array());

                    while ($resultat = $queryData->fetch()) {
                    ?>
                    <td><?=$resultat['comp_name']?></a></td>
                    <td><?=$resultat['vat_number']?></td>
                    <td><?=$resultat['country']?></td>
                    <td class="text-center"><a href="../detailSociete/<?= $resultat['id_company'];?>"><i class="fa fa-eye"></i></a></td>
                    <?php
                    if($_SESSION['auth']['level']=='godmode')
                    {?>
                    <td class="text-center"><a href="../newSociete/<?= $resultat['id_company'];?>" class="text-success"><i class="fa fa-pencil"></i></a></td>
                    <td class="text-center"><a href='../deleteSociete/<?= $resultat['id_company']?>'><i class="fa fa-times text-danger"></i></a></td>
                    <?php
                    }
                    ?>
                    </tr>
                    <?php
                    };
                    ?> 
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="fournisseurs">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">TVA</th>
                    <th scope="col">Pays</th>
                    <th class="text-center"><i class="fa fa-eye"></i></th>          
                    <?php
                    if($_SESSION['auth']['level']=='godmode')
                    {?>
                    <th class="text-center"><i class="fa fa-pencil"></i></th>
                    <th class="text-center"><i class="fa fa-times" ></i></th>
                    <?php
                    }
                    ?>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table">
                    <?php
                    $queryData = $bdd->prepare("SELECT * FROM company WHERE comp_type='fournisseur'"); 
                    $queryData->execute(array());

                    while ($resultat = $queryData->fetch()) {
                    ?>
                    <td><?=$resultat['comp_name']?></td>
                    <td><?=$resultat['vat_number']?></td>
                    <td><?=$resultat['country']?></td>
                    <td class="text-center"><a href="../detailSociete/<?= $resultat['id_company'];?>"><i class="fa fa-eye"></i></a></td>
                    <?php
                    if($_SESSION['auth']['level']=='godmode')
                    {?>
                    <td class="text-center"><a href="../newSociete/<?= $resultat['id_company'];?>" class="text-success"><i class="fa fa-pencil"></i></a></td>
                    <td class="text-center"><a href='../deleteSociete/<?= $resultat['id_company']?>'><i class="fa fa-times text-danger"></i></a></td>
                    <?php
                    }
                    ?>
                    </tr>
                    <?php
                    };
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>


