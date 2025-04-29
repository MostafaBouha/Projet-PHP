<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données
    $name = $conn->real_escape_string($_POST['animal_name']);
    $description = $conn->real_escape_string($_POST['description']);

    // Gestion du fichier image
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = "../uploads/animals/" . basename($image_name);

    // Gestion du fichier son
    $sound_name = '';
    if (!empty($_FILES['sound']['name'])) {
        $sound_name = $_FILES['sound']['name'];
        $sound_tmp = $_FILES['sound']['tmp_name'];
        $sound_path = "../uploads/animals/sounds/" . basename($sound_name);
        if (!move_uploaded_file($sound_tmp, $sound_path)) {
            header("Location: manage_animals.php?error=3");
            exit();
        }
    }

    if (move_uploaded_file($image_tmp, $image_path)) {
        $stmt = $conn->prepare("INSERT INTO animals (name, filename, sound_filename, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $image_name, $sound_name, $description);
        
        if ($stmt->execute()) {
            header("Location: manage_animals.php?success=1");
        } else {
            header("Location: manage_animals.php?error=1");
        }
    } else {
        header("Location: manage_animals.php?error=2");
    }
}
?>