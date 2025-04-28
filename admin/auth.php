<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /projet/login.php?redirect='.urlencode($_SERVER['REQUEST_URI']));
    exit;
}

require_once __DIR__.'/../includes/config.php';

// Vérification des droits admin
$stmt = $conn->prepare("SELECT is_admin FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if (!$result || !($user = $result->fetch_assoc()) || !$user['is_admin']) {
    header('Location: /projet/accueil.php?error=no_admin');
    exit;
}

// Fonctions admin communes
function secure_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}
?>