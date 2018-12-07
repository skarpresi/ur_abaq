<?php       session_start();

include('header.php');

echo '
                <div class="row-fluid ">

                    <div class="navbar-inner" style="margin-bottom: 10px">

                        <h4 class="span2" style="border-style: inset;border-radius: 20px; background-color: #f5f5f5 ;font-family: Time  New Roman;"> Vous &ecirctes ici : </h4>

                        <h4 class="span2" style="border-style: inset;border-radius: 20px; background-color: #f5f5f5 ;font-family: Time  New Roman;"> Temp&eacuterature -> Afficher </h4>

                        <h4 class="span4 offset2" style="border-style: inset;border-radius: 20px; background-color: #f5f5f5 ;font-family: Time  New Roman;"> Utilisateur connect&eacute : ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' </h4>

                        <h4 class="span2" style="font-family: Time  New Roman;font-size: larger;">

                            <a class="btn btn-primary" href="deconnexion.php"> D&eacuteconnexion </a>

                        </h4>

                    </div>
                </div>

                    <div class="row-fluid" >
                        <article class="span2" style="border-style: inset;border-radius: 20px; background-color: #A9A9A9 ; ">


                            <div class="row-fluid" style=" margin-left: 7px;margin-top: 10px;">
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

    //Requ�te SQL
    $requete = "SELECT * FROM temperature";
    $result = $idcom->query($requete);

    if (!$result) {
        $mes_erreur = $idcom->errorInfo();
        echo "Lecture impossible, code", $idcom->errorCode(), $mes_erreur[2];
    } else {

        echo '<table id="tab" class="table table-striped table-hover table-bordered dataTable">
                              <thead>
                              <tr>
                                <th>#</th>
                                <th>Temp&eacuterature</th>
                                <th>Variation</th>
                                <th>Date</th>
                                <th>Seuil</th>
                              </tr>
                              </thead>
                              <tbody>';
        $tempe = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $variation = $row['Temperature'] - $tempe;
            echo '
                                    <tr>
                                        <td>', $row['ID_Temperature'], '</td>
                                        <td>', $row['Temperature'], '°</td>
                                        <td>', $variation, '°</td>
                                        <td>', $row['Date_Releve'], '</td>
                                        <td>[24° ; 30°]</td>
                                    </tr>';
            $tempe = $row['Temperature'];
        }
        echo '</tbody>';
        echo '</table>';
    }

    $result->closeCursor();
    $requete = null;
    $idcom = null;
} else {
    echo '<script type=\"text/javascript\">alert("Impossible de se connecter au serveur");
                         window.location="accueil.php";</script>';
}

echo '<div class="well">
                                <h3 style="background-color: #8FBC8F;"> *La temp&eacuterature et la variation sont en degr&eacutes </h3>
                                </div>
                             ';

echo '</section>

            </div>';

include('footer.php');
?>
