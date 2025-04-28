<?php
// admin/bootstrap.php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/admin_check.php';

// Initialisation session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Constantes utiles
define('ADMIN_ROOT', __DIR__);
define('BASE_URL', '/projet');