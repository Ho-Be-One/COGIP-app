<?php session_start();
include './assets/ins/function.php';
include './assets/ctrl/login-ctrl.php';
include './head/header.php';
connected();
?>
<div class="container">
    <h1 class="text-center p-5">Bienvenue à la Cogip</h1>
    <?php
	include 'flash-alert.php';
	?>
    <article class="card-body mx-auto" style="max-width: 400px;">
            <p class="divider-text pt-2 pb-2 ">
                Bienvenue dans l'espace de connexion de COGIP
            </p>
        <form action="" method="post">
            <div class="form-group has-danger">
                <label class="form-control-label">Adresse mail</label>
                <input type="text" name="mail" value="<?php if(isset($_POST['mail'])){echo $_POST['mail'];}?>"
                       placeholder="Adresse mail"
                       class="form-control <?php if(array_key_exists('mail',$erreur)){echo "is-invalid";}?>" id="inputInvalid">
                <div class="invalid-feedback"><?php if(array_key_exists('mail',$erreur)){echo $erreur['mail'];}?></div>
            </div>

            <div class="form-group has-danger">
                <label class="form-control-label">Mot de passe</label>
                <input type="password"
                       name="mdp" value="<?php if(isset($_POST['mdp'])){echo $_POST['mdp'];}?>"
                       placeholder="Mot de passe"
                       class="form-control <?php if(array_key_exists('mdp',$erreur)){echo "is-invalid";}?>" id="inputInvalid">
                <div  class="invalid-feedback"><?php if(array_key_exists('mdp',$erreur)){echo $erreur['mdp'];}?></div> 
            </div>

            <div class="form-group">
                <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block"> Connexion </button>
            </div>     
        </form>
    </article>
</div> 
<?php
include './foot/footer.php';
?>
<!-- is-invalid -->
