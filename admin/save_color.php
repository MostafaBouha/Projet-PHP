<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données
    $color_name = $conn->real_escape_string($_POST['color_name']);
    $hex_code = $conn->real_escape_string($_POST['hex_code']);
    $description = $conn->real_escape_string($_POST['description']);

    // Gestion du fichier image
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = "../uploads/colors/" . basename($image_name);

    // Gestion du fichier son
    $sound_name = '';
    if (!empty($_FILES['sound']['name'])) {
        $sound_name = $_FILES['sound']['name'];
        $sound_tmp = $_FILES['sound']['tmp_name'];
        $sound_path = "../uploads/colors/sounds/" . basename($sound_name);
        if (!move_uploaded_file($sound_tmp, $sound_path)) {
            header("Location: manage_colors.php?error=3");
            exit();
        }
    }

    if (move_uploaded_file($image_tmp, $image_path)) {
        $stmt = $conn->prepare("INSERT INTO colors (color_name, hex_code, filename, sound_filename, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $color_name, $hex_code, $image_name, $sound_name, $description);
        
        if ($stmt->execute()) {
            header("Location: manage_colors.php?success=1");
        } else {
            header("Location: manage_colors.php?error=1");
        }
    } else {
        header("Location: manage_colors.php?error=2");
    }
}
?>