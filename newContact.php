<?php session_start();
// include './assets/connexion/bd.php';
include './assets/ins/function.php';
include './assets/ctrl/login-ctrl.php';
include './head/header.php';
include './head/menu.php';
noConnected();
?>

<div class="container pb-5">
<br>
<p class="text-center">Nouveau contact</p>

<div class="card bg-light">
<article class="card-body mx-auto col-xl-5" >
<form>

	<div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">Nom</label>
    <input type="text" value="" class="form-control" id="inputInvalid">
    <!-- <div class="invalid-feedback">...</div> -->
    </div>

    <div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">prénom</label>
    <input type="text" value="" class="form-control" id="inputInvalid">
    <!-- <div class="invalid-feedback">...</div> -->
    </div>

    <div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">Phone</label>
    <input type="text" value="" class="form-control" id="inputInvalid">
    <!-- <div class="invalid-feedback">...</div> -->
    </div>

    <div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">E-mail</label>
    <input type="text" value="" class="form-control" id="inputInvalid">
    <!-- <div class="invalid-feedback">...</div> -->
    </div>

    <div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">Société</label>
    <input type="text" value="" class="form-control" id="inputInvalid">
    <!-- <div class="invalid-feedback">...</div> -->
    </div>
                                         
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Submit </button>
    </div>

</form>
</article>
</div> 

</div> 
<?php
include './foot/footer.php';
?>
