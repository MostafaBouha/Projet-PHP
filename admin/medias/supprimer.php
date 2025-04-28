<?php
require_once '../../admin_check.php';

if (!isset($_GET['id']) || !isset($_GET['element_id'])) {
    header('Location: ../elements/liste.php');
    exit;
}

$media_id = intval($_GET['id']);
$element_id = intval($_GET['element_id']);

// Récupérer le média
$stmt = $conn->prepare("SELECT chemin FROM medias WHERE id = ? AND element_id = ?");
$stmt->bind_param("ii", $media_id, $element_id);
$stmt->execute();
$result = $stmt->get_result();
$media = $result->fetch_assoc();

if (!$media) {
    header('Location: ../elements/liste.php');
    exit;
}

// Supprimer le fichier
if (file_exists('../../' . $media['chemin'])) {
    unlink('../../' . $media['chemin']);
}

// Supprimer de la base
$stmt = $conn->prepare("DELETE FROM medias WHERE id = ?");
if ($stmt->execute([$media_id])) {
    $_SESSION['message'] = "Média supprimé avec succès!";
} else {
    $_SESSION['message'] = "Erreur lors de la suppression du média";
}

header("Location: gestion.php?element_id=$element_id");
exit;
?>