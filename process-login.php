<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion DB
$conn = new mysqli("localhost", "root", "", "educatif_enfant");
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// Vérifie si c'est une requête AJAX
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameemail = $_POST['usernameemail'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($usernameemail) || empty($password)) {
        $response = ['success' => false, 'message' => 'Veuillez remplir tous les champs'];
        echo json_encode($response);
        exit;
    }

    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ? OR email = ?");
    if (!$stmt) {
        $response = ['success' => false, 'message' => 'Database error'];
        echo json_encode($response);
        exit;
    }

    $stmt->bind_param("ss", $usernameemail, $usernameemail);
    
    if (!$stmt->execute()) {
        $response = ['success' => false, 'message' => 'Database error'];
        echo json_encode($response);
        exit;
    }

    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        $response = ['success' => false, 'message' => 'Identifiants incorrects'];
        echo json_encode($response);
        exit;
    }

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['logged_in'] = true;
        
        $response = ['success' => true, 'redirect' => 'accueil.php'];
        echo json_encode($response);
        exit;
    } else {
        $response = ['success' => false, 'message' => 'Mot de passe incorrect'];
        echo json_encode($response);
        exit;
    }
} else {
    $response = ['success' => false, 'message' => 'Méthode non autorisée'];
    echo json_encode($response);
    exit;
}
?>