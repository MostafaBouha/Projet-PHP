<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducatifEnfant - Animaux</title>
    <link rel="stylesheet" href="style/animals.css">
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
        <nav class ="navigation">
            <a href="alphabet.php"><ion-icon name="book-outline"></ion-icon> Alphabet</a>
            <a href="colors.php"><ion-icon name="color-palette-outline"></ion-icon> Colors</a>
            <a href="numbers.php"><ion-icon name="calculator-outline"></ion-icon> Numbers</a>
            <a href="animals.php"><ion-icon name="paw-outline"></ion-icon> Animals</a>
            <button class="btnLogin-popup"><ion-icon name="log-in-outline"></ion-icon> Login</button>
        </nav>
    </header>
    <section class="animals-section">
        <h1 class="section-title">Découvrir les animaux</h1>
        <p class="section-description">Explorez le monde des animaux avec des interactions amusantes !</p>
        <!-- Galerie d'images interactives -->
        <div class="animals-gallery">
            <?php
            // Fetch animals from the database
            $sql = "SELECT * FROM animals ORDER BY name";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($animal_data = $result->fetch_assoc()) {
                    $animal_name = htmlspecialchars($animal_data['name']);
                    $image_path = htmlspecialchars($animal_data['filename']);
                    $sound_path = htmlspecialchars($animal_data['sound_filename'] ?? ''); // Assuming sound_filename exists and is optional
                    $description = htmlspecialchars($animal_data['description'] ?? ''); // Assuming description exists and is optional

                    echo "
                    <div class='animal-card' data-sound='uploads/animals/{$sound_path}' data-description='{$description}'>
                        <img src='uploads/animals/{$image_path}' alt='{$animal_name}' class='animal-image'>
                        <div class='animal-overlay'>
                            <h3 class='animal-name'>{$animal_name}</h3>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>Aucun animal trouvé dans la base de données.</p>";
            }
            ?>
        </div>

        <!-- Section des vidéos -->
        <div class="animals-videos">
            <h2 class="videos-title">Vidéos éducatives</h2>
            <div class="video-container">
                <!-- Videos are currently hardcoded, could be made dynamic from a 'videos' table -->
                <div class="video-card">
                    <video controls>
                        <source src="videos/lion.mp4" type="video/mp4">
                        Votre navigateur ne supporte pas les vidéos HTML5.
                    </video>
                    <h3>Le Lion</h3>
                </div>
                <div class="video-card">
                    <video controls>
                        <source src="videos/elephant.mp4" type="video/mp4">
                        Votre navigateur ne supporte pas les vidéos HTML5.
                    </video>
                    <h3>L'Éléphant</h3>
                </div>
                 <!-- Add more video cards here if needed -->
            </div>
        </div>

        <!-- Jeu interactif -->
        <div class="animals-game">
            <h2 class="game-title">Jeu éducatif</h2>
            <p class="game-description">Cliquez sur un animal pour entendre son cri !</p>
            <div class="game-container">
                 <?php
                // Fetch animals from the database for the game buttons
                // You might want a specific query or filter if the game uses a subset of animals
                $sql_game = "SELECT name, sound_filename FROM animals ORDER BY name";
                $result_game = $conn->query($sql_game);

                if ($result_game->num_rows > 0) {
                    while($animal_data_game = $result_game->fetch_assoc()) {
                        $animal_name = htmlspecialchars($animal_data_game['name']);
                        $sound_path = htmlspecialchars($animal_data_game['sound_filename'] ?? ''); // Assuming sound_filename exists and is optional

                        echo "
                        <button class=\"animal-button\" data-sound='uploads/animals/{$sound_path}'>{$animal_name}</button>";
                    }
                } else {
                    echo "<p>Aucun animal trouvé pour le jeu.</p>";
                }
                ?>
            </div>
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
    <script src="scripts/animals.js"></script> <!-- Ensure this script handles the data-sound attribute -->
</body>
</html>
