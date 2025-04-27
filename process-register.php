<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion DB
$conn = new mysqli("localhost", "root", "", "educatif_enfant");
if ($conn->connect_error) {
    error_log("[ERREUR] Connexion DB: ".$conn->connect_error);
    die(json_encode(['success' => false, 'message' => 'Erreur technique']));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation
    $username = trim($_POST["username"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';

    if (empty($username) || empty($email) || empty($password)) {
        die(json_encode(['success' => false, 'message' => 'Tous les champs sont requis']));
    }

    // Vérification existence
    $check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    
    if ($check->get_result()->num_rows > 0) {
        die(json_encode(['success' => false, 'message' => 'Identifiant déjà utilisé']));
    }

    // Génération et insertion
    $activation_code = bin2hex(random_bytes(16));
    $hashed_pw = password_hash($password, PASSWORD_DEFAULT);

    error_log("[DEBUG] Pré-insertion - Code généré: $activation_code");

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, activation_code, is_active) VALUES (?, ?, ?, ?, 0)");
    $stmt->bind_param("ssss", $username, $email, $hashed_pw, $activation_code);

    if ($stmt->execute()) {
        // VÉRIFICATION CRITIQUE
        $check_code = $conn->query("SELECT activation_code FROM users WHERE id = ".$stmt->insert_id);
        $db_code = $check_code->fetch_assoc()['activation_code'];
        
        error_log("[DEBUG] Post-insertion - Code en base: $db_code");
        error_log("[DEBUG] Correspondance codes: ".($activation_code === $db_code ? "OK" : "INCOHÉRENCE"));

        $_SESSION['pending_user'] = [
            'email' => $email,
            'activation_code' => $activation_code,
            'debug_link' => "http://localhost/projet/activate.php?code=$activation_code"
        ];

        // Simulation envoi email
        file_put_contents(
            "activation_logs.txt", 
            "Nouvelle inscription:\n".
            "Email: $email\n".
            "Code: $activation_code\n".
            "Lien: http://localhost/projet/activate.php?code=$activation_code\n\n",
            FILE_APPEND
        );

        echo json_encode([
            'success' => true,
            'message' => 'Inscription réussie',
            'redirect' => 'pending_activation.php',
            'debug_link' => "http://localhost/projet/activate.php?code=$activation_code"
        ]);
    } else {
        error_log("[ERREUR] Insertion DB: ".$stmt->error);
        die(json_encode(['success' => false, 'message' => 'Erreur technique']));
    }
}
?>