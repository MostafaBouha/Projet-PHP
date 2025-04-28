<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Animaux</title>
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
        /* Style spécifique pour les animaux */
        .animal-image { max-height: 50px; max-width: 80px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Gérer les Animaux</h2>
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
            <h2>Ajouter un nouvel animal</h2>
            <form action="save_animal.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nom de l'animal:</label>
                    <input type="text" name="animal_name" required>
                </div>
                <div class="form-group">
                    <label>Catégorie:</label>
                    <select name="category" required>
                        <option value="domestique">Domestique</option>
                        <option value="sauvage">Sauvage</option>
                        <option value="ferme">Ferme</option>
                        <option value="aquatique">Aquatique</option>
                    </select>
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
                    <textarea name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
        
        <div class="card">
            <h2>Animaux existants</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $animals = $conn->query("SELECT * FROM animals ORDER BY animal_name");
                    while($animal = $animals->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($animal['animal_name']) ?></td>
                        <td><?= htmlspecialchars($animal['category']) ?></td>
                        <td><img src="../uploads/animals/<?= $animal['filename'] ?>" class="animal-image"></td>
                        <td>
                            <a href="edit_animal.php?id=<?= $animal['id'] ?>" class="btn btn-primary">Modifier</a>
                            <a href="delete_animal.php?id=<?= $animal['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>