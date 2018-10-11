<!DOCTYPE html>
<html><head></head>
<body>
<?php
session_start();
    if(empty($_POST['login'])&& empty($_POST['password']))
	{
	 header("Location:index.html"); 
	} 

	else{
	include('connexpdo.inc.php'); 
	if($idcom=connexpdo('ur_abaq','myparam')){
	$nom=$idcom->quote($_POST['login']);
	$pass=$idcom->quote($_POST['password']);
       
	//Requête SQL
	$requete="SELECT * FROM Utilisateur WHERE Login=$nom and Password=$pass";
        $result=$idcom->query($requete);
	$nb=$result->rowCount(); 
 
    if($nb!=1){
    echo"<script type=\"text/javascript\">
	alert(\" Erreur : nom d'utilisateur ou mot de passe incorrect\");
	window.location='index.html';</script>";
    }
    else{
        $_SESSION['utilisateur'] = $nom;
       
        echo"<script type=\"text/javascript\">
	    window.location='accueil.php';</script>";
    }
     
	$result->closeCursor();	$idcom=null;
 }
  else{
    echo"<script type=\"text/javascript\">alert('Impossible de se connecter au serveur');
	window.location='index.html';</script>";
  }

}

?>
</body>
</html>