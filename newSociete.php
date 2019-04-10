<?php session_start();
include './assets/ins/function.php';
include './assets/ctrl/newSociete-ctrl.php';
include './head/header.php';
include './head/menu.php';
noConnected();
?>

<div class="container pb-5">
<br>
<p class="text-center">Nouvelle société</p>
<?php
		include './flash-alert.php';
?>
<div class="card bg-light">
<article class="card-body mx-auto col-xl-5" >

<form action="" method="post">

	<div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">Nom de société</label>
    <input type="text" value="<?php if(isset($_POST['companyName'])){echo $_POST['companyName'];}?>" name="companyName" class="form-control <?php if(array_key_exists('company',$erreur)){echo "is-invalid";}?>" id="inputInvalid">
    <div class="invalid-feedback"><?php if(array_key_exists('company',$erreur)){echo $erreur['company'];}?></div>
    </div>

    <div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">Pays</label>
    <input type="text" value="<?php if(isset($_POST['companyCountry'])){echo $_POST['companyCountry'];}?>" name="companyCountry" class="form-control <?php if(array_key_exists('country',$erreur)){echo "is-invalid";}?>" id="inputInvalid">
    <div class="invalid-feedback"><?php if(array_key_exists('country',$erreur)){echo $erreur['country'];}?></div>
    </div>

    <div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">N° de TVA</label>
    <input type="text" placeholder="XX123456789" value="<?php if(isset($_POST['companyVat'])){echo $_POST['companyVat'];}?>" name="companyVat" class="form-control <?php if(array_key_exists('vat',$erreur)){echo "is-invalid";}?>" id="inputInvalid">
    <div class="invalid-feedback"><?php if(array_key_exists('vat',$erreur)){echo $erreur['vat'];}?></div>
    </div>

    <div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">Type de société</label>
    <select class="form-control" name="companyType" required>
        <option value="client">client</option>
        <option value="fournisseur">fournisseur</option>
    </select>
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