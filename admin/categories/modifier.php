<?php
require_once '../../admin_check.php';

if (!isset($_GET['id'])) {
    header('Location: liste.php');
    exit;
}

$id = intval($_GET['id']);

// Récupérer la catégorie existante
$stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$categorie = $result->fetch_assoc();

if (!$categorie) {
    header('Location: liste.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = secureInput($_POST['nom']);
    $description = secureInput($_POST['description']);
    
    $stmt = $conn->prepare("UPDATE categories SET nom = ?, description = ? WHERE id = ?");
    if ($stmt->execute([$nom, $description, $id])) {
        $_SESSION['message'] = "Catégorie modifiée avec succès!";
        header('Location: liste.php');
        exit;
    } else {
        $erreur = "Erreur lors de la modification de la catégorie";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une Catégorie</title>
    <link rel="stylesheet" href="../../style/admin.css">
</head>
<body>
    <div class="admin-container">
        <?php include '../admin_sidebar.php'; ?>
        
        <main class="admin-main">
            <h1>Modifier la Catégorie</h1>
            
            <?php if (isset($erreur)): ?>
                <div class="alert error"><?= $erreur ?></div>
            <?php endif; ?>
            
            <form method="POST" class="admin-form">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" value="<?= secureInput($categorie['nom']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4"><?= secureInput($categorie['description']) ?></textarea>
                </div>
                
                <button type="submit" class="btn">Modifier</button>
                <a href="liste.php" class="btn cancel">Annuler</a>
            </form>
        </main>
    </div>
</body>
</html>