<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducatifEnfant</title>
    <link rel="stylesheet" href="style/accueil.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Comic+Neue:wght@700&display=swap" rel="stylesheet">
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
            <h1>Bienvenue sur EducatifEnfant</h1>
            <p>Un espace magique où l'apprentissage devient une aventure !</p>
            <a href="#services" class="btn-explore">Explorer</a>
        </div>
        <div class="banner-bubbles"></div>
    </section>

    <section id="services" class="services-section">
        <h2 class="nos-services">Nos Services</h2>
        <div class="service-box">
            <!-- Service Alphabet -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front">
                        <img src="accueil/alphabet.jpg" alt="Alphabet">
                        <h3>Les lettres de l'alphabet</h3>
                        <p>(niveau facile)</p>
                        <div class="service-icon"><ion-icon name="book-outline"></ion-icon></div>
                    </div>
                    <div class="service-back">
                        <h3>Apprenez les lettres de A à Z</h3>
                        <p>Avec des animations et des jeux interactifs pour rendre l'apprentissage amusant.</p>
                        <a href="alphabet.php" class="btn-link">Découvrir</a>
                    </div>
                </div>
            </div>
            
            <!-- Service Couleurs -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front">
                        <img src="accueil/colors.png" alt="Couleurs">
                        <h3>Apprendre les couleurs</h3>
                        <p>Arc-en-ciel de connaissances</p>
                        <div class="service-icon"><ion-icon name="color-palette-outline"></ion-icon></div>
                    </div>
                    <div class="service-back">
                        <h3>Découvrez les couleurs</h3>
                        <p>De manière ludique grâce à des jeux éducatifs et des activités créatives.</p>
                        <a href="colors.php" class="btn-link">Découvrir</a>
                    </div>
                </div>
            </div>
            
            <!-- Service Chiffres -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front">
                        <img src="accueil/numbers.jpg" alt="Chiffres">
                        <h3>Apprendre les chiffres</h3>
                        <p>(0 à 10)</p>
                        <div class="service-icon"><ion-icon name="calculator-outline"></ion-icon></div>
                    </div>
                    <div class="service-back">
                        <h3>Apprenez les chiffres</h3>
                        <p>En comptant avec des objets et des animations captivantes.</p>
                        <a href="numbers.php" class="btn-link">Découvrir</a>
                    </div>
                </div>
            </div>
            
            <!-- Service Animaux -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front">
                        <img src="accueil/animals.jpg" alt="Animaux">
                        <h3>Apprendre les animaux</h3>
                        <p>Rencontrez nos amis</p>
                        <div class="service-icon"><ion-icon name="paw-outline"></ion-icon></div>
                    </div>
                    <div class="service-back">
                        <h3>Explorez le monde des animaux</h3>
                        <p>Avec des images, des sons et des vidéos captivantes.</p>
                        <a href="animals.php" class="btn-link">Découvrir</a>
                    </div>
                </div>
            </div>
            
            <!-- Service Multimédia -->
            <div class="service">
                <div class="service-inner">
                    <div class="service-front">
                        <img src="accueil/multimedia.jpg" alt="Multimédia">
                        <h3>Contenus multimédias</h3>
                        <p>Vidéos et sons</p>
                        <div class="service-icon"><ion-icon name="play-circle-outline"></ion-icon></div>
                    </div>
                    <div class="service-back">
                        <h3>Bibliothèque multimédia</h3>
                        <p>Accédez à une collection de vidéos éducatives et de sons amusants.</p>
                        <a href="#" class="btn-link">Explorer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="feature-card">
            <ion-icon name="sparkles-outline"></ion-icon>
            <h3>Apprentissage Ludique</h3>
            <p>Des méthodes amusantes pour apprendre sans s'en rendre compte</p>
        </div>
        <div class="feature-card">
            <ion-icon name="shield-checkmark-outline"></ion-icon>
            <h3>Environnement Sécurisé</h3>
            <p>Un espace 100% adapté aux enfants sans publicité</p>
        </div>
        <div class="feature-card">
            <ion-icon name="trophy-outline"></ion-icon>
            <h3>Système de Récompenses</h3>
            <p>Des badges et étoiles pour motiver les progrès</p>
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

    <script src="scripts/accueil.js"></script>
</body>
</html>