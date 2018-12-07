<?php
$to = "0022675752786@nedjma.dz";
$message = "Ceci a été envoyé en PHP !";

if (mail($to, ' ', $message)) {
    echo "Message envoyé !";
} else {
    // L'envoi de l'SMS a échoué avec le fournisseur, nous en essayons un autre dans la liste $aProviders
    echo "Echec";
}
?>