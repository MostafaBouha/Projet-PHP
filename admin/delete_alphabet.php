<?php
require_once 'config.php';

if(isset($_GET['id'])) {
    // Récupérer les noms des fichiers image et son avant suppression
    // Corrected: Select from 'alphabet' table
    $stmt = $conn->prepare("SELECT filename, sound_filename FROM alphabet WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $letter = $result->fetch_assoc(); // Corrected variable name

    // Check if letter exists
    if (!$letter) {
        // Letter not found, redirect with error
        header("Location: manage_alphabet.php?error=letter_not_found");
        exit();
    }

    // Supprimer de la base de données
    // Corrected: Delete from 'alphabet' table
    $delete_stmt = $conn->prepare("DELETE FROM alphabet WHERE id = ?");
    $delete_stmt->bind_param("i", $_GET['id']);

    if($delete_stmt->execute()) {
        // Supprimer le fichier image
        // Corrected: Delete from 'uploads/alphabet' directory
        $image_path = "../uploads/alphabet/" . $letter['filename'];
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Supprimer le fichier son (si il existe)
        // Corrected: Delete from 'uploads/alphabet/sounds' directory
        if (!empty($letter['sound_filename'])) {
            $sound_path = "../uploads/alphabet/sounds/" . $letter['sound_filename'];
            if (file_exists($sound_path)) {
                unlink($sound_path);
            }
        }

        // Rediriger vers manage_alphabet.php avec succès
        header("Location: manage_alphabet.php?deleted=1");
        exit(); // Added exit after header
    } else {
        // Rediriger vers manage_alphabet.php avec erreur
        header("Location: manage_alphabet.php?error=delete_failed");
        exit(); // Added exit after header
    }
} else {
    // No ID provided, redirect with error
    header("Location: manage_alphabet.php?error=no_id");
    exit(); // Added exit after header
}
?>
