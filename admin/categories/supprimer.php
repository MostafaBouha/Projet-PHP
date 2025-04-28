<?php
require_once '../../admin_check.php';

if (!isset($_GET['id'])) {
    header('Location: liste.php');
    exit;
}

$id = intval($_GET['id']);

// Vérifier s'il y a des éléments associés
$stmt = $conn->prepare("SELECT COUNT(*) FROM elements WHERE categorie_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$count = $stmt->get_result()->fetch_row()[0];

if ($count > 0) {
    $_SESSION['message'] = "Impossible de supprimer: cette catégorie contient des éléments";
    header('Location: liste.php');
    exit;
}

// Suppression
$stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
if ($stmt->execute([$id])) {
    $_SESSION['message'] = "Catégorie supprimée avec succès!";
} else {
    $_SESSION['message'] = "Erreur lors de la suppression";
}

header('Location: liste.php');
exit;
?>