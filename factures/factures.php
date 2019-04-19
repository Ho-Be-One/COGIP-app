<?php session_start();
include './assets/ins/function.php';
include './assets/ctrl/login-ctrl.php';
include './head/header.php';
include './head/menu.php';
$limit = 1000000000000;
?>
<div class="container col-xl-6 ">
    <?php
	include 'flash-alert.php';
	?>
    <h4 class="pt-5 pb-5">Bienvenue</h4>
   
   
            <?php include 'tabAccueil/factures.php'; ?>
        
   
</div> 
<?php
include './foot/footer.php';
?>

