<?php session_start();
include './assets/ins/function.php';
include './assets/ctrl/login-ctrl.php';
include './head/header.php';
include './head/menu.php';
$page = contact;
global $page;
$limit = 1000000000000000;
?>
<div class="container col-xl-6 ">
<?php
    include 'flash-alert.php';
    ?>
    <h4 class="pt-5 pb-5"><strong>COGIP</strong> : Annuaire des contacts</h4>
    <?php
    include './tabAccueil/contacts.php';
    ?>
</div> 
<?php
include './foot/footer.php';
?>
<!-- is-invalid -->
