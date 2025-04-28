<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $letter = sanitize($_POST['letter']);
    $description = sanitize($_POST['description']);
    
    // Gestion de l'image
    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imagePath = "../images_alphabet/" . basename($imageName);
    
    // Gestion du son
    $soundPath = null;
    if (!empty($_FILES['sound']['name'])) {
        $soundName = $_FILES['sound']['name'];
        $soundTmp = $_FILES['sound']['tmp_name'];
        $soundPath = "../sounds_alphabet/" . basename($soundName);
        move_uploaded_file($soundTmp, $soundPath);
    }
    
    if (move_uploaded_file($imageTmp, $imagePath)) {
        $stmt = $conn->prepare("INSERT INTO alphabet (letter, image, sound, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $letter, $imageName, $soundName, $description);
        
        if ($stmt->execute()) {
            header("Location: manage_alphabet.php?success=1");
        } else {
            header("Location: manage_alphabet.php?error=1");
        }
    } else {
        header("Location: manage_alphabet.php?error=2");
    }
}
?>