<?php session_start();
include './assets/ins/function.php';
include './assets/ctrl/contact-ctrl.php';
include './head/header.php';
include './head/menu.php';
noConnected();
include "./assets/connexion/bd.php";

if(isset($_GET['id'])){
    $editeContact = $bdd->prepare("SELECT * FROM contacts LEFT JOIN company ON company.id_company=contacts.company_id_company WHERE id_contacts=:id_contacts");
    $editeContact->execute(array(
    'id_contacts' => $_GET['id']
    ));
    $resultat = $editeContact->fetch();
    $row = $editeContact->rowCount();
}


// vérification si le mail existe et recupération du mot de passe
$queryCompany = $bdd->prepare("SELECT * FROM company"); 
$queryCompany->execute(array()); 
?>

<div class="container pb-5">
<br>
<p class="text-center"><?php if($row){echo 'Modifier le profil de : <b>'.$resultat['first_name'].' '.$resultat['last_name'].'</b>';}else{echo 'Nouveau contact';}?></p>

<div class="card bg-light">
<article class="card-body mx-auto col-xl-4" >
<form actions="" method="post">
    <?php
    if($row){
    ?>
    <input type="hidden" name="code" value="modif007"/>
    <?php
    }
    ?>
    <div class="form-group has-danger">
        <label class="form-control-label">Nom</label>
        <input type="text" name="last_name" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];}else{echo $resultat['last_name'];}?>"
                class="form-control <?php if(array_key_exists('last_name',$erreur)){echo "is-invalid";}?>">
        <div class="invalid-feedback"><?php if(array_key_exists('last_name',$erreur)){echo $erreur['last_name'];}?></div>
    </div>

    <div class="form-group has-danger">
        <label class="form-control-label">Prénom</label>
        <input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];}else{echo $resultat['first_name'];}?>"
                class="form-control <?php if(array_key_exists('first_name',$erreur)){echo "is-invalid";}?>">
        <div class="invalid-feedback"><?php if(array_key_exists('first_name',$erreur)){echo $erreur['first_name'];}?></div>
    </div>


    <div class="form-group input-group has-danger mt-4">
        <select class="custom-select <?php if(array_key_exists('phone',$erreur)){echo "is-invalid";}?>" name="device" style="max-width: 120px;">
        <option selected=""><?php if(isset($_POST['device'])){echo $_POST['device'];}else{echo 'Device';}?></option>
            <option value="Mobile">Mobile</option>
            <option value="Fixe">Fixe</option>
        </select>
        <input type="type" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}else{echo $resultat['Telephone'];}?>" name="phone" placeholder="Phone" class="form-control <?php if(array_key_exists('phone',$erreur)){echo "is-invalid";}?>">
        <div class="invalid-feedback"><?php if(array_key_exists('phone',$erreur)){echo $erreur['phone'];}?></div>

    </div>
                       
    <div class="form-group has-danger">
        <label class="form-control-label">Adresse mail</label>
        <input type="text" name="mail" value="<?php if(isset($_POST['mail'])){echo $_POST['mail'];}else{echo $resultat['mail'];}?>"
                class="form-control <?php if(array_key_exists('mail',$erreur)){echo "is-invalid";}?>" id="inputInvalid">
        <div class="invalid-feedback"><?php if(array_key_exists('mail',$erreur)){echo $erreur['mail'];}?></div>
    </div>

    <div class="form-group has-danger">
    <label class="form-control-label" for="inputDanger1">Société</label>
        <select class="form-control <?php if(array_key_exists('societe',$erreur)){echo "is-invalid";}?>"  name="societe">
            <?php
            if(isset($_POST['societe'])){
            $checkComp = $bdd->prepare("SELECT  comp_name FROM company WHERE id_company=:id_company");
            $checkComp->execute(array(
            'id_company'=> $_POST['societe'],
            ));
            $comp_name = $checkComp->fetch();
            }
            ?>
            <option valu="" ><?php if($_POST['societe']){echo $value['comp_name'];}else{echo 'Société';}?></option>
            <?php
            foreach ($queryCompany as $key => $value){
            ?>
            <option <?php if($_POST['societe'] == $value['id_company']){echo "selected='selected'";}elseif($resultat['societe'] == $value['id_company']){echo "selected='selected'";}?> value="<?= $value['id_company'];?>">
            <?= $value['comp_name'];?>
            </option>
            <?php
            }
            ?>
        </select>
        <div class="invalid-feedback"><?php if(array_key_exists('societe',$erreur)){echo $erreur['societe'];}?></div>
    </div>

    <div class="form-group">
        <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block"><?php if($row){echo '<i class="fa fa-pencil"></i> Modifier';}else{echo 'Inscrire';}?></button>
    </div>

</form>
</article>
</div> 

</div> 
<?php
include './foot/footer.php';
?>
