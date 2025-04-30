<?php
require_once 'config.php';

if(isset($_GET['id'])) {
    // Récupérer les informations avant suppression
    $stmt = $conn->prepare("SELECT image, sound FROM numbers WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $number = $result->fetch_assoc();
    
    if($number) {
        // Supprimer de la base de données
        $delete_stmt = $conn->prepare("DELETE FROM numbers WHERE id = ?");
        $delete_stmt->bind_param("i", $_GET['id']);
        
        if($delete_stmt->execute()) {
            // Supprimer les fichiers associés
            if(!empty($number['image'])) {
                $image_path = "../uploads/numbers/" . $number['image'];
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            
            if(!empty($number['sound'])) {
                $sound_path = "../uploads/numbers/sounds/" . $number['sound'];
                if(file_exists($sound_path)) {
                    unlink($sound_path);
                }
            }
            
            header("Location: manage_numbers.php?deleted=1");
        } else {
            header("Location: manage_numbers.php?error=4");
        }
    } else {
        header("Location: manage_numbers.php?error=5");
    }
} else {
    header("Location: manage_numbers.php");
}
exit();
?>