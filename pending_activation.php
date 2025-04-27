<?php
session_start();

if (!isset($_SESSION['pending_user'])) {
    header("Location: register.php");
    exit();
}

$email = $_SESSION['pending_user']['email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Activation Requise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .debug-info {
            margin-top: 20px;
            padding: 15px;
            background: #f5f5f5;
            border-radius: 5px;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Activation Requise</h2>
        <p>Un email d'activation a été envoyé à <strong><?= htmlspecialchars($email) ?></strong></p>
        <p>Veuillez vérifier votre boîte de réception et cliquer sur le lien d'activation.</p>
        
        <!-- Debug en développement -->
        <div class="debug-info">
            <h3>Information de développement</h3>
            <p>Lien d'activation simulé :</p>
            <a href="<?= htmlspecialchars($_SESSION['pending_user']['debug_link'] ?? '#') ?>">
                Activer mon compte
            </a>
            <p>Consultez activation_emails.log pour les liens générés</p>
        </div>
    </div>
</body>
</html>