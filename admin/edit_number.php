<?php
require_once 'config.php';

// Récupérer les données existantes si un ID est fourni
$number_data = null;
if(isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM numbers WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $number_data = $result->fetch_assoc();
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $conn->real_escape_string($_POST['id']);
    $number = $conn->real_escape_string($_POST['number']);
    $number_name = $conn->real_escape_string($_POST['number_name']);
    $description = $conn->real_escape_string($_POST['description']);

    // Initialisation des variables pour les fichiers
    $image_name = $number_data['image'] ?? '';
    $sound_name = $number_data['sound'] ?? '';

    // Gestion du fichier image
    if (!empty($_FILES['image']['name'])) {
        // Supprimer l'ancienne image si elle existe
        if (!empty($number_data['image'])) {
            $old_image_path = "../uploads/numbers/" . $number_data['image'];
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }
        
        // Uploader la nouvelle image
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "../uploads/numbers/" . basename($image_name);
        move_uploaded_file($image_tmp, $image_path);
    }

    // Gestion du fichier son
    if (!empty($_FILES['sound']['name'])) {
        // Supprimer l'ancien son s'il existe
        if (!empty($number_data['sound'])) {
            $old_sound_path = "../uploads/numbers/sounds/" . $number_data['sound'];
            if (file_exists($old_sound_path)) {
                unlink($old_sound_path);
            }
        }
        
        // Uploader le nouveau son
        $sound_name = $_FILES['sound']['name'];
        $sound_tmp = $_FILES['sound']['tmp_name'];
        $sound_path = "../uploads/numbers/sounds/" . basename($sound_name);
        move_uploaded_file($sound_tmp, $sound_path);
    }

    // Mettre à jour dans la base de données
    $stmt = $conn->prepare("UPDATE numbers SET number = ?, name = ?, image = ?, sound = ?, description = ? WHERE id = ?");
    $stmt->bind_param("issssi", $number, $number_name, $image_name, $sound_name, $description, $id);
    
    if ($stmt->execute()) {
        header("Location: manage_numbers.php?updated=1");
    } else {
        header("Location: manage_numbers.php?error=6");
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un Chiffre</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { background: #333; color: white; padding: 10px 20px; display: flex; justify-content: space-between; }
        .sidebar { width: 200px; background: #444; color: white; height: 100vh; position: fixed; }
        .sidebar a { display: block; color: white; padding: 15px; text-decoration: none; }
        .sidebar a:hover { background: #555; }
        .content { margin-left: 200px; padding: 20px; }
        .card { background: white; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, textarea, select { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; }
        .btn-primary { background: #4CAF50; color: white; border: none; cursor: pointer; }
        .btn-secondary { background: #6c757d; color: white; text-decoration: none; padding: 5px 10px; display: inline-block; }
        .current-file { font-size: 0.9em; color: #666; margin-top: 5px; }
        .preview-image { max-width: 100px; max-height: 100px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Modifier un Chiffre</h2>
        <a href="logout.php" class="logout">Déconnexion</a>
    </div>
    
    <div class="sidebar">
        <a href="index.php">Accueil</a>
        <a href="manage_alphabet.php">Gérer l'Alphabet</a>
        <a href="manage_colors.php">Gérer les Couleurs</a>
        <a href="manage_numbers.php">Gérer les Chiffres</a>
        <a href="manage_animals.php">Gérer les Animaux</a>
    </div>
    
    <div class="content">
        <div class="card">
            <h2><?= isset($number_data) ? 'Modifier' : 'Ajouter' ?> un chiffre</h2>
            <form action="edit_number.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $number_data['id'] ?? '' ?>">
                
                <div class="form-group">
                    <label>Chiffre (0-9):</label>
                    <input type="number" name="number" min="0" max="9" value="<?= htmlspecialchars($number_data['number'] ?? '') ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Nom du chiffre:</label>
                    <input type="text" name="number_name" value="<?= htmlspecialchars($number_data['name'] ?? '') ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="image" accept="image/*">
                    <?php if (!empty($number_data['image'])): ?>
                        <div class="current-file">
                            Fichier actuel: <?= htmlspecialchars($number_data['image']) ?>
                            <img src="../uploads/numbers/<?= htmlspecialchars($number_data['image']) ?>" class="preview-image">
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label>Son (MP3):</label>
                    <input type="file" name="sound" accept="audio/*">
                    <?php if (!empty($number_data['sound'])): ?>
                        <div class="current-file">
                            Fichier actuel: <?= htmlspecialchars($number_data['sound']) ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label>Description:</label>
                    <textarea name="description" rows="3"><?= htmlspecialchars($number_data['description'] ?? '') ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="manage_numbers.php" class="btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</body>
</html>