<?php
require_once '../../admin_check.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = secureInput($_POST['nom']);
    $description = secureInput($_POST['description']);
    
    $stmt = $conn->prepare("INSERT INTO categories (nom, description) VALUES (?, ?)");
    if ($stmt->execute([$nom, $description])) {
        $_SESSION['message'] = "Catégorie ajoutée avec succès!";
        header('Location: liste.php');
        exit;
    } else {
        $erreur = "Erreur lors de l'ajout de la catégorie";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Catégorie</title>
    <link rel="stylesheet" href="../../style/admin.css">
</head>
<body>
    <div class="admin-container">
        <?php include '../admin_sidebar.php'; ?>
        
        <main class="admin-main">
            <h1>Ajouter une Catégorie</h1>
            
            <?php if (isset($erreur)): ?>
                <div class="alert error"><?= $erreur ?></div>
            <?php endif; ?>
            
            <form method="POST" class="admin-form">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4"></textarea>
                </div>
                
                <button type="submit" class="btn">Ajouter</button>
                <a href="liste.php" class="btn cancel">Annuler</a>
            </form>
        </main>
    </div>
</body>
</html>