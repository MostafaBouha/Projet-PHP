<?php
session_start();
require 'config.php';

header('Content-Type: application/json');

$email = json_decode(file_get_contents('php://input'), true)['email'] ?? '';

// Vérification de l'utilisateur en attente
$stmt = $conn->prepare("SELECT activation_code FROM users WHERE email = ? AND is_active = 0");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Aucun compte en attente trouvé']);
    exit;
}

$user = $result->fetch_assoc();

// En production: Envoyer un vrai email ici
$activation_link = "http://votresite.com/activate.php?code=".$user['activation_code'];
file_put_contents("activation_links.log", "$email : $activation_link\n", FILE_APPEND);

echo json_encode([
    'success' => true,
    'message' => 'Nouveau lien envoyé (vérifiez activation_links.log en développement)'
]);
?>