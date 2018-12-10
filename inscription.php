<?php
session_start();
include('fonction.php');
include("header.php");

// Connexion à la base de données
include("connexpdo.inc.php");
if ($idcom = connexpdo('ur_abaq', 'myparam')) {
    // Vérification si les champs login, pwd1 et pwd2 ne sont pas vides
    if (!empty($_POST['login']) && !empty($_POST['pwd1']) && !empty($_POST['pwd2'])) {
        $nom = $idcom->quote($_POST['nom']);
        $prenom = $idcom->quote($_POST['prenom']);
        $login = $idcom->quote($_POST['login']);
        $pwd1 = $idcom->quote($_POST['pwd1']);
        $pwd2 = $idcom->quote($_POST['pwd2']);
        $tel = $idcom->quote($_POST['tel']);
        $mail = $idcom->quote($_POST['mail']);
        $groupe = $idcom->quote($_POST['groupe']);

        // on teste si une entrée de la base contient déjà les mêmes login, password, tel et mail
        $sql = "SELECT * FROM utilisateur WHERE Login=$login";
        $resp = $idcom->query($sql);
        $nb = $resp->rowCount();
        $sql1 = "SELECT * FROM utilisateur WHERE Tel=$tel";
        $resp1 = $idcom->query($sql1);
        $nb1 = $resp1->rowCount();
        $sql2 = "SELECT * FROM utilisateur WHERE Mail=$mail";
        $resp2 = $idcom->query($sql2);
        $nb2 = $resp2->rowCount();

        if ($nb != 0) {
            $resp->closeCursor();
            $resp1->closeCursor();
            $resp2->closeCursor();
            $idcom = null;
            echo "
                <script type=\"text/javascript\">
                    alert(\"Votre login appartient deja a un autre utilisateur ! \");
                    window.location='inscription.html';
                </script>
                 ";
        } elseif ($nb1 != 0) {
            $resp->closeCursor();
            $resp1->closeCursor();
            $resp2->closeCursor();
            $idcom = null;
            echo
            "
                <script type=\"text/javascript\">
                    alert(\"Votre numero telephone appartient deja a un autre utilisateur ! \");
                    window.location='inscription.html';
                </script>
                 ";
        } elseif ($nb2 != 0) {
            $resp->closeCursor();
            $resp1->closeCursor();
            $resp2->closeCursor();
            $idcom = null;
            echo
            "
                <script type=\"text/javascript\">
                    alert(\"Votre adresse mail appartient deja a un autre utilisateur ! \");
                    window.location='inscription.html';
                </script>
                 ";
        } else {
            //On vérifie si les deux mots de passe fournis sont les mêmes, on crypte le mot de passe
            if ($pwd1 == $pwd2) {
                $pwdCrypt = password_hash($pwd1, PASSWORD_DEFAULT);

                //Requetes SQL pour inserer l'utilisateur dans la base de données
                $requete = "INSERT INTO utilisateur (Login,Password,Nom,Prenom,Tel,Mail) VALUES($login,'$pwdCrypt',$nom,$prenom,$tel,$mail)";


                // On verifie que la requete s'est bien executée
                $nblignes = $idcom->exec($requete);
                if ($nblignes != 1) {
                    $mess_erreur = $idcom->errorInfo();
                    echo "Insertion impossible dans la table utilisateur, code", $idcom->errorCode(), $mess_erreur[2];
                    echo "<script type=\"text/javascript\"> alert('Erreur : " . $idcom->errorCode() . "') </script>";
                } else {
                    $Id_utilisateur = $idcom->lastInsertId();
                    $requete2 = "INSERT INTO groupe (ID_Utilisateur,Nom) VALUES($Id_utilisateur,$groupe)";
                    $nbligne = $idcom->exec($requete2);

                    if ($nbligne != 1) {
                        $mess_erreure = $idcom->errorInfo();
                        echo "Insertion impossible dans la table groupe, code", $idcom->errorCode(), $mess_erreure[2];
                        echo "
                                <script type=\"text/javascript\">
                                alert('Erreur : " . $idcom->errorCode() . "');
                                window.location='inscription.php';
                                </script>";
                    } else {
                        $resp->closeCursor();
                        $resp1->closeCursor();
                        $resp2->closeCursor();
                        $idcom = null;
                        echo "
                                <script type=\"text/javascript\">
                                alert(\"Vous venez d'enregistrer un nouveau utilisateur !\");
                                window.location='utilisateur.php';
                                </script>";
                    }

                }
            } else {
                $resp->closeCursor();
                $resp1->closeCursor();
                $resp2->closeCursor();
                $idcom = null;
                echo "
                       <script type=\"text/javascript\">
                           alert(\"Veuillez revoir votre mot de passe ! \");
                           window.location='inscription.html';
                       </script>";
            }
        }
    } else {
        echo
        "
                <script type=\"text/javascript\">
                    alert(\"Veuillez remplir le formulaire ! \");
                    window.location='inscription.html';
                </script>
            ";
    }
} else {
    echo "<script type=\"text/javascript\">alert('Impossible de se connecter au serveur');
	    window.location='inscription.html';</script>";
}
?>