<?php
session_start();
require_once __DIR__.'/../config.php';

// Debug - à retirer en production
error_log("Tentative accès admin - Session: ".print_r($_SESSION, true));

if (!isset($_SESSION['user_id'])) {
    header('Location: /projet/login.php');
    exit;
}

$stmt = $conn->prepare("SELECT is_admin FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if (!$result || !($user = $result->fetch_assoc()) || !$user['is_admin']) {
    error_log("Accès refusé - User ID: ".$_SESSION['user_id']);
    header('Location: /projet/accueil.php');
    exit;
}
?>