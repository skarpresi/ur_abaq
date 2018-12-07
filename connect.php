<?php
$host = "localhost";
$user = "root";
$base = "ur_abaq";
$password = "";

try {
    $con = new PDO("mysql:host=$host;dbname=$base", $user, $password);

} catch (PDOException $e) {
    echo "erreur de connexion à la base de donnée";
}