<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Vérification simple (à remplacer par une vérification sécurisée en production)
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion Admin</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .login-form { max-width: 400px; margin: 100px auto; padding: 20px; background: white; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background: #4CAF50; color: white; border: none; padding: 10px 15px; cursor: pointer; }
        button:hover { background: #45a049; }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Connexion Admin</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <label>Nom d'utilisateur:</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Mot de passe:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>