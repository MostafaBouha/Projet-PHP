<?php
require_once '../../admin_check.php';

$element_id = intval($_GET['element_id'] ?? 0);

if ($element_id <= 0) {
    header('Location: ../elements/liste.php');
    exit;
}

// Récupérer l'élément
$stmt = $conn->prepare("SELECT e.*, c.nom as categorie_nom FROM elements e JOIN categories c ON e.categorie_id = c.id WHERE e.id = ?");
$stmt->bind_param("i", $element_id);
$stmt->execute();
$element = $stmt->get_result()->fetch_assoc();

if (!$element) {
    header('Location: ../elements/liste.php');
    exit;
}

// Récupérer les médias
$stmt = $conn->prepare("SELECT * FROM medias WHERE element_id = ? ORDER BY type, date_upload DESC");
$stmt->bind_param("i", $element_id);
$stmt->execute();
$medias = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Compter par type
$countByType = ['image' => 0,'audio' => 0,'video' => 0];

foreach ($medias as $media) {
    $countByType[$media['type']]++;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Médias</title>
    <link rel="stylesheet" href="../../style/admin.css">
</head>
<body>
    <div class="admin-container">
        <?php include '../admin_sidebar.php'; ?>
        
        <main class="admin-main">
            <h1>Gestion des Médias</h1>
            <h2><?= secureInput($element['titre']) ?> (<?= secureInput($element['categorie_nom']) ?>)</h2>
            
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert success"><?= $_SESSION['message'] ?></div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            
            <div class="media-stats">
                <div class="stat-card">
                    <h3>Images</h3>
                    <p><?= $countByType['image'] ?> fichiers</p>
                </div>
                <div class="stat-card">
                    <h3>Audios</h3>
                    <p><?= $countByType['audio'] ?> fichiers</p>
                </div>
                <div class="stat-card">
                    <h3>Vidéos</h3>
                    <p><?= $countByType['video'] ?> fichiers</p>
                </div>
            </div>
            
            <div class="admin-actions">
                <a href="upload.php?element_id=<?= $element_id ?>" class="btn">Ajouter un média</a>
                <a href="../elements/liste.php" class="btn cancel">Retour aux éléments</a>
            </div>
            
            <div class="media-gallery">
                <?php foreach ($medias as $media): ?>
                <div class="media-item">
                    <?php if ($media['type'] === 'image'): ?>
                        <img src="../../<?= $media['chemin'] ?>" alt="<?= secureInput($media['nom_fichier']) ?>">
                    <?php elseif ($media['type'] === 'audio'): ?>
                        <div class="media-icon">
                            <ion-icon name="musical-notes-outline"></ion-icon>
                        </div>
                        <audio controls>
                            <source src="../../<?= $media['chemin'] ?>" type="audio/mpeg">
                        </audio>
                    <?php else: ?>
                        <div class="media-icon">
                            <ion-icon name="videocam-outline"></ion-icon>
                        </div>
                        <video controls>
                            <source src="../../<?= $media['chemin'] ?>" type="video/mp4">
                        </video>
                    <?php endif; ?>
                    
                    <div class="media-info">
                        <p><?= secureInput($media['nom_fichier']) ?></p>
                        <p><?= strtoupper($media['type']) ?> - <?= date('d/m/Y H:i', strtotime($media['date_upload'])) ?></p>
                    </div>
                    
                    <div class="media-actions">
                        <a href="supprimer.php?id=<?= $media['id'] ?>&element_id=<?= $element_id ?>" 
                           class="btn small danger" 
                           onclick="return confirm('Supprimer ce média ?')">
                            Supprimer
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <?php if (empty($medias)): ?>
                    <p class="no-media">Aucun média pour cet élément</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>
</body>
</html>