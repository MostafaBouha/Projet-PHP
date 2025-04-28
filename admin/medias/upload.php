<?php
require_once '../../admin_check.php';

$element_id = intval($_GET['element_id'] ?? 0);

if ($element_id <= 0) {
    header('Location: ../elements/liste.php');
    exit;
}

// Vérifier que l'élément existe
$stmt = $conn->prepare("SELECT id, titre FROM elements WHERE id = ?");
$stmt->bind_param("i", $element_id);
$stmt->execute();
$element = $stmt->get_result()->fetch_assoc();

if (!$element) {
    header('Location: ../elements/liste.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $file = $_FILES['fichier'];
    
    // Validation
    $validation = validateUploadedFile($file, $type);
    if (!$validation['success']) {
        $erreur = $validation['message'];
    } else {
        // Créer le dossier s'il n'existe pas
        $uploadDir = UPLOAD_DIR . $type . '/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Générer un nom de fichier unique
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $fileName = uniqid() . '_' . preg_replace('/[^a-z0-9\.]/', '_', strtolower($file['name']));
        $filePath = $uploadDir . $fileName;
        
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Enregistrer en base
            $relativePath = 'uploads/' . $type . '/' . $fileName;
            $stmt = $conn->prepare("INSERT INTO medias (element_id, type, chemin, nom_fichier) VALUES (?, ?, ?, ?)");
            
            if ($stmt->execute([$element_id, $type, $relativePath, $file['name']])) {
                $_SESSION['message'] = "Média uploadé avec succès!";
                header("Location: gestion.php?element_id=$element_id");
                exit;
            } else {
                // Supprimer le fichier si l'insertion a échoué
                unlink($filePath);
                $erreur = "Erreur lors de l'enregistrement en base de données";
            }
        } else {
            $erreur = "Erreur lors de l'upload du fichier";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Uploader un Média</title>
    <link rel="stylesheet" href="../../style/admin.css">
</head>
<body>
    <div class="admin-container">
        <?php include '../admin_sidebar.php'; ?>
        
        <main class="admin-main">
            <h1>Uploader un Média</h1>
            <h2>Pour: <?= secureInput($element['titre']) ?></h2>
            
            <?php if (isset($erreur)): ?>
                <div class="alert error"><?= $erreur ?></div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data" class="admin-form">
                <input type="hidden" name="element_id" value="<?= $element_id ?>">
                
                <div class="form-group">
                    <label for="type">Type de média:</label>
                    <select id="type" name="type" required>
                        <option value="">Sélectionnez un type</option>
                        <option value="image">Image</option>
                        <option value="audio">Audio</option>
                        <option value="video">Vidéo</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="fichier">Fichier:</label>
                    <input type="file" id="fichier" name="fichier" required>
                    <p class="hint">Taille max: 10MB. Formats: 
                        Images (jpg, png, gif), 
                        Audio (mp3, wav, ogg), 
                        Vidéo (mp4, webm)
                    </p>
                </div>
                
                <button type="submit" class="btn">Uploader</button>
                <a href="gestion.php?element_id=<?= $element_id ?>" class="btn cancel">Annuler</a>
            </form>
        </main>
    </div>
</body>
</html>