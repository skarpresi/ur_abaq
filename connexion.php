<!DOCTYPE html>
<html><head></head>
<body>
<?php

// Verification si les champs login et password ne sont pas vides
    if(empty($_POST['login'])&& empty($_POST['password']))
	{
	 header("Location:index.html"); 
	} 

	else{
        // Connexion à la base de données
	include('connexpdo.inc.php'); 
	if($idcom=connexpdo('ur_abaq','myparam')){
        $login = $idcom->quote($_POST['login']);
	$pass=$idcom->quote($_POST['password']);


        //Requete SQL pour recuperer les informations de l'utilisateur qui veut se connecter
        $requete = "SELECT * FROM Utilisateur WHERE Login=$login";
        $result=$idcom->query($requete);
        $nb = $result->rowCount();

        // Vérification du nombre de résultat retourné si c'est different de 1, le login est incorrect
    if($nb!=1){
        $result->closeCursor();
        $idcom = null;
        echo"<script type=\"text/javascript\">
        alert(\" Erreur : nom d'utilisateur incorrect ! \");
        window.location='index.html';</script>";


    } else {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $pwdCrypt = $row['Password'];

        // Verification du mot de passe par rapport à ce qui est dans la base de données
        $pwdValide = password_verify($pass, $pwdCrypt);
        if ($pwdValide) {

            $ID_Utilisateur = $row['ID_Utilisateur'];
            //Requete SQL pour recuperer le groupe de l'utilisateur
            $requete2 = "SELECT Nom FROM groupe WHERE ID_Utilisateur=$ID_Utilisateur";
            $result2 = $idcom->query($requete2);
            $nb2 = $result2->rowCount();
            if ($nb2 != 1) {
                $result->closeCursor();
                $result2->closeCursor();
                $idcom = null;
                echo "<script type=\"text/javascript\">
                alert(\" Utilisateur inconnu ! \");
                window.location='index.html';</script>";

            } else {
                $row2 = $result2->fetch(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['nom'] = $row['Nom'];
                $_SESSION['prenom'] = $row['Prenom'];
                $_SESSION['groupe'] = $row2['Nom'];

                $result->closeCursor();
                $result2->closeCursor();
                $idcom = null;
                echo "<script type=\"text/javascript\">
	            window.location='accueil.php';</script>";

            }
        } else {
            $result->closeCursor();
            $idcom = null;
            echo "<script type=\"text/javascript\">
            alert(\" Erreur : mot de passe incorrect ! \");
            window.location='index.html';</script>";

        }
    }

        $result->closeCursor();
        $result2->closeCursor();
        $idcom = null;
 }
  else{
    echo"<script type=\"text/javascript\">alert('Impossible de se connecter au serveur');
	window.location='index.html';</script>";
  }

}

?>
</body>
</html>