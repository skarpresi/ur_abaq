<?php
session_start();

include('fonction.php');
include('header.php');

echo '
                <div class="row-fluid ">

                    <div class="navbar-inner" style="margin-bottom: 10px">

                        <h4 class="span2" style="border-style: inset;border-radius: 20px; background-color: #f5f5f5 ;font-family: Time  New Roman;"> Vous &ecirctes ici : </h4>

                        <h4 class="span2" style="border-style: inset;border-radius: 20px; background-color: #f5f5f5 ;font-family: Time  New Roman;"> Utilisateur </h4>

                        <h4 class="span4 offset2" style="border-style: inset;border-radius: 20px; background-color: #f5f5f5 ;font-family: Time  New Roman;"> Utilisateur connect&eacute : ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' </h4>

                        <h4 class="span2" style="font-family: Time  New Roman;font-size: larger;">

                            <a class="btn btn-primary" href="deconnexion.php"> D&eacuteconnexion </a>

                        </h4>

                    </div>
                </div>

                    <div class="row-fluid" >
                        <article class="span2" style="border-style: inset;border-radius: 20px; background-color: #A9A9A9 ; ">


                            <div class="row-fluid" style=" margin-left: 7px;margin-top: 10px;font-family: Time New Roman">
                                <ul class="nav nav-list nav-pills nav-stacked">
                                    <li>
                                        <a class="btn btn-large" href="accueil.php">Accueil</a>
                                    </li>

                                    <li>
                                        <a class="btn btn-large" href="temperature.php">Temp&eacuterature</a>
                                    </li>

                                    <li>
                                        <a class="btn btn-large" href="oxygene.php">Oxyg&egravene dissous</a>
                                    </li>

                                    <li>
                                        <a class="btn btn-large" href="conductivite.php">Conductivit&eacute</a>
                                    </li>

                                    <li>
                                        <a class="btn btn-large" href="ph.php">pH</a>
                                    </li>

                                </ul>
                            </div>



                        </article>


                        <section class="span10 " id="contenu1">';
include("connexpdo.inc.php");

// Vérification du type d'action dont l'utilisateur souhaiterait exécuter

////////////////////////////////////////////////////////++++AFFICHAGE++++////////////////////////////////////////////////////

// Section affichage de l'utilisateur
if ($_GET['action'] == "voir") {
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
                echo '<table id="tab" class="table table-striped table-hover table-bordered dataTable">
                                          <tr>
                                            <th>#</th>';
                echo '<td>', $row['ID_Utilisateur'], '</td>
                                          </tr>';
                echo '<tr>
                                            <th>Login </th>';
                echo '<td>', $row['Login'], '</td>
                                            </tr>';
                echo '<tr>
                                            <th>Mot de passe</th>';
                echo '<td>', $row['Password'], '</td>
                                            </tr>';
                echo '<tr>
                                            <th>Nom </th>';
                echo '<td>', $row['Nom'], '</td>
                                            </tr>';
                echo '<tr>
                                            <th>Pr&eacutenom</th>';
                echo '<td>', $row['Prenom'], '</td>
                                            </tr>';
                echo '<tr>
                                            <th>T&eacutel&eacutephone</th>';
                echo '<td>', $row['Tel'], '</td>
                                            </tr>';
                echo '<tr>
                                            <th>Email </th>';
                echo '<td>', $row['Mail'], '</td>
                                            </tr>';
                echo '<tr>
                                            <th>Groupe</th>';
                echo '<td>', $row2['Nom'], '</td>
                                            </tr>';
                echo '</table>';
                echo '
                                                <div class="well row-fluid">
                                                    <a href="inscription.html" class="btn-large btn-primary">
                                                        Ajouter un utilisateur
                                                    </a>
                                                    <a href="utilisateur.php" class="btn-large btn-primary">
                                                        Retour
                                                    </a>
                                                </div>
                                                ';
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
}
/////////////////////////////////////////////////////////++++MODIFICATION++++////////////////////////////////////////////////////

