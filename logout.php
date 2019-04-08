<?php 
session_start();
if(isset($_SESSION['auth']))/* pas de destruction si pas de session*/
 	 {
unset($_SESSION['auth']);
session_destroy();
setcookie('remember',NULL, -1);
session_start();
$_SESSION['flash']['info']="Vous avez été déconnecté. A bientôt...";
header("Location:index.php");
exit();
}
else
{
die(header("Location:index.php"));
}
?>