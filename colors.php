<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducatifEnfant - Couleurs</title>
    <link rel="stylesheet" href="style/colors.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Comic+Neue:wght@700&display=swap" rel="stylesheet">
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <!-- Header identique à accueil.php -->
    <header>
        <h2 class="logo">
            <a href="accueil.php">
                <img src="accueil/logo.png" alt="Logo EducatifEnfant">
            </a>
        </h2>
        <nav class="navigation">
            <a href="alphabet.php"><ion-icon name="book-outline"></ion-icon> Alphabet</a>
            <a href="colors.php"><ion-icon name="color-palette-outline"></ion-icon> Colors</a>
            <a href="numbers.php"><ion-icon name="calculator-outline"></ion-icon> Numbers</a>
            <a href="animals.php"><ion-icon name="paw-outline"></ion-icon> Animals</a>
            <button class="btnLogin-popup"><ion-icon name="log-in-outline"></ion-icon> Login</button>
        </nav>
    </header>

    <!-- Bannière principale -->
    <section class="banner">
        <div class="banner-content">
            <h1>Explorer les Couleurs</h1>
            <p>Découvrez l'arc-en-ciel à travers nos activités ludiques</p>
        </div>
        <div class="banner-bubbles"></div>
    </section>

    <!-- Contenu principal -->
    <section class="services-section">
        <h2 class="nos-services">Nos Couleurs</h2>
        
        <div class="service-box">
            <!-- Rouge -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front" style="background: #FF5252;">
                        <img src="colors/red.jpg" alt="Rouge">
                        <h3>Rouge</h3>
                        <p>Comme une fraise</p>
                        <div class="service-icon"><ion-icon name="color-filter-outline"></ion-icon></div>
                    </div>
                    <div class="service-back" style="background: #FF5252;">
                        <h3>Le Rouge</h3>
                        <p>C'est la couleur du feu, des pommes et des coeurs.</p>
                        <button class="btn-link">Voir plus</button>
                    </div>
                </div>
            </div>
            
            <!-- Bleu -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front" style="background: #4285F4;">
                        <img src="colors/blue.jpg" alt="Bleu">
                        <h3>Bleu</h3>
                        <p>Comme le ciel</p>
                        <div class="service-icon"><ion-icon name="water-outline"></ion-icon></div>
                    </div>
                    <div class="service-back" style="background: #4285F4;">
                        <h3>Le Bleu</h3>
                        <p>C'est la couleur de la mer et du ciel sans nuages.</p>
                        <button class="btn-link">Voir plus</button>
                    </div>
                </div>
            </div>
            
            <!-- Vert -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front" style="background: #0F9D58;">
                        <img src="colors/green.png" alt="Vert">
                        <h3>Vert</h3>
                        <p>Comme l'herbe</p>
                        <div class="service-icon"><ion-icon name="leaf-outline"></ion-icon></div>
                    </div>
                    <div class="service-back" style="background: #0F9D58;">
                        <h3>Le Vert</h3>
                        <p>C'est la couleur des arbres et de la nature.</p>
                        <button class="btn-link">Voir plus</button>
                    </div>
                </div>
            </div>
            
            <!-- Jaune -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front" style="background: #FFEB3B;">
                        <img src="colors/yellow.png" alt="Jaune">
                        <h3>Jaune</h3>
                        <p>Comme le soleil</p>
                        <div class="service-icon"><ion-icon name="sunny-outline"></ion-icon></div>
                    </div>
                    <div class="service-back" style="background: #FFEB3B;">
                        <h3>Le Jaune</h3>
                        <p>C'est la couleur du soleil et des tournesols.</p>
                        <button class="btn-link">Voir plus</button>
                    </div>
                </div>
            </div>

            <!-- Orange -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front" style="background: #FF9800;">
                        <img src="colors/orange.png" alt="Orange">
                        <h3>Orange</h3>
                        <p>Comme une orange</p>
                        <div class="service-icon"><ion-icon name="nutrition-outline"></ion-icon></div>
                    </div>
                    <div class="service-back" style="background: #FF9800;">
                        <h3>L'Orange</h3>
                        <p>C'est la couleur des couchers de soleil et des fruits juteux.</p>
                        <button class="btn-link">Voir plus</button>
                    </div>
                </div>
            </div>

            <!-- Violet -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front" style="background: #9C27B0;">
                        <img src="colors/purple.png" alt="Violet">
                        <h3>Violet</h3>
                        <p>Comme les aubergines</p>
                        <div class="service-icon"><ion-icon name="flower-outline"></ion-icon></div>
                    </div>
                    <div class="service-back" style="background: #9C27B0;">
                        <h3>Le Violet</h3>
                        <p>C'est la couleur magique des rêves et de la créativité.</p>
                        <button class="btn-link">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Vidéos -->
    <section class="features">
        <h2 class="nos-services">Vidéos Éducatives</h2>
        <div class="video-container">
            <div class="video-card">
                <video controls>
                    <source src="videos_colors/colors.mp4" type="video/mp4">
                </video>
                <h3>Apprendre les couleurs</h3>
            </div>
            <div class="video-card">
                <video controls>
                    <source src="videos_colors/color_song.mp4" type="video/mp4">
                </video>
                <h3>Chanson des couleurs</h3>
            </div>
        </div>
    </section>

    <!-- Jeu interactif avec sons -->
    <section class="game-section">
        <h2 class="nos-services">Jeu des Couleurs</h2>
        <p class="game-instruction">Cliquez sur une couleur pour entendre son nom !</p>
        <div class="game-container">
            <button class="color-button" data-sound="sounds_colors/red.mp3" style="background: #FF5252;">Rouge</button>
            <button class="color-button" data-sound="sounds_colors/blue.mp3" style="background: #4285F4;">Bleu</button>
            <button class="color-button" data-sound="sounds_colors/green.mp3" style="background: #0F9D58;">Vert</button>
            <button class="color-button" data-sound="sounds_colors/yellow.mp3" style="background: #FFEB3B;">Jaune</button>
            <button class="color-button" data-sound="sounds_colors/orange.mp3" style="background: #FF9800;">Orange</button>
            <button class="color-button" data-sound="sounds_colors/purple.mp3" style="background: #9C27B0;">Violet</button>
        </div>
    </section>

    <!-- Footer identique à accueil.php -->
    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="accueil/logo.png" alt="Logo EducatifEnfant">
                <p>Apprendre en s'amusant</p>
            </div>
            <div class="footer-links">
                <h4>Liens rapides</h4>
                <a href="accueil.php">Accueil</a>
                <a href="alphabet.php">Alphabet</a>
                <a href="numbers.php">Chiffres</a>
                <a href="colors.php">Couleurs</a>
            </div>
            <div class="footer-contact">
                <h4>Contact</h4>
                <p>contact@educatifenfant.com</p>
                <div class="social-icons">
                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-youtube"></ion-icon></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 EducatifEnfant - Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        // Script pour les bulles de la bannière
        document.addEventListener('DOMContentLoaded', function() {
            const banner = document.querySelector('.banner-bubbles');
            for (let i = 0; i < 20; i++) {
                const bubble = document.createElement('div');
                bubble.className = 'bubble';
                bubble.style.left = `${Math.random() * 100}%`;
                bubble.style.width = `${10 + Math.random() * 30}px`;
                bubble.style.height = bubble.style.width;
                bubble.style.animationDuration = `${5 + Math.random() * 10}s`;
                bubble.style.animationDelay = `${Math.random() * 5}s`;
                banner.appendChild(bubble);
            }

            // Script pour le jeu des couleurs
            const colorButtons = document.querySelectorAll('.color-button');
            colorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const soundFile = this.getAttribute('data-sound');
                    const audio = new Audio(soundFile);
                    audio.play();
                    
                    // Animation au clic
                    this.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 200);
                });
            });
        });
    </script>
</body>
</html>