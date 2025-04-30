<?php
require_once 'config.php';

if(isset($_GET['id'])) {
    // Récupérer les noms des fichiers avant suppression
    $stmt = $conn->prepare("SELECT image, sound FROM colors WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $color = $result->fetch_assoc();
    
    if($color) {
        // Supprimer de la base
        $delete_stmt = $conn->prepare("DELETE FROM colors WHERE id = ?");
        $delete_stmt->bind_param("i", $_GET['id']);
        
        if($delete_stmt->execute()) {
            // Supprimer les fichiers
            if(!empty($color['image'])) {
                $image_path = "../uploads/colors/" . $color['image'];
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            
            if(!empty($color['sound'])) {
                $sound_path = "../uploads/colors/sounds/" . $color['sound'];
                if(file_exists($sound_path)) {
                    unlink($sound_path);
                }
            }
            
            header("Location: manage_colors.php?deleted=1");
            exit();
        }
    }
    
    header("Location: manage_colors.php?error=3");
    exit();
}
?>