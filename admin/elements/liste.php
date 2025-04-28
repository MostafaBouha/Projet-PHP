<?php
require_once '../../admin_check.php';

$search = $_GET['search'] ?? '';
$categorie_id = $_GET['categorie_id'] ?? '';
$page = max(1, $_GET['page'] ?? 1);
$limit = 10;
$offset = ($page - 1) * $limit;

// Requête avec filtres
$query = "SELECT e.*, c.nom as categorie_nom FROM elements e 
          JOIN categories c ON e.categorie_id = c.id";
$countQuery = "SELECT COUNT(*) FROM elements e 
               JOIN categories c ON e.categorie_id = c.id";

$where = [];
$params = [];
$types = "";

if (!empty($search)) {
    $where[] = "(e.titre LIKE ? OR e.description LIKE ? OR e.contenu LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $types .= "sss";
}

if (!empty($categorie_id) && is_numeric($categorie_id)) {
    $where[] = "e.categorie_id = ?";
    $params[] = $categorie_id;
    $types .= "i";
}

if (!empty($where)) {
    $query .= " WHERE " . implode(" AND ", $where);
    $countQuery .= " WHERE " . implode(" AND ", $where);
}

$query .= " ORDER BY e.date_creation DESC LIMIT ? OFFSET ?";
$types .= "ii";
$params[] = $limit;
$params[] = $offset;

// Comptage total
$stmt = $conn->prepare($countQuery);
if (!empty($types)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$total = $stmt->get_result()->fetch_row()[0];
$totalPages = ceil($total / $limit);

// Récupération des catégories pour le filtre
$categories = $conn->query("SELECT id, nom FROM categories ORDER BY nom")->fetch_all(MYSQLI_ASSOC);

// Récupération des éléments
$stmt = $conn->prepare($query);
if (!empty($types)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Éléments</title>
    <link rel="stylesheet" href="../../style/admin.css">
</head>
<body>
    <div class="admin-container">
        <?php include '../admin_sidebar.php'; ?>
        
        <main class="admin-main">
            <h1>Gestion des Éléments</h1>
            
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert success"><?= $_SESSION['message'] ?></div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            
            <div class="admin-actions">
                <a href="ajouter.php" class="btn">Ajouter un élément</a>
                <form method="GET" class="filter-form">
                    <select name="categorie_id">
                        <option value="">Toutes catégories</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $categorie_id ? 'selected' : '' ?>>
                                <?= secureInput($cat['nom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" name="search" placeholder="Rechercher..." value="<?= secureInput($search) ?>">
                    <button type="submit" class="btn">Filtrer</button>
                    <a href="liste.php" class="btn cancel">Réinitialiser</a>
                </form>
            </div>
            
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= secureInput($row['titre']) ?></td>
                        <td><?= secureInput($row['categorie_nom']) ?></td>
                        <td><?= secureInput(substr($row['description'], 0, 30)) . (strlen($row['description']) > 30 ? '...' : '') ?></td>
                        <td><?= date('d/m/Y', strtotime($row['date_creation'])) ?></td>
                        <td class="actions">
                            <a href="modifier.php?id=<?= $row['id'] ?>" class="btn small">Modifier</a>
                            <a href="supprimer.php?id=<?= $row['id'] ?>" class="btn small danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                            <a href="../medias/gestion.php?element_id=<?= $row['id'] ?>" class="btn small">Médias</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            
            <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>&categorie_id=<?= $categorie_id ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>