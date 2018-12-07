<?php       session_start();

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
//Connexion � la base de donn�es

if ($idcom = connexpdo("ur_abaq", "myparam")) {

    //Requete SQL
    $requete = "SELECT * FROM utilisateur";
    $result = $idcom->query($requete);

    if (!$result) {
        $mes_erreur = $idcom->errorInfo();
        echo "Lecture impossible, code", $idcom->errorCode(), $mes_erreur[2];
    } else {

        echo '<table id="tab" class="table table-striped table-hover table-bordered dataTable">
                              <thead>
                              <tr>
                                <th>#</th>
                                <th>Login </th>
                                <th>Mot de passe</th>
                                <th>Nom </th>
                                <th>Pr&eacutenom</th>
                                <th>T&eacutel&eacutephone</th>
                                <th>Email </th>
                                <th>Groupe</th>
                                <th>Voir </th>
                                <th>Modifier </th>
                                <th>Supprimer</th>
                              </tr>
                              </thead>
                              <tbody>';
        echo '<tr>';
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $ID_Utilisateur = $row['ID_Utilisateur'];
            //Requete SQL
            $requete2 = "SELECT Nom FROM groupe WHERE ID_Utilisateur=$ID_Utilisateur";
            $result2 = $idcom->query($requete2);

            if (!$result2) {
                $mes_erreure = $idcom->errorInfo();
                echo "Lecture impossible, code", $idcom->errorCode(), $mes_erreure[2];
            } else {
                $row2 = $result2->fetch(PDO::FETCH_ASSOC);
                //foreach($row as $donn) {
                echo '<td>', $row['ID_Utilisateur'], '</td>';
                echo '<td>', $row['Login'], '</td>';
                echo '<td>', $row['Password'], '</td>';
                echo '<td>', $row['Nom'], '</td>';
                echo '<td>', $row['Prenom'], '</td>';
                echo '<td>', $row['Tel'], '</td>';
                echo '<td>', $row['Mail'], '</td>';
                echo '<td>', $row2['Nom'], '</td>';
                echo '<td style="background-color: lightsteelblue;"><a href="methode.php?id=', $ID_Utilisateur, '&action=voir"><i class="icon-eye-open icon-black"></i></a></td>';
                echo '<td style="background-color: greenyellow;"><a href="methode.php?id=', $ID_Utilisateur, '&action=modifier"><i class="icon-edit icon-black"></i></a></td>';
                echo '<td style="background-color: firebrick;"><a href="confirmation.php?id=', $ID_Utilisateur, '"><i class="icon-remove-sign icon-black"></i></a></td>';

            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }

    echo '
        <div class="well row-fluid">
            <a href="inscription.html" class="btn-large btn-primary">
                Ajouter un utilisateur
            </a>
        </div>
        ';
    $result->closeCursor();
    $requete = null;
    $idcom = null;
} else {
    echo '<script type=\"text/javascript\">alert("Impossible de se connecter au serveur");
                         window.location="accueil.php";</script>';
}

echo '<div class="well">
                                <h3 style="background-color: #8FBC8F;"> * Une fois que vous cliquer sur supprimer, il n\'y a plus la possibilit&eacute de faire un retour ! </h3>
                                </div>
                             ';

echo '</section>

            </div>';

include('footer.php');
?>
