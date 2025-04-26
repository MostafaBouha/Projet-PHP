<!DOCTYPE html>
<html>
<head>
<title>EducatifEnfant</title>
<link rel="stylesheet" href="style/accueil.css">
<script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header>
            <h2 class="logo">
              <img src="accueil/logo.png" alt="Logo">
            </h2>
        <nav class ="navigation">
            <a href="process-login.php">Accueil</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup">Login</button>
        </nav>
    </header>

    <section class="banner">
        <h1>Bienvenue sur EducatifEnfant</h1>
        <p>Un espace d'apprentissage interactif et ludique conçu pour les enfants.</p>
    </section>

    <section class="services">
    <h2 class="nos-services">Nos Services</h2>
    <section class="services">
    <div class="service-box">
        <!-- Service Alphabet -->
        <div class="service">
            <div class="service-inner">
                <div class="service-front">
                    <img src="accueil/alphabet.jpg" alt="Alphabet">
                    <h3>Les lettres de l'alphabet</h3>
                    <p>(niveau facile)</p>
                </div>
                <div class="service-back">
                    <h3>Apprenez les lettres de A à Z</h3>
                    <p>Avec des animations et des jeux interactifs.</p>
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
                </div>
                <div class="service-back">
                    <h3>Découvrez les couleurs</h3>
                    <p>De manière ludique grâce à des jeux éducatifs.</p>
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
                </div>
                <div class="service-back">
                    <h3>Apprenez les chiffres</h3>
                    <p>En comptant avec des objets et des animations.</p>
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
                </div>
                <div class="service-back">
                    <h3>Explorez le monde des animaux</h3>
                    <p>Avec des images, des sons et des vidéos captivantes.</p>
                    <a href="animals.php" class="btn-link">Découvrir</a>
                </div>
            </div>
        </div>
        <!-- Service Contenus Multimédias -->
        <div class="service">
            <div class="service-inner">
                <div class="service-front">
                    <img src="accueil/multimedia.jpg" alt="Contenus multimédias">
                    <h3>Contenus multimédias</h3>
                </div>
                <div class="service-back">
                    <h3>Accédez à une bibliothèque</h3>
                    <p>De vidéos, sons et images pour enrichir l'apprentissage.</p>

                </div>
            </div>
        </div>
    </div>
</section>




    <footer>
        <p>&copy; 2025 EducatifEnfant - Tous droits réservés.</p>
    </footer>
    <script src="scripts/accueil.js"></script>

</body>