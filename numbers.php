<?php
// Include config.php for database connection
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducatifEnfant - Chiffres</title>
    <link rel="stylesheet" href="style/numbers.css"> <!-- Assuming a numbers.css exists -->
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

    <section class="numbers-section"> <!-- Assuming a numbers-section class -->
        <h1 class="section-title">Apprendre les chiffres</h1>
        <p class="section-description">Cliquez sur une image pour écouter son son.</p>
        <div class="numbers-container"> <!-- Assuming a numbers-container class -->
        <?php
        // Fetch numbers from the database
        $sql = "SELECT * FROM numbers ORDER BY number";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($number_data = $result->fetch_assoc()) {
                $number = htmlspecialchars($number_data['number']);
                $number_name = htmlspecialchars($number_data['number_name']); // Assuming number_name exists
                $image_path = htmlspecialchars($number_data['filename']);
                $sound_path = htmlspecialchars($number_data['sound_filename'] ?? ''); // Assuming sound_filename exists and is optional
                $description = htmlspecialchars($number_data['description'] ?? ''); // Assuming description exists and is optional

                echo "
                <div class='number-container' data-sound='uploads/numbers/{$sound_path}' data-description='{$description}'> <!-- Assuming a number-container class -->
                    <img src='uploads/numbers/{$image_path}' alt='{$number_name}' class='number-image'> <!-- Assuming a number-image class -->
                    <div class='number-overlay'> <!-- Assuming a number-overlay class -->
                        <h3 class='number-name'>{$number_name}</h3> <!-- Using number_name -->
                        <p class='number-value'>{$number}</p> <!-- Displaying the number itself -->
                    </div>
                </div>";
            }
        } else {
            echo "<p>Aucun chiffre trouvé dans la base de données.</p>";
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

    <script src="scripts/numbers.js"></script> <!-- Assuming a numbers.js exists -->
</body>
</html>
