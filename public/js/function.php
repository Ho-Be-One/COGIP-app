<?php
function noConnected(){
	if(session_status() == PHP_SESSION_NONE){
	session_start();
	}
	if(!isset($_SESSION['auth']))
	{
	?>
	<script LANGUAGE="JavaScript">
	document.location.href="../connexion"
	</script>
	<?php
	}
}

function connected(){
	if(session_status() == PHP_SESSION_NONE){
	session_start();
	}
	if(isset($_SESSION['auth']))
	{
	?>
	<script LANGUAGE="JavaScript">
	document.location.href="../accueil/01"
	</script>
	<?php
	}
}
   	
function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890'){
	$nb_lettres = strlen($chaine) - 1;
	$generation = '';
	for($i=0; $i < $nb_car; $i++)
	{
	$pos = mt_rand(0, $nb_lettres);
	$car = $chaine[$pos];
	$generation .= $car;
	}
	return $generation;
	}
			
function checkMail($champ){
	
	if (empty($champ)){
		return 'Indiquer votre <b>Adresse mail</b>';
		}
		else{
		$ValideEmail=(preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#',$champ))?$champ:null;
		if (empty($ValideEmail)){
			return 'Le format de <b>l\'adresse mail</b> est incorrecte';		
			}
		else{
			return ;
		}
	}
}	

function checName($value, $item){
	if (empty($value)){
		return 'Indiquer votre <b> '.$item.' </b> !';
		}
		else{
	if (preg_match('#[%\§\?\!\$\(\)\*\+\{\}\[\]\^\#@€`</>]+#',$value)){
		return "No caractères spéciaux ! dans le champs <b> '.$item.' </b>";
		}
	if (20 < $countResultat = strlen(utf8_decode($value))){
		return "20 caractères maximum ! dans le champs <b> '.$item.' </b>";
		}
		else{
			return ;

		}
	}

}

function checkPhone($Value, $device){
	if (empty($Value)){
	return "Indique un numero de téléphone";
	}else{
		if($device == 'Mobile'){
		
			if(!preg_match('#^\+324[5-9]{2}/[0-9]{2}.[0-9]{2}.[0-9]{2}$#', $Value))
			{
				return "<b>Mobile</b> ex : +32455/55.55.55";	

			}
		
	}
	elseif($device == 'Fixe'){
		if(!preg_match('#^\+32[1-9][0-9]?/[1-9]{3}.[0-9]{2}.[0-9]{2}$#',  $Value))
	    {
			return "Indiquez un numéro de <b>téléphone</b> au format : Ex : +322/999.99.99"; 

	    }
	}
	else{
		return ;

	}
}
}

function checkCompany($Value){
	if (empty($Value)){
	return "Indique une companie";
		}else{
			return;
		}
	
}