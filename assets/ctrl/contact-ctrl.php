<?php
if (isset($_POST['submit'])){

    $mail = htmlspecialchars(trim($_POST['mail']));
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $device = htmlspecialchars(trim($_POST['device']));
    $societe = htmlspecialchars(trim($_POST['societe']));

    include "assets/connexion/bd.php";

    $erreur=array();

    //// last_name ////////////////////////////////////////////////////////////////////////////////////////	
    $erreur['last_name'] = checName($last_name, 'Nom');
    if($erreur['last_name'] == null){
    unset($erreur['last_name']);
    }
    
    //// first_name ///////////////////////////////////////////////////////////////////////////////////
    $erreur['first_name'] = checName($first_name, 'Prénom');
    if($erreur['first_name'] == null){
    unset($erreur['first_name']);
    }

    //// phone ////////////////////////////////////////////////////////////////////////////////////////
    $erreur['phone'] = checkPhone($phone, $device);
    if($erreur['phone'] == null){
    unset($erreur['phone']);
    }

    //// mail ////////////////////////////////////////////////////////////////////////////////////////	
    $erreur['mail'] = checkMail($mail);
    if($erreur['mail'] == null){
        unset($erreur['mail']);
    }
    //// Si mail existe déjà  /////////////////////////////////////////////////////////////////////////
    if($_POST['code'] == 'modif007'){
    $alreadyMail = $bdd->prepare('SELECT id_contacts, mail FROM contacts WHERE id_contacts!=:id_contacts AND mail=:mail');
    $alreadyMail->execute(array(
    'id_contacts' => $_GET['id'],     
    'mail' => $mail,    
    ));
    $row = $alreadyMail->rowCount();
    if($row){
    $erreur['mail'] = "Cette <b>adresse mail</b> est ddéjà utilisée";
    }
    }
    else{
        $alreadyMail = $bdd->prepare('SELECT mail FROM contacts WHERE mail=:mail');
        $alreadyMail->execute(array(
        'mail' => $mail    
        ));
        $row = $alreadyMail->rowCount();
        if($row){
        $erreur['mail'] = "Cette <b>adresse mail</b> est déjà utilisée";
        } 
    }
    //// company /////////////////////////////////////////////////////////////////////////////////////
    $erreur['societe'] = checkCompany($societe);
    if($erreur['societe'] == null){
        unset($erreur['societe']);
    }

    if (empty($erreur)){
        session_start();
        if(isset($_POST['code'])){
            if($_POST['code'] == 'modif007'){

                $id_contacts = $_GET['id'];
                
                $updateContact = $bdd->prepare("UPDATE contacts SET last_name=:last_name, first_name=:first_name, mail=:mail, Telephone=:telephone, company_id_company=:company_id_company WHERE id_contacts= :id_contacts");
                $updateContact->execute(array(
                'last_name'=> $last_name,
                'first_name' => $first_name,
                'mail' => $mail,
                'telephone' => $phone,
                'company_id_company' => (int)$societe,
                'id_contacts'=>$id_contacts
                ));

                $_SESSION['flash']['success']="Contact modifié.";
                ?>
                <script LANGUAGE="JavaScript">
                document.location.href="../contacts/04"
                </script>
                <?php

            }else{
                ?>
                <script LANGUAGE="JavaScript">
                document.location.href="../contacts/04"
                </script>
                <?php
            }
        }else{

        $insertContact = $bdd->prepare("INSERT INTO contacts(last_name, first_name, creation_date, mail, Telephone, company_id_company) VALUES(:last_name, :first_name, :creation_date, :mail, :telephone, :company_id_company)");
        $insertContact->execute(array(
        'last_name'=> $last_name,
        'first_name' => $first_name,
        'creation_date' => date("Y-m-d"),
        'mail' => $mail,
        'telephone' => $phone,
        'company_id_company' => $societe,
        ));

        $_SESSION['flash']['success']="le contact a été rajouté avec succès.";
        }

        ?>
        <script LANGUAGE="JavaScript">
        document.location.href="../contacts/04"
        </script>
        <?php
    }
}
?>