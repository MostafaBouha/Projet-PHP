<?php
// 1. Démarrage de session sécurisé
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_lifetime' => 86400,
        'cookie_secure' => true,
        'cookie_httponly' => true
    ]);
}

require __DIR__.'/config.php';

// 2. Debug amélioré
error_log("[ACTIVATION] Début du processus - ".date('Y-m-d H:i:s'));

// 3. Vérification du code
if (empty($_GET['code'])) {
    error_log("[ERREUR] Code manquant");
    http_response_code(400);
    die(json_encode(['success' => false, 'message' => 'Code d\'activation manquant']));
}

// 4. Préparation sécurisée
$stmt = $conn->prepare("SELECT id, username FROM users WHERE activation_code = ? AND is_active = 0");
if (!$stmt) {
    error_log("[ERREUR] Préparation requête: ".$conn->error);
    http_response_code(500);
    die(json_encode(['success' => false, 'message' => 'Erreur technique']));
}

$stmt->bind_param("s", $_GET['code']);
$stmt->execute();
$result = $stmt->get_result();

// 5. Vérification résultat
if ($result->num_rows === 0) {
    error_log("[ERREUR] Code invalide: ".$_GET['code']);
    
    // Debug avancé
    $debug = $conn->query("SELECT id, username, activation_code FROM users WHERE activation_code IS NOT NULL");
    error_log("[DEBUG] Codes existants: ".print_r($debug->fetch_all(MYSQLI_ASSOC), true));
    
    http_response_code(404);
    die(json_encode(['success' => false, 'message' => 'Code invalide ou compte déjà activé']));
}

// 6. Activation
$user = $result->fetch_assoc();

$update = $conn->prepare("UPDATE users SET is_active = 1, activation_code = NULL WHERE id = ?");
if (!$update || !$update->bind_param("i", $user['id']) || !$update->execute()) {
    error_log("[ERREUR] Activation: ".$conn->error);
    http_response_code(500);
    die(json_encode(['success' => false, 'message' => 'Erreur d\'activation']));
}

// 7. Session sécurisée
$_SESSION = [
    'user' => [
        'id' => $user['id'],
        'username' => $user['username'],
        'ip' => $_SERVER['REMOTE_ADDR'],
        'user_agent' => $_SERVER['HTTP_USER_AGENT']
    ],
    'logged_in' => true,
    'last_activity' => time()
];

// 8. Régénération ID de session
session_regenerate_id(true);

// 9. Redirection sécurisée
header("Location: accueil.php");
header("Cache-Control: no-store, no-cache, must-revalidate");
exit();
?>