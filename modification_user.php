<?php
session_start();

include('fonction.php');
include("header.php");

// Connexion à la base de données
include("connexpdo.inc.php");
if ($idcom = connexpdo('ur_abaq', 'myparam')) {
    // Vérification si les champs login, pwd1 et pwd2 ne sont pas vides
    if (!empty($_POST['login']) && !empty($_POST['pwd1']) && !empty($_POST['pwd2'])) {
        $id = $idcom->quote($_POST['id']);
        $nom = $idcom->quote($_POST['nom']);
        $prenom = $idcom->quote($_POST['prenom']);
        $login = $idcom->quote($_POST['login']);
        $pwd1 = $idcom->quote($_POST['pwd1']);
        $pwd2 = $idcom->quote($_POST['pwd2']);
        $tel = $idcom->quote($_POST['tel']);
        $mail = $idcom->quote($_POST['mail']);
        $groupe = $idcom->quote($_POST['groupe']);

        //On vérifie si les deux mots de passe fournis sont les mêmes, on crypte le mot de passe
        if ($pwd1 == $pwd2) {
            $pwdCrypt = password_hash($pwd1, PASSWORD_DEFAULT);

            //Requetes SQL pour inserer l'utilisateur dans la base de données
            $requete = "UPDATE utilisateur SET Login=$login,Password='$pwdCrypt',Nom=$nom,Prenom=$prenom,Tel=$tel,Mail=$mail WHERE ID_Utilisateur=$id";


            // On verifie que la requete s'est bien executée
            $nblignes = $idcom->exec($requete);
            if ($nblignes != 1) {
                $mess_erreur = $idcom->errorInfo();
                echo "Modification impossible dans la table utilisateur, code", $idcom->errorCode(), $mess_erreur[2];
                echo "<script type=\"text/javascript\"> alert('Erreur : " . $idcom->errorCode() . "');
                    window.location='utilisateur.php';
                    </script>";
            } else {
                $req = "SELECT Nom FROM groupe WHERE ID_Utilisateur=$id";
                $res = $idcom->query($req);
                if (!$res) {
                    echo "<script type=\"text/javascript\">
                        window.location='utilisateur.php';
                        </script>";
                } else {
                    $donnee = $res->fetch(PDO::FETCH_ASSOC);
                    $group = $donnee['Nom'];
                    if (!strcmp($groupe, $group)) {
                        $requete2 = "UPDATE groupe SET Nom=$groupe WHERE ID_Utilisateur=$id";
                        $nbligne = $idcom->exec($requete2);

                        if ($nbligne != 1) {
                            $mess_erreure = $idcom->errorInfo();
                            echo "Modification impossible dans la table groupe, code", $idcom->errorCode(), $mess_erreure[2];
                            echo "
                                        <script type=\"text/javascript\">
                                        alert('Erreur : " . $idcom->errorCode() . "');
                                        window.location='utilisateur.php';
                                        </script>";
                        } else {
                            $idcom = null;
                            echo "
                                        <script type=\"text/javascript\">
                                        alert(\"Vous venez de modifier un utilisateur !\");
                                        window.location='utilisateur.php';
                                        </script>";
                        }
                    } else {
                        $idcom = null;
                        echo "
                                 <script type=\"text/javascript\">
                                 alert(\"Vous venez de modifier un utilisateur !\");
                                 window.location='utilisateur.php';
                                 </script>";
                    }
                }
            }
        } else {
            $idcom = null;
            echo "
                       <script type=\"text/javascript\">
                           alert(\"Veuillez revoir vos mots de passe ! \");
                           window.location='utilisateur.php';
                       </script>";
        }
    } else {
        echo
        "
                <script type=\"text/javascript\">
                    alert(\"Veuillez remplir le formulaire ! \");
                    window.location='utilisateur.php';
                </script>
            ";
    }
} else {
    echo "<script type=\"text/javascript\">alert('Impossible de se connecter au serveur');
	    window.location='utilisateur.php';</script>";
}
?>