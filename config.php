<?php
// Utilisez les identifiants par défaut de XAMPP
$conn = new mysqli("localhost", "root", "", "educatif_enfant");

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>