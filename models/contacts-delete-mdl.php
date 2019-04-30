<?php
if (isset($url[0], $url[1], $url[2])){

    $suppContact = $bdd->prepare("SELECT * FROM contacts WHERE company_id_company=?");
    $suppContact->execute(array(
    $url[2]
    ));

    $row = $suppContact->rowCount();
    $valueEcho = $suppContact->fetch();

    if ($row > 1) {

        $suppp = $bdd->prepare("DELETE FROM contacts WHERE id_contacts=?");
        $suppp->execute(array(
        $url[1]
        ));
        $_SESSION['flash']['success'] ='Le contact a été supprimé avec succès!';
        header('location:contacts-00');
    }
    else{
        $_SESSION['flash']['danger'] = '<b>'.$valueEcho['first_name'].' '.$valueEcho['last_name'].'</b> est le seul interlocuteur de la société <b>'.$valueEcho['comp_name'].'. <br><br>
        Pour supprimer ce contact :</b><br><br> 1 : Assigné à la société <b>'.$valueEcho['comp_name'].'</b> un deuxième contact.<br> 2 - Supprimer le profil de : <b>'.$valueEcho['first_name'].' '.$valueEcho['last_name'].'</b>';
        header('location:contacts-00');
    }
}
else{
    header('location:contacts');
}
?>