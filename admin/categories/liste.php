<?php
require_once __DIR__.'/../bootstrap.php';

// Vérification sécurité
if (!defined('ADMIN_ROOT')) {
    die('Accès non autorisé');
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ligne 2 corrigée - Chemin absolu
require_once __DIR__.'/../../admin_check.php';
require_once '../../admin_check.php';

$search = $_GET['search'] ?? '';
$page = max(1, $_GET['page'] ?? 1);
$limit = 10;
$offset = ($page - 1) * $limit;

// Requête avec recherche
$query = "SELECT * FROM categories";
$countQuery = "SELECT COUNT(*) FROM categories";

if (!empty($search)) {
    $query .= " WHERE nom LIKE ? OR description LIKE ?";
    $countQuery .= " WHERE nom LIKE ? OR description LIKE ?";
    $searchTerm = "%$search%";
}

$query .= " ORDER BY nom LIMIT ? OFFSET ?";

// Comptage total
$stmt = $conn->prepare($countQuery);
if (!empty($search)) {
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
}
$stmt->execute();
$total = $stmt->get_result()->fetch_row()[0];
$totalPages = ceil($total / $limit);

// Récupération des données
$stmt = $conn->prepare($query);
if (!empty($search)) {
    $stmt->bind_param("ssii", $searchTerm, $searchTerm, $limit, $offset);
} else {
    $stmt->bind_param("ii", $limit, $offset);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Catégories</title>
    <link rel="stylesheet" href="../../style/admin.css">
</head>
<body>
    <div class="admin-container">
        <?php include '../admin_sidebar.php'; ?>
        
        <main class="admin-main">
            <h1>Gestion des Catégories</h1>
            
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert success"><?= $_SESSION['message'] ?></div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            
            <div class="admin-actions">
                <a href="ajouter.php" class="btn">Ajouter une catégorie</a>
                <form method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Rechercher..." value="<?= secureInput($search) ?>">
                    <button type="submit" class="btn">Rechercher</button>
                </form>
            </div>
            
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= secureInput($row['nom']) ?></td>
                        <td><?= secureInput(substr($row['description'], 0, 50)) . (strlen($row['description']) > 50 ? '...' : '') ?></td>
                        <td><?= date('d/m/Y', strtotime($row['date_creation'])) ?></td>
                        <td class="actions">
                            <a href="modifier.php?id=<?= $row['id'] ?>" class="btn small">Modifier</a>
                            <a href="supprimer.php?id=<?= $row['id'] ?>" class="btn small danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            
            <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>