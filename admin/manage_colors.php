<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Couleurs</title>
    <style>
        /* Même style que manage_alphabet.php */
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { background: #333; color: white; padding: 10px 20px; display: flex; justify-content: space-between; }
        .sidebar { width: 200px; background: #444; color: white; height: 100vh; position: fixed; }
        .sidebar a { display: block; color: white; padding: 15px; text-decoration: none; }
        .sidebar a:hover { background: #555; }
        .content { margin-left: 200px; padding: 20px; }
        .card { background: white; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #f5f5f5; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; }
        .btn-primary { background: #4CAF50; color: white; }
        .btn-danger { background: #f44336; color: white; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, textarea, select { width: 100%; padding: 8px; box-sizing: border-box; }
        /* Styles spécifiques pour les couleurs */
        .color-preview { display: inline-block; width: 20px; height: 20px; border: 1px solid #ddd; margin-right: 5px; vertical-align: middle; }
        input[type="color"] { width: 50px; height: 30px; padding: 0; vertical-align: middle; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Gérer les Couleurs</h2>
        <a href="logout.php" class="logout">Déconnexion</a>
    </div>
    
    <div class="sidebar">
        <a href="index.php">Accueil</a>
        <a href="manage_alphabet.php">Gérer l'Alphabet</a>
        <a href="manage_colors.php">Gérer les Couleurs</a>
        <a href="manage_numbers.php">Gérer les Chiffres</a>
        <a href="manage_animals.php">Gérer les Animaux</a>
        <a href="manage_videos.php">Gérer les Vidéos</a>
        <a href="manage_sounds.php">Gérer les Sons</a>
    </div>
    
    <div class="content">
        <div class="card">
            <h2>Ajouter une nouvelle couleur</h2>
            <form action="save_color.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nom de la couleur:</label>
                    <input type="text" name="color_name" required>
                </div>
                <div class="form-group">
                    <label>Code couleur:</label>
                    <input type="color" name="hex_code" value="#FF0000" required>
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label>Son (MP3):</label>
                    <input type="file" name="sound" accept="audio/*">
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
        
        <div class="card">
            <h2>Couleurs existantes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Couleur</th>
                        <th>Code</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $colors = $conn->query("SELECT * FROM color_images ORDER BY color_name");
                    while($color = $colors->fetch_assoc()):
                    ?>
                    <tr>
                        <td>
                            <span class="color-preview" style="background:<?= $color['hex_code'] ?>"></span>
                            <?= htmlspecialchars($color['color_name']) ?>
                        </td>
                        <td><?= $color['hex_code'] ?></td>
                        <td><img src="../uploads/colors/<?= $color['filename'] ?>" height="50"></td>
                        <td>
                            <a href="edit_color.php?id=<?= $color['id'] ?>" class="btn btn-primary">Modifier</a>
                            <a href="delete_color.php?id=<?= $color['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>