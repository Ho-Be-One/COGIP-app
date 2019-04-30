<?php
 $delInvoice = $bdd->prepare('DELETE FROM invoice WHERE invoice_numb=?');
 $delInvoice -> execute(array($url[1]));
 $_SESSION['flash']['success'] = "La facture a été supprimée avec succès";
 header('Location:factures');