//Section modification de l'utilisateur
elseif ($_GET['action'] == "modifier") {
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
            echo '<script type=\"text/javascript\"> window.location="utilisateur.php";</script>';
        } else {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $id = $row['ID_Utilisateur'];
            $login = $row['Login'];
            $pwd = $row['Password'];
            $nom = $row['Nom'];
            $prenom = $row['Prenom'];
            $tel = $row['Tel'];
            $mail = $row['Mail'];

            echo '<div class="row-fluid">
                <div class="span6 offset3" >
                    <form action= " modification_user.php " method="post">
                        <fieldset> <legend><b>Modification d\'un utilisateur</b></legend>
                            <table>
                                <tr><td>Login : </td><td><input type="text" name="login" size="40" maxlength="40" value="', $login, '" required /> </td></tr>
                                <tr><td>Mot de passe : </td><td><input type="password" name="pwd1" size="40" maxlength="40" value="', $pwd, '" required /></td></tr>
                                <tr><td>Confirmer votre mot de passe : </td><td><input type="password" name="pwd2" size="40" maxlength="40" value="', $pwd, '" required /></td></tr>
                                <tr><td>Nom : </td><td><input type="text" name="nom" size="40" maxlength="40" value="', $nom, '" required /> </td></tr>
                                <tr><td>Pr&eacutenom : </td><td><input type="text" name="prenom" size="40" maxlength="40" value="', $prenom, '" required /></td></tr>
                                <tr><td>Tel : </td><td><input type="tel" name="tel" size="40" maxlength="40" value="', $tel, '" required /> </td></tr>
                                <tr><td>Mail : </td><td><input type="email" name="mail" size="40" maxlength="50" value="', $mail, '" required /> </td></tr>
                                <tr>
                                    <td>
                                        <input type="radio" name="groupe" id="simple" value="Simple" checked> Simple

                                    </td>
                                    <td>
                                        <input type="radio" name="groupe" id="admin" value="Admin"> Admin
                                    </td>
                                </tr>
                                <tr> <td><input type="submit" class="btn btn-primary" value=" Enregistrer "></td>
                                    <td>
                                    <a href="utilisateur.php" class="btn btn-primary">
                                        Retour
                                    </a>
                                    </td>
                                    <td>
                                        <input type="hidden" name="id" value="', $id, '" />
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>';

        }
        $result->closeCursor();
        $idcom = null;
    } else {
        echo '<script type="text/javascript">
        alert("Impossible de se connecter au serveur");
        window.location="utilisateur.php";</script>';
    }
}

////////////////////////////////////////////////////////++++SUPPRESSION++++////////////////////////////////////////////////////

// Section suppression d'un utilisateur
else {
    //Connexion à la base de données

    if ($idcom = connexpdo("ur_abaq", "myparam")) {
        $id = $_GET['id'];
        //Requete SQL pour supprimer l'utilisateur
        $requete = "Delete FROM utilisateur WHERE ID_Utilisateur=$id";
        $result = $idcom->exec($requete);

        if (!$result) {
            $mes_erreur = $idcom->errorInfo();
            echo "Impossible de supprimer l'utilisateur, code", $idcom->errorCode(), $mes_erreur[2];
            $idcom = null;
            echo '<script type="text/javascript"> window.location="utilisateur.php";</script>';
        } else {

            //Requete SQL
            $requete2 = "Delete FROM groupe WHERE ID_Utilisateur=$id";
            $result2 = $idcom->exec($requete2);
            if (!$result2) {
                $mes_erreure = $idcom->errorInfo();
                echo "Impossible de supprimer le groupe, code", $idcom->errorCode(), $mes_erreure[2];
                $idcom = null;
                echo '<script type="text/javascript"> window.location="utilisateur.php";</script>';
            } else {
                $idcom = null;
                echo '<script type="text/javascript">
                alert("Vous venez de supprimer un utilisateur !");
                window.location="utilisateur.php";
                </script>';

            }
        }
    } else {
        echo '<script type="text/javascript">
                                    alert("Impossible de se connecter au serveur !");
                                    window.location="utilisateur.php";</script>';
    }

}
echo '</section>
</div>';

include('footer.php');
?>