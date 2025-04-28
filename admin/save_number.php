<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $conn->real_escape_string($_POST['number']);
    $number_name = $conn->real_escape_string($_POST['number_name']);
    $description = $conn->real_escape_string($_POST['description']);
    
    // Gestion de l'image
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = "../uploads/numbers/" . basename($image_name);
    
    // Gestion du son
    $sound_path = null;
    if(!empty($_FILES['sound']['name'])) {
        $sound_name = $_FILES['sound']['name'];
        $sound_tmp = $_FILES['sound']['tmp_name'];
        $sound_path = "../uploads/numbers/sounds/" . basename($sound_name);
        move_uploaded_file($sound_tmp, $sound_path);
    }
    
    if(move_uploaded_file($image_tmp, $image_path)) {
        $stmt = $conn->prepare("INSERT INTO numbers (number, number_name, filename, sound_filename, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $number, $number_name, $image_name, $sound_name, $description);
        
        if($stmt->execute()) {
            header("Location: manage_numbers.php?success=1");
        } else {
            header("Location: manage_numbers.php?error=1");
        }
    } else {
        header("Location: manage_numbers.php?error=2");
    }
}
?>