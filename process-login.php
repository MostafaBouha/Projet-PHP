<?php
session_start();
require 'projet.php';

if (isset($_POST["submit"])) {
    $usernameemail = mysqli_real_escape_string($conn, $_POST["usernameemail"]);
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$usernameemail' OR email='$usernameemail'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            echo "Connexion réussie";
            exit;
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Utilisateur non trouvé";
    }
}
?>
