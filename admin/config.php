<?php
// Active l'affichage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion DB
$conn = new mysqli("localhost", "root", "", "educatif_enfant");
if ($conn->connect_error) {
    die("Erreur DB: ".$conn->connect_error);
}

// Configuration des sessions
session_start([
    'cookie_lifetime' => 86400,
    'cookie_secure'   => false, // Mettez à true en production avec HTTPS
    'cookie_httponly' => true,
]);

// Configuration pour les uploads
define('MAX_FILE_SIZE', 10 * 1024 * 1024); // 10MB
define('ALLOWED_IMAGE_TYPES', ['jpg', 'jpeg', 'png', 'gif']);
define('ALLOWED_AUDIO_TYPES', ['mp3', 'wav', 'ogg']);
define('ALLOWED_VIDEO_TYPES', ['mp4', 'webm']);
define('UPLOAD_DIR', __DIR__ . '/uploads/');

// Fonction de validation des fichiers
function validateUploadedFile($file, $type) {
    $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if ($file['size'] > MAX_FILE_SIZE) {
        return ['success' => false, 'message' => 'Fichier trop volumineux (max 10MB)'];
    }
    
    switch ($type) {
        case 'image':
            if (!in_array($fileType, ALLOWED_IMAGE_TYPES)) {
                return ['success' => false, 'message' => 'Type d\'image non autorisé (jpg, jpeg, png, gif)'];
            }
            break;
        case 'audio':
            if (!in_array($fileType, ALLOWED_AUDIO_TYPES)) {
                return ['success' => false, 'message' => 'Type d\'audio non autorisé (mp3, wav, ogg)'];
            }
            break;
        case 'video':
            if (!in_array($fileType, ALLOWED_VIDEO_TYPES)) {
                return ['success' => false, 'message' => 'Type de vidéo non autorisé (mp4, webm)'];
            }
            break;
        default:
            return ['success' => false, 'message' => 'Type de média non reconnu'];
    }
    
    return ['success' => true];
}

// Fonction de sécurisation des entrées
function secureInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}
?>