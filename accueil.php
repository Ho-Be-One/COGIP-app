<?php session_start();
include './assets/ins/function.php';
include './assets/ctrl/login-ctrl.php';
include './head/header.php';
include './head/menu.php';
noConnected();
?>
<div class="container col-xl-6 ">
    <h4 class="p-5">Bienvenue</h4>
    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#factures">Dernières factures</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#contacts">Derniers contacts</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#societes">Derniers sociétés</a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content p-3">
        <div class="tab-pane fade show active" id="factures">
            <?php include 'tabAccueil/factures.php'; ?>
        </div>
        <div class="tab-pane fade" id="contacts">
            <?php include 'tabAccueil/contacts.php'; ?> 
        </div>
        <div class="tab-pane fade" id="societes">
            <?php include 'tabAccueil/societes.php';?>
        </div>
    </div>
</div> 
<?php
include './foot/footer.php';
?>
<!-- is-invalid -->
