<?php
session_start();
if (isset($_GET['id'])){

    $value = explode('-',$_GET['id']);
    $id_company = $value[1].'<br>';
    echo $id_contact = $value[0];  

		include "assets/connexion/bd.php";
        
        $suppContact = $bdd->prepare("SELECT * FROM contacts WHERE company_id_company=?");
        $suppContact->execute(array(
        $id_company
        ));

        $row = $suppContact->rowCount();
        $valueEcho = $suppContact->fetch();

        if ($row > 1) {

            $suppp = $bdd->prepare("DELETE FROM contacts WHERE id_contacts=?");
            $suppp->execute(array(
            $id_contact
            ));
            $_SESSION['flash']['success'] ='Le contact a été supprimé avec succès!';
            ?>
            <script LANGUAGE="JavaScript">
            document.location.href="../contacts/04"
            </script>
            <?php
        }
        else{
            $_SESSION['flash']['danger'] = '<b>'.$valueEcho['first_name'].' '.$valueEcho['last_name'][0].'</b> est le seul interlocuteur de la société <b>'.$valueEcho['comp_name'].'. <br><br>
            Pour supprimer ce contact :</b><br><br> 1 : Assigné à la société <b>'.$valueEcho['comp_name'].'</b> un deuxième contact.<br> 2 - Supprimer le profil de : <b>'.$valueEcho['first_name'].' '.$valueEcho['last_name'].'</b>';
            ?>
            <script LANGUAGE="JavaScript">
            document.location.href="../contacts/04"
            </script>
            <?php
        }
}
?>