<?php
require_once 'config.php';

// Récupérer la couleur existante
$color = [];
if(isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM color_images WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $color = $stmt->get_result()->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Couleur</title>
    <style>
        /* Le même style que manage_colors.php */
    </style>
</head>
<body>
    <h1>Modifier <?= $color['color_name'] ?? 'Couleur' ?></h1>
    
    <form action="update_color.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $color['id'] ?? '' ?>">
        
        <div>
            <label>Nom:</label>
            <input type="text" name="color_name" value="<?= $color['color_name'] ?? '' ?>" required>
        </div>
        
        <!-- Ajoutez les autres champs ici -->
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</body>
</html>