<?php
require_once 'config.php';

if(isset($_GET['id'])) {
    // Récupérer le nom du fichier avant suppression
    $stmt = $conn->prepare("SELECT filename FROM color_images WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $color = $result->fetch_assoc();
    
    // Supprimer de la base
    $delete_stmt = $conn->prepare("DELETE FROM color_images WHERE id = ?");
    $delete_stmt->bind_param("i", $_GET['id']);
    
    if($delete_stmt->execute()) {
        // Supprimer le fichier
        unlink("../uploads/colors/" . $color['filename']);
        header("Location: manage_colors.php?deleted=1");
    } else {
        header("Location: manage_colors.php?error=3");
    }
}
?>