<?php
require_once 'config.php';

if(isset($_GET['id'])) {
    // Récupérer le nom du fichier avant suppression
    // Corrected: Select from 'animals' table
    $stmt = $conn->prepare("SELECT filename FROM animals WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $animal = $result->fetch_assoc(); // Corrected variable name

    // Check if animal exists
    if (!$animal) {
        // Animal not found, redirect with error
        header("Location: manage_animals.php?error=animal_not_found");
        exit();
    }

    // Supprimer de la base
    // Corrected: Delete from 'animals' table
    $delete_stmt = $conn->prepare("DELETE FROM animals WHERE id = ?");
    $delete_stmt->bind_param("i", $_GET['id']);

    if($delete_stmt->execute()) {
        // Supprimer le fichier
        // Corrected: Delete from 'uploads/animals' directory
        $file_path = "../uploads/animals/" . $animal['filename'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Corrected: Redirect to manage_animals.php
        header("Location: manage_animals.php?deleted=1");
        exit(); // Added exit after header
    } else {
        // Corrected: Redirect to manage_animals.php with error
        header("Location: manage_animals.php?error=delete_failed");
        exit(); // Added exit after header
    }
} else {
    // No ID provided, redirect with error
    header("Location: manage_animals.php?error=no_id");
    exit(); // Added exit after header
}
?>
