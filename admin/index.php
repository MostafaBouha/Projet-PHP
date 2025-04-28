<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { background: #333; color: white; padding: 10px 20px; display: flex; justify-content: space-between; }
        .sidebar { width: 200px; background: #444; color: white; height: 100vh; position: fixed; }
        .sidebar a { display: block; color: white; padding: 15px; text-decoration: none; }
        .sidebar a:hover { background: #555; }
        .content { margin-left: 200px; padding: 20px; }
        .card { background: white; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px; margin-bottom: 20px; }
        .logout { color: white; text-decoration: none; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Tableau de bord Admin</h2>
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
            <h2>Bienvenue dans l'interface d'administration</h2>
            <p>Utilisez le menu de gauche pour gérer les différentes sections du site.</p>
        </div>
        
        <div class="card">
            <h3>Statistiques rapides</h3>
            <p>Nombre d'images: <?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM images")) ?></p>
            <p>Nombre de vidéos: <?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM videos")) ?></p>
            <p>Nombre de sons: <?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sounds")) ?></p>
        </div>
    </div>
</body>
</html>