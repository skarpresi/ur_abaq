<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Recuperation des paramètres envoyés par http
$temp = $_GET['temperature'];
$conductivite = $_GET['conductivite'];
$ph = $_GET['ph'];
$oxygene = $_GET['oxygene'];

// Connexion à la base de données
include('connexpdo.inc.php');
if ($idcom = connexpdo('ur_abaq', 'myparam')) {
    // Requêtes d'insertion dans la base de données
    $req1 = "insert into temperature(Temperature) values ($temp)";
    $req2 = "insert into conductivite(Conductivite) values ($conductivite)";
    $req3 = "insert into ph(Ph) values ($ph)";
    $req4 = "insert into oxygene(Oxygene) values ($oxygene)";

    // Recupérations des emails des utilisateurs du système
    $req5 = "select Nom,Prenom,Mail from utilisateur";

    //Exécution des requêtes
    $nbLigne1 = $idcom->exec($req1);
    $nbLigne2 = $idcom->exec($req2);
    $nbLigne3 = $idcom->exec($req3);
    $nbLigne4 = $idcom->exec($req4);
    $result = $idcom->query($req5);

    //Verification des insertions
    if ($nbLigne1 != 1 || $nbLigne2 != 1 || $nbLigne3 != 1 || $nbLigne4 != 1) {
        $mess_erreur = $idcom->errorInfo();
        echo "Insertion impossible dans la base de donn&eacutes, code", $idcom->errorCode(), $mess_erreur[2];
        echo "<script type=\"text/javascript\"> alert('Erreur : " . $idcom->errorCode() . "') </script>";
    } else {
        if (!$result) {
            $mes_erreur = $idcom->errorInfo();
            echo "Insertion impossible dans la base de donn&eacutes, code", $idcom->errorCode(), $mes_erreur[2];
            echo "<script type=\"text/javascript\"> alert('Erreur : " . $idcom->errorCode() . "') </script>";
        } else {
            if ($temp < 24 || $temp > 30) {
                // Envoie de mail aux utilisateurs du système
                date_default_timezone_set('Etc/UTC');
                require 'vendor/autoload.php';
                //Create a new PHPMailer instance
                $mail = new PHPMailer;
                //Tell PHPMailer to use SMTP
                $mail->isSMTP();
                //Enable SMTP debugging
                // 0 = off (for production use)
                // 1 = client messages
                // 2 = client and server messages
                $mail->SMTPDebug = 2;
                //Ask for HTML-friendly debug output
                $mail->Debugoutput = 'html';
                //Set the hostname of the mail server
                $mail->Host = 'smtp.gmail.com';
                // use
                // $mail->Host = gethostbyname('smtp.gmail.com');
                // if your network does not support SMTP over IPv6
                //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                $mail->Port = 587;
                //Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = 'tls';
                //Whether to use SMTP authentication
                $mail->SMTPAuth = true;
                //Username to use for SMTP authentication - use full email address for gmail
                $mail->Username = "urabaq.unb@gmail.com";
                //Password to use for SMTP authentication
                $mail->Password = "Ur_abaq.unb1";
                //Set who the message is to be sent from
                $mail->setFrom('urabaq.unb@gmail.com', 'Unite de Recherche');
                //Set an alternative reply-to address
                $mail->addReplyTo('urabaq.unb@gmail.com', 'Unite de Recherche');

                //Set the subject line
                $mail->Subject = 'Alerte';
                $mail->isHTML();
                //Read an HTML message body from an external file, convert referenced images to embedded,
                //convert HTML into a basic plain-text alternative body
                $mail->Body = 'Vous avez une variation anormale de la temperature : <b>' . $temp . '°!</b>';
                //Replace the plain text body with one created manually
                $mail->AltBody = 'Vous avez une variation anormale de la temp&eacuterature :' . $temp . '°!';
                //Attach an image file
                //$mail->addAttachment('images/phpmailer_mini.png');
                //send the message, check for errors
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    //Set who the message is to be sent to
                    $mail->addAddress($row['Mail']);
                    if (!$mail->send()) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    } else {
                        echo "Message send !";
                    }
                }

            }

            // Notification sur l'insertion des paramètres dans la base de données
            echo "<script type=\"text/javascript\">alert(\"Vous venez d'inserer des parametres dans votre base de donnees\");
                </script>";
        }
    }
} else {
    echo "<script type=\"text/javascript\">alert('Impossible de se connecter au serveur');
	    </script>";
}

?>