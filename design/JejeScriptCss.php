<?php
if(!empty($_POST['design'])) {
	switch($_POST['design']) {
		case 'Black' :
		$choix = '1';
		break;
		
		case 'Classic' :
		$choix = '2';
		break;
		
		case 'Vintage' :
		$choix = '3';
		break;
	}
	$id = $_SESSION['id'];
	$resultat = Bdd::connectBdd()->prepare(UPDATE.MEMBREZ.DESIGN.ID);
	$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
	$resultat -> bindParam(':design', $choix, PDO::PARAM_INT, 1);
	$resultat -> execute();
}
$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.ID);
$resultat -> bindParam(':id', $_SESSION['id'], PDO::PARAM_INT, 11);
$resultat -> execute();
$ledesign = $resultat -> fetch(PDO::FETCH_ASSOC);
$desgin = $ledesign['design'];
switch($desgin) {
	case 1 : 
	$retour = '<link href="'.URLSITE.'/design/black-style.css" rel="stylesheet" type="text/css" />';
	break;
	
	case 2 : 
	$retour = '<link href="'.URLSITE.'/design/classic-style.css" rel="stylesheet" type="text/css" />';
	break;
	
	case 3 :
	$retour = '<link href="'.URLSITE.'/design/vintage-style.css" rel="stylesheet" type="text/css" />';
	break;
}
echo $retour;
?>