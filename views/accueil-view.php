<?php
if(isset($url[1])){$limit = $url[1];}else{$limit = 5;}
?>
<div class="container col-xl-6 ">
    <?php
	include 'flash-alert.php';
	?>
    <h4 class="pt-5 pb-5">Bienvenue</h4>
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
    <div id="myTabContent" class="bord tab-content p-3">
        <div class="tab-pane fade show active" id="factures">
            <?php require 'factures-tab-view.php'; ?>
        </div>
        <div class="tab-pane fade" id="contacts">
            <?php require 'contacts-tab-view.php'; ?> 
        </div>
        <div class="tab-pane fade" id="societes">
            <?php require 'societes-tab-view.php';?>
        </div>
    </div>
</div>
