<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérification de l'authentification
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Configuration de la base de données
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'educatif_enfant';

// Connexion à la base de données
try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    
    // Vérifier la connexion
    if ($conn->connect_error) {
        throw new Exception("Échec de la connexion à la base de données: " . $conn->connect_error);
    }
    
    // Définir l'encodage
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    die("Erreur de connexion: " . $e->getMessage());
}
$required_tables = ['images', 'videos', 'sounds', 'admins'];
foreach ($required_tables as $table) {
    if (!$conn->query("SELECT 1 FROM $table LIMIT 1")) {
        die("La table $table n'existe pas. Veuillez importer la structure de la base de données.");
    }
}
// Fonction de nettoyage des entrées
function cleanInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}
?>