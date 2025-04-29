<?php
session_start();

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'zoo_arcadia');

// Établir la connexion
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données: " . $mysqli->connect_error);
}

// Définir le charset
$mysqli->set_charset("utf8");

// Fonction de sécurité
function secure($data) {
    global $mysqli;
    return htmlspecialchars($mysqli->real_escape_string(trim($data)), ENT_QUOTES, 'UTF-8');
}

// Vérification admin
function isAdmin() {
    return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
}
?>