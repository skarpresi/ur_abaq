<?php

// Définition de la durée d'une session
$session_timeout = 300;
if (!isset($_SESSION['last_access']) || !isset($_SESSION['ipaddr']) || !isset($_SESSION['login']) || !isset($_SESSION['nom']) || !isset($_SESSION['prenom']) || !isset($_SESSION['groupe'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.html");
    die();
}

if ($_SERVER['REMOTE_ADDR'] != $_SESSION['ipaddr']) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.html");
    die();
}

if (time() - $_SESSION['last_access'] > $session_timeout) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.html");
    die();
}

$_SESSION['last_access'] = time();
?>