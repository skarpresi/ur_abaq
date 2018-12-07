<?php
session_start();
include('header.php');
include("connexpdo.inc.php");

//Connexion à la base de données

if ($idcom = connexpdo("ur_abaq", "myparam")) {

    $id = $_GET['id'];
    //Requete SQL
    $requete = "SELECT * FROM utilisateur WHERE ID_Utilisateur=$id";
    $result = $idcom->query($requete);

    if (!$result) {
        $mes_erreur = $idcom->errorInfo();
        echo "Lecture impossible dans la table utilisateur, code", $idcom->errorCode(), $mes_erreur[2];
        $result->closeCursor();
        $idcom = null;
        echo '<script type="text/javascript"> window.location="utilisateur.php";</script>';
    } else {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $ID_Utilisateur = $row['ID_Utilisateur'];
        //Requete SQL
        $requete2 = "SELECT Nom FROM groupe WHERE ID_Utilisateur=$ID_Utilisateur";
        $result2 = $idcom->query($requete2);
        if (!$result2) {
            $mes_erreure = $idcom->errorInfo();
            echo "Lecture impossible, code", $idcom->errorCode(), $mes_erreure[2];
            $result->closeCursor();
            $result2->closeCursor();
            $idcom = null;
            echo '<script type="text/javascript"> window.location="utilisateur.php";</script>';
        } else {
            $row2 = $result2->fetch(PDO::FETCH_ASSOC);
            echo "
                    <script type=text/javascript>
                        var choix = confirm(\"Voulez-vous vraiment supprimer : " . $row['Prenom'] . " " . $row['Nom'] . " ?\");
                        if (choix) window.location='methode.php?id=" . $id . "&action=supprimer';
                        else window.location='utilisateur.php';
                    </script>
                    ";

        }
    }
    $result->closeCursor();
    $result2->closeCursor();
    $idcom = null;
} else {
    echo '<script type="text/javascript">
            alert("Impossible de se connecter au serveur");
            window.location="utilisateur.php";</script>';
}


include('footer.php');
?>