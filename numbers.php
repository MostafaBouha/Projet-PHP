<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducatifEnfant - Chiffres</title>
    <link rel="stylesheet" href="style/numbers.css">
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

    <section class="numbers-section">
        <h1 class="section-title">Apprendre les chiffres</h1>
        <p class="section-description">Cliquez sur les chiffres pour découvrir des vidéos éducatives et des jeux amusants !</p>

        <!-- Galerie des chiffres -->
        <div class="numbers-gallery">
            <div class="number-card">
                <img src="numbers/0.png" alt="0" class="number-image">
                <div class="number-overlay">0</div>
            </div>
            <div class="number-card">
                <img src="numbers/1.jpg" alt="1" class="number-image">
                <div class="number-overlay">1</div>
            </div>
            <div class="number-card">
                <img src="numbers/2.png" alt="2" class="number-image">
                <div class="number-overlay">2</div>
            </div>
            <div class="number-card">
                <img src="numbers/3.jpg" alt="3" class="number-image">
                <div class="number-overlay">3</div>
            </div>
            <div class="number-card">
                <img src="numbers/4.png" alt="4" class="number-image">
                <div class="number-overlay">4</div>
            </div>
            <div class="number-card">
                <img src="numbers/5.jpg" alt="5" class="number-image">
                <div class="number-overlay">5</div>
            </div>
            <div class="number-card">
                <img src="numbers/6.jpg" alt="6" class="number-image">
                <div class="number-overlay">6</div>
            </div>
            <div class="number-card">
                <img src="numbers/7.png" alt="7" class="number-image">
                <div class="number-overlay">7</div>
            </div>
            <div class="number-card">
                <img src="numbers/8.png" alt="8" class="number-image">
                <div class="number-overlay">8</div>
            </div>
            <div class="number-card">
                <img src="numbers/9.jpg" alt="9" class="number-image">
                <div class="number-overlay">9</div>
            </div>
        </div>

        <!-- Vidéos éducatives -->
        <div class="numbers-videos">
            <h2 class="videos-title">Vidéos éducatives</h2>
            <div class="video-container">
                <video controls>
                    <source src="videos_numbers/counting.mp4" type="video/mp4">
                    Votre navigateur ne supporte pas les vidéos HTML5.
                </video>
                <video controls>
                    <source src="videos_numbers/numbers_song.mp4" type="video/mp4">
                    Votre navigateur ne supporte pas les vidéos HTML5.
                </video>
            </div>
        </div>

        <!-- Jeu éducatif -->
        <div class="numbers-game">
            <h2 class="game-title">Jeu éducatif</h2>
            <p class="game-description">Cliquez sur un chiffre pour entendre son nom !</p>
            <div class="game-container">
                <button class="number-button" data-sound="sounds_numbers/0.mp3">0</button>
                <button class="number-button" data-sound="sounds_numbers/1.mp3">1</button>
                <button class="number-button" data-sound="sounds_numbers/2.mp3">2</button>
                <button class="number-button" data-sound="sounds_numbers/3.mp3">3</button>
                <button class="number-button" data-sound="sounds_numbers/4.mp3">4</button>
                <button class="number-button" data-sound="sounds_numbers/5.mp3">5</button>
                <button class="number-button" data-sound="sounds_numbers/6.mp3">6</button>
                <button class="number-button" data-sound="sounds_numbers/7.mp3">7</button>
                <button class="number-button" data-sound="sounds_numbers/8.mp3">8</button>
                <button class="number-button" data-sound="sounds_numbers/9.mp3">9</button>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 EducatifEnfant - Tous droits réservés.</p>
    </footer>
    <script src="scripts/numbers.js"></script>
</body>
</html>