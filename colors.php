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
            <?php
            require_once 'config.php'; // Ensure config is included

            // Fetch colors from the database for the main display (assuming 'colors' table has relevant fields)
            $sql_display = "SELECT * FROM colors ORDER BY name";
            $result_display = $conn->query($sql_display);

            if ($result_display->num_rows > 0) {
                while($color_data_display = $result_display->fetch_assoc()) {
                    $color_name = htmlspecialchars($color_data_display['name']);
                    $hex_code = htmlspecialchars($color_data_display['hex_code']);
                    $image_path = htmlspecialchars($color_data_display['name']);
                    $description = htmlspecialchars($color_data_display['description'] ?? '');
                    // Assuming an icon name might be stored or derived
                    $icon_name = 'color-filter-outline'; // Placeholder, ideally from DB

                    echo "
                    <div class=\"service\">
                        <div class=\"service-inner\">
                            <div class=\"service-front\" style=\"background: {$hex_code};\">
                                <img src=\"uploads/colors/{$image_path}\" alt=\"{$color_name}\">
                                <h3>{$color_name}</h3>
                                <p>{$description}</p> <!-- Using description here -->
                                <div class=\"service-icon\"><ion-icon name=\"{$icon_name}\"></ion-icon></div>
                            </div>
                            <div class=\"service-back\" style=\"background: {$hex_code};\">
                                <h3>Le {$color_name}</h3>
                                <p>{$description}</p>
                                <button class=\"btn-link\">Voir plus</button> <!-- Link functionality needs to be added -->
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>Aucune couleur trouvée dans la base de données.</p>";
            }
            ?>
        </div>
    </section>

    <!-- Section Vidéos -->
    <section class="features">
        <h2 class="nos-services">Vidéos Éducatives</h2>
        <div class="video-container">
            <!-- Videos are currently hardcoded, could be made dynamic from a 'videos' table -->
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
    <?php
    $sql_game = "SELECT name, hex_code, sound FROM colors WHERE sound IS NOT NULL AND sound != '' ORDER BY name";
    $result_game = $conn->query($sql_game);

    if ($result_game->num_rows > 0) {
        while($color_data_game = $result_game->fetch_assoc()) {
            $color_name = htmlspecialchars($color_data_game['name']);
            $hex_code = htmlspecialchars($color_data_game['hex_code']);
            $sound_path = htmlspecialchars($color_data_game['sound']);
            
            echo '<button class="color-button" 
                    data-sound="uploads/colors/sounds/'.$sound_path.'" 
                    style="background:'.$hex_code.'">'
                    .$color_name.
                  '</button>';
        }
    } else {
        echo "<p>Aucune couleur avec son disponible.</p>";
    }
    ?>
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
        // Script pour les bulles de la bannière (kept as is)
        document.addEventListener('DOMContentLoaded', function() {
    const colorButtons = document.querySelectorAll('.color-button');
    
    colorButtons.forEach(button => {
        button.addEventListener('click', function() {
            const soundPath = this.getAttribute('data-sound');
            
            if (soundPath) {
                // Crée un chemin absolu
                const absolutePath = window.location.origin + '/' + soundPath;
                const audio = new Audio(absolutePath);
                
                audio.play().catch(error => {
                    console.error("Erreur de lecture:", error);
                    // Affiche un message d'erreur plus clair
                    alert("Impossible de jouer le son. Vérifiez que le fichier existe bien à l'emplacement: " + absolutePath);
                });
            }

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