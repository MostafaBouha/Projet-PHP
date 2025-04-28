<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Vérifie l'accès direct
if (!isset($_SERVER['HTTP_HOST'])) {
    die('Accès interdit');
}

// Chemin absolu pour les inclusions
define('BASE_DIR', __DIR__);

require_once BASE_DIR.'/admin_check.php';

// Test connexion DB
try {
    $test = $conn->query("SELECT 1");
} catch (Exception $e) {
    die("Erreur DB: ".$e->getMessage());
}
require_once 'admin_check.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - EducatifEnfant</title>
    <link rel="stylesheet" href="../style/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-container">
        <?php include 'admin_sidebar.php'; ?>
        
        <main class="admin-main">
            <h1>Tableau de Bord Administrateur</h1>
            
            <div class="admin-stats">
                <div class="stat-card">
                    <h3>Catégories</h3>
                    <?php
                    $result = $conn->query("SELECT COUNT(*) FROM categories");
                    $count = $result->fetch_row()[0];
                    ?>
                    <p><?= $count ?> catégories</p>
                    <a href="categories/liste.php" class="btn">Gérer</a>
                </div>
                
                <div class="stat-card">
                    <h3>Éléments</h3>
                    <?php
                    $result = $conn->query("SELECT COUNT(*) FROM elements");
                    $count = $result->fetch_row()[0];
                    ?>
                    <p><?= $count ?> éléments</p>
                    <a href="elements/liste.php" class="btn">Gérer</a>
                </div>
                
                <div class="stat-card">
                    <h3>Médias</h3>
                    <?php
                    $result = $conn->query("SELECT COUNT(*) FROM medias");
                    $count = $result->fetch_row()[0];
                    ?>
                    <p><?= $count ?> médias</p>
                    <a href="medias/gestion.php" class="btn">Gérer</a>
                </div>
            </div>
            
            <div class="recent-activity">
                <h2>Activité récente</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Détails</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query("
                            (SELECT 'category' as type, nom as name, date_creation as date FROM categories ORDER BY date_creation DESC LIMIT 3)
                            UNION
                            (SELECT 'element' as type, titre as name, date_creation as date FROM elements ORDER BY date_creation DESC LIMIT 3)
                            UNION
                            (SELECT 'media' as type, nom_fichier as name, date_upload as date FROM medias ORDER BY date_upload DESC LIMIT 3)
                            ORDER BY date DESC LIMIT 5
                        ");
                        
                        while ($row = $result->fetch_assoc()):
                            $type = $row['type'] === 'category' ? 'Catégorie' : 
                                   ($row['type'] === 'element' ? 'Élément' : 'Média');
                        ?>
                        <tr>
                            <td><?= date('d/m/Y H:i', strtotime($row['date'])) ?></td>
                            <td><?= $type ?></td>
                            <td><?= secureInput($row['name']) ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>