<?php
// config.php à la racine du projet
define('BASE_URL', 'http://localhost/projet');
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); 
define('DB_PASS', '');
define('DB_NAME', 'educatif_enfant');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getUploadPath($type) {
    return $_SERVER['DOCUMENT_ROOT'].'/projet/uploads/'.$type.'/';
}
?>