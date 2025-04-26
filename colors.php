<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducatifEnfant</title>
    <link rel="stylesheet" href="style/colors.css">
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header>
        <h2 class="logo">
            <img src="accueil/logo.png" alt="Logo">
        </h2>
        <nav class="navigation">
            <a href="process-login.php">Accueil</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup">Login</button>
        </nav>
    </header>
    <section class="colors-section">
    <h1 class="section-title">Apprendre les couleurs</h1>
    <p class="section-description">Explorez les couleurs avec des images, vidéos et sons amusants !</p>

    <!-- Galerie des couleurs -->
    <div class="colors-gallery">
        <div class="color-card">
            <img src="colors/red.jpg" alt="Rouge" class="color-image">
            <div class="color-overlay">
                <h3 class="color-name">Rouge</h3>
            </div>
        </div>
        <div class="color-card">
            <img src="colors/blue.jpg" alt="Bleu" class="color-image">
            <div class="color-overlay">
                <h3 class="color-name">Bleu</h3>
            </div>
        </div>
        <div class="color-card">
            <img src="colors/green.png" alt="Vert" class="color-image">
            <div class="color-overlay">
                <h3 class="color-name">Vert</h3>
            </div>
        </div>
        <div class="color-card">
            <img src="colors/yellow.png" alt="Jaune" class="color-image">
            <div class="color-overlay">
                <h3 class="color-name">Jaune</h3>
            </div>
        </div>
        <div class="color-card">
            <img src="colors/orange.png" alt="Orange" class="color-image">
            <div class="color-overlay">
                <h3 class="color-name">Orange</h3>
            </div>
        </div>
        <div class="color-card">
            <img src="colors/purple.png" alt="Violet" class="color-image">
            <div class="color-overlay">
                <h3 class="color-name">Violet</h3>
            </div>
        </div>
    </div>

    <!-- Vidéos éducatives -->
    <div class="colors-videos">
        <h2 class="videos-title">Vidéos éducatives</h2>
        <div class="video-container">
            <video controls>
                <source src="videos_colors/colors.mp4" type="video/mp4">
                Votre navigateur ne supporte pas les vidéos HTML5.
            </video>
            <video controls>
                <source src="videos_colors/color_song.mp4" type="video/mp4">
                Votre navigateur ne supporte pas les vidéos HTML5.
            </video>
        </div>
    </div>

    <!-- Jeu interactif -->
    <div class="colors-game">
        <h2 class="game-title">Jeu éducatif</h2>
        <p class="game-description">Cliquez sur une couleur pour entendre son nom !</p>
        <div class="game-container">
            <button class="color-button" data-sound="sounds_colors/red.mp3">Rouge</button>
            <button class="color-button" data-sound="sounds_colors/blue.mp3">Bleu</button>
            <button class="color-button" data-sound="sounds_colors/green.mp3">Vert</button>
            <button class="color-button" data-sound="sounds_colors/yellow.mp3">Jaune</button>
            <button class="color-button" data-sound="sounds_colors/orange.mp3">Orange</button>
            <button class="color-button" data-sound="sounds_colors/purple.mp3">Violet</button>
        </div>
    </div>
</section>
    <footer>
        <p>&copy; 2025 EducatifEnfant - Tous droits réservés.</p>
    </footer>
    <script src="scripts/colors.js"></script>
</body>
</html>