<?php
require_once '../../admin_check.php';

$categories = $conn->query("SELECT id, nom FROM categories ORDER BY nom")->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = secureInput($_POST['titre']);
    $description = secureInput($_POST['description']);
    $contenu = secureInput($_POST['contenu']);
    $categorie_id = intval($_POST['categorie_id']);
    
    $stmt = $conn->prepare("INSERT INTO elements (titre, description, contenu, categorie_id) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$titre, $description, $contenu, $categorie_id])) {
        $element_id = $conn->insert_id;
        $_SESSION['message'] = "Élément ajouté avec succès!";
        header("Location: liste.php");
        exit;
    } else {
        $erreur = "Erreur lors de l'ajout de l'élément";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Élément</title>
    <link rel="stylesheet" href="../../style/admin.css">
    <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#contenu',
            plugins: 'link lists code',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link | code',
            menubar: false,
            height: 300
        });
    </script>
</head>
<body>
    <div class="admin-container">
        <?php include '../admin_sidebar.php'; ?>
        
        <main class="admin-main">
            <h1>Ajouter un Élément</h1>
            
            <?php if (isset($erreur)): ?>
                <div class="alert error"><?= $erreur ?></div>
            <?php endif; ?>
            
            <form method="POST" class="admin-form">
                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input type="text" id="titre" name="titre" required>
                </div>
                
                <div class="form-group">
                    <label for="categorie_id">Catégorie:</label>
                    <select id="categorie_id" name="categorie_id" required>
                        <option value="">Sélectionnez une catégorie</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>"><?= secureInput($cat['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="description">Description courte:</label>
                    <textarea id="description" name="description" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="contenu">Contenu détaillé:</label>
                    <textarea id="contenu" name="contenu"></textarea>
                </div>
                
                <button type="submit" class="btn">Ajouter</button>
                <a href="liste.php" class="btn cancel">Annuler</a>
            </form>
        </main>
    </div>
</body>
</html>