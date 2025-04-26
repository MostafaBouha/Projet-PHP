<?php
session_start();
require 'projet.php';

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Vérifier si l'utilisateur existe déjà
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username or Email already exists');</script>";
    } else {
        // Hash du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Insérer dans la base
        $insert = mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')");
        if ($insert) {
            echo "<script>alert('Registration successful');</script>";
            // Redirection ou autre action
        } else {
            echo "<script>alert('Error during registration');</script>";
        }
    }
}
?>