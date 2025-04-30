<?php
// Include config.php for database connection
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducatifEnfant - Alphabet</title>
    <link rel="stylesheet" href="style/alphabet.css">
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

    <section class="alphabet-section">
        <h1 class="section-title">Apprendre les lettres de l'alphabet</h1>
        <p class="section-description">Cliquez sur une image pour écouter son son ou découvrir un mot.</p>
        <div class="alphabet-container">
        <?php
        // Fetch letters from the database
        $sql = "SELECT * FROM alphabet ORDER BY letter";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($letter_data = $result->fetch_assoc()) {
                $letter = htmlspecialchars($letter_data['letter']);
                $image_path = htmlspecialchars($letter_data['filename']);
                $sound_path = htmlspecialchars($letter_data['sound_filename'] ?? ''); // Assuming sound_filename exists and is optional
                $description = htmlspecialchars($letter_data['description'] ?? ''); // Assuming description exists and is optional

                echo "
                <div class='letter-container' data-sound='uploads/alphabet/{$sound_path}' data-description='{$description}'>
                    <img src='uploads/alphabet/{$image_path}' alt='{$letter}' class='letter-image'>
                    <div class='letter-overlay'>
                        <h3 class='letter-name'>{$letter}</h3>
                    </div>
                </div>";
            }
        } else {
            echo "<p>Aucune lettre trouvée dans la base de données.</p>";
        }
        ?>
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

    <script src="scripts/alphabet.js"></script>
</body>
</html>
