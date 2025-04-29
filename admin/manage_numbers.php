<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Chiffres</title>
    <style>
        /* [Conservez le même style que manage_animals.php] */
    </style>
</head>
<body>
    <div class="header">
        <h2>Gérer les Chiffres</h2>
        <a href="logout.php" class="logout">Déconnexion</a>
    </div>
    
    <div class="sidebar">
        <!-- [Menu identique à manage_animals.php] -->
    </div>
    
    <div class="content">
        <div class="card">
            <h2>Ajouter un nouveau chiffre</h2>
            <form action="save_number.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Chiffre (0-9):</label>
                    <input type="number" name="number" min="0" max="9" required>
                </div>
                <div class="form-group">
                    <label>Nom du chiffre:</label>
                    <input type="text" name="number_name" required>
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
            <h2>Chiffres existants</h2>
            <table>
                <thead>
                    <tr>
                        <th>Chiffre</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $numbers = $conn->query("SELECT * FROM numbers ORDER BY number");
                    while($number = $numbers->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($number['number'] ?? '') ?></td>
                        <td><?= htmlspecialchars($number['number_name'] ?? 'Non spécifié') ?></td>
                        <td><img src="../uploads/numbers/<?= $number['filename'] ?>" height="50"></td>
                        <td>
                            <a href="edit_number.php?id=<?= $number['id'] ?>" class="btn btn-primary">Modifier</a>
                            <a href="delete_number.php?id=<?= $number['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>