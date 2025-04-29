<?php
require_once 'config.php';

$animals = $conn->query("
    SELECT *, 
    CONCAT('".BASE_URL."/uploads/animals/', filename) as image_url,
    CONCAT('".BASE_URL."/uploads/animals/sounds/', sound_filename) as sound_url
    FROM animals 
    ORDER BY name
");
?>
<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducatifEnfant</title>
    <link rel="stylesheet" href="style/animals.css">
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header>
        <h2 class="logo">
            <a href="accueil.php">
                <img src="accueil/logo.png" alt="Logo EducatifEnfant">
            </a>
        </h2>
        <nav class ="navigation">
            <a href="alphabet.php">Alphabet</a>
            <a href="colors.php">Colors</a>
            <a href="numbers.php">Numbers</a>
            <a href="animals.php">Animals</a>
            <button class="btnLogin-popup">Login</button>
        </nav>
    </header>
    <section class="animals-section">
    <h1 class="section-title">Découvrir les animaux</h1>
    <p class="section-description">Explorez le monde des animaux avec des interactions amusantes !</p>
    <!-- Galerie d'images interactives -->
    <div class="animals-gallery">
        <div class="animal-card">
            <img src="animals/lion.png" alt="Lion" class="animal-image">
            <div class="animal-overlay">
                <h3 class="animal-name">Lion</h3>
            </div>
        </div>
        <div class="animal-card">
            <img src="animals/elephant.jpg" alt="Éléphant" class="animal-image">
            <div class="animal-overlay">
                <h3 class="animal-name">Éléphant</h3>
            </div>
        </div>
        <div class="animal-card">
            <img src="animals/tiger.jpg" alt="Tigre" class="animal-image">
            <div class="animal-overlay">
                <h3 class="animal-name">Tigre</h3>
            </div>
        </div>
        <div class="animal-card">
            <img src="animals/bird.jpg" alt="Oiseau" class="animal-image">
            <div class="animal-overlay">
                <h3 class="animal-name">Oiseau</h3>
            </div>
        </div>
        <div class="animal-card">
            <img src="animals/fish.jpg" alt="Poisson" class="animal-image">
            <div class="animal-overlay">
                <h3 class="animal-name">Poisson</h3>
            </div>
        </div>
        <div class="animal-card">
            <img src="animals/cat.jpg" alt="Chat" class="animal-image">
            <div class="animal-overlay">
                <h3 class="animal-name">Chat</h3>
            </div>
        </div>
    </div>

    <!-- Section des vidéos -->
    <div class="animals-videos">
        <h2 class="videos-title">Vidéos éducatives</h2>
        <div class="video-container">
            <video controls>
                <source src="videos/lion.mp4" type="video/mp4">
                Votre navigateur ne supporte pas les vidéos HTML5.
            </video>
            <video controls>
                <source src="videos/elephant.mp4" type="video/mp4">
                Votre navigateur ne supporte pas les vidéos HTML5.
            </video>
        </div>
    </div>

    <!-- Jeu interactif -->
    <div class="animals-game">
        <h2 class="game-title">Jeu éducatif</h2>
        <p class="game-description">Cliquez sur un animal pour entendre son cri !</p>
        <div class="game-container">
            <button class="animal-button" data-sound="sounds_animals/lion.mp3">Lion</button>
            <button class="animal-button" data-sound="sounds_animals/elephant.mp3">Éléphant</button>
            <button class="animal-button" data-sound="sounds_animals/cat.mp3">Chat</button>
        </div>
    </div>
</section>
    <footer>
        <p>&copy; 2025 EducatifEnfant - Tous droits réservés.</p>
    </footer>
    <script src="scripts/animals.js"></script>
</body>
</html>