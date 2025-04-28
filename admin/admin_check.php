<?php
// Vérifie que le bootstrap a bien été inclus
if (!defined('ADMIN_ROOT')) {
    error_log("Tentative d'accès direct à admin_check.php");
    header('Location: '.BASE_URL.'/accueil.php');
    exit;
}

// Debug - À retirer en production
error_log("Session dans admin_check: ".print_r($_SESSION, true));

// Vérification de session
if (empty($_SESSION['user_id'])) {
    error_log("Redirection: Session user_id manquant");
    header('Location: '.BASE_URL.'/login.php');
    exit;
}

// Vérification des droits admin
$stmt = $conn->prepare("SELECT is_admin FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
if (!$stmt->execute()) {
    error_log("Erreur SQL: ".$conn->error);
    header('Location: '.BASE_URL.'/accueil.php');
    exit;
}

$result = $stmt->get_result();
if (!$result || !($user = $result->fetch_assoc()) || !$user['is_admin']) {
    error_log("Redirection: Pas admin (User ID: ".$_SESSION['user_id'].")");
    header('Location: '.BASE_URL.'/accueil.php');
    exit;
}
?>