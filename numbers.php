<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducatifEnfant - Chiffres</title>
    <link rel="stylesheet" href="style/numbers.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Comic+Neue:wght@700&display=swap" rel="stylesheet">
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <?php require_once 'config.php'; ?>
    
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

    <section class="banner">
        <div class="banner-content">
            <h1>Apprendre les Chiffres</h1>
            <p>De 0 à 9 à travers des activités ludiques</p>
        </div>
        <div class="banner-bubbles"></div>
    </section>

    <section class="services-section">
        <h2 class="nos-services">Nos Chiffres</h2>
        
        <div class="service-box">
            <?php
            $numbers = $conn->query("SELECT * FROM numbers ORDER BY number");
            $colors = ['#4CAF50', '#2196F3', '#FF5722', '#9C27B0', '#FFC107', '#607D8B', '#E91E63', '#795548', '#3F51B5', '#009688'];
            $icons = ['alert-circle-outline', 'star-outline', 'git-compare-outline', 'triangle-outline', 'square-outline', 'hand-left-outline', 'dice-outline', 'happy-outline', 'infinite-outline', 'arrow-forward-outline'];
            
            $i = 0;
            while($number = $numbers->fetch_assoc()):
                $color = $colors[$i % count($colors)];
                $icon = $icons[$i % count($icons)];
                $i++;
            ?>
            <div class="service">
                <div class="service-inner">
                    <div class="service-front" style="background: <?= $color ?>;">
                        <img src="uploads/numbers/<?= htmlspecialchars($number['image']) ?>" alt="<?= htmlspecialchars($number['number']) ?>">
                        <h3><?= htmlspecialchars($number['name']) ?></h3>
                        <p><?= htmlspecialchars($number['description']) ?></p>
                        <div class="service-icon"><ion-icon name="<?= $icon ?>"></ion-icon></div>
                    </div>
                    <div class="service-back" style="background: <?= $color ?>;">
                        <h3>Le <?= htmlspecialchars($number['name']) ?></h3>
                        <p><?= htmlspecialchars($number['description']) ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- Section Vidéos (peut être rendue dynamique aussi) -->
    <section class="features">
        <h2 class="nos-services">Vidéos Éducatives</h2>
        <div class="video-container">
            <div class="video-card">
                <video controls poster="numbers/video-thumb1.jpg">
                    <source src="videos_numbers/counting.mp4" type="video/mp4">
                </video>
                <h3>Apprendre à compter</h3>
            </div>
            <div class="video-card">
                <video controls poster="numbers/video-thumb2.jpg">
                    <source src="videos_numbers/numbers_song.mp4" type="video/mp4">
                </video>
                <h3>Chanson des chiffres</h3>
            </div>
        </div>
    </section>

    <!-- Jeu interactif avec sons -->
    <section class="game-section">
        <h2 class="nos-services">Jeu des Chiffres</h2>
        <p class="game-instruction">Cliquez sur un chiffre pour entendre son nom !</p>
        <div class="game-container">
            <?php
            $numbers = $conn->query("SELECT number, sound FROM numbers ORDER BY number");
            while($number = $numbers->fetch_assoc()):
            ?>
            <button class="number-button" data-sound="uploads/numbers/sounds/<?= htmlspecialchars($number['sound']) ?>">
                <?= htmlspecialchars($number['number']) ?>
            </button>
            <?php endwhile; ?>
        </div>
    </section>

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
        document.addEventListener('DOMContentLoaded', function() {
            // Bulles de la bannière
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

            // Jeu des chiffres
            const numberButtons = document.querySelectorAll('.number-button');
            numberButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const soundFile = this.getAttribute('data-sound');
                    if (soundFile) {
                        const audio = new Audio(soundFile);
                        audio.play().catch(e => console.error("Erreur de lecture:", e));
                    }
                    
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