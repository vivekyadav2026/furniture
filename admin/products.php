<?php
require_once 'includes/header.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Get total count
$total_stmt = $pdo->query("SELECT COUNT(*) FROM products");
$total_products = $total_stmt->fetchColumn();
$total_pages = ceil($total_products / $limit);

$stmt = $pdo->prepare("
    SELECT p.*, c.name as category_name, 
           (SELECT image_path FROM product_images WHERE product_id = p.id ORDER BY is_primary DESC LIMIT 1) as primary_image
    FROM products p 
    JOIN categories c ON p.category_id = c.id 
    ORDER BY p.created_at DESC
    LIMIT ? OFFSET ?
");
$stmt->bindValue(1, $limit, PDO::PARAM_INT);
$stmt->bindValue(2, $offset, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll();
?>

<div class="page-header">
    <h1>Manage Products</h1>
    <a href="product_add.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New Product</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p): ?>
                <tr>
                    <td>
                        <?php if ($p['primary_image']): ?>
                            <img src="../<?= htmlspecialchars($p['primary_image']) ?>" class="thumbnail" alt="Image">
                        <?php else: ?>
                            <div style="width: 60px; height: 60px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #aaa; font-size: 10px;">None</div>
                        <?php endif; ?>
                    </td>
                    <td style="font-weight: 600; color: var(--dark);"><?= htmlspecialchars($p['name']) ?></td>
                    <td><span class="badge badge-success"><?= htmlspecialchars($p['category_name']) ?></span></td>
                    <td style="text-align: right;">
                        <a href="../product.php?slug=<?= htmlspecialchars($p['slug']) ?>" target="_blank" class="btn btn-light" style="margin-right: 5px;"><i class="fa-regular fa-eye"></i> View</a>
                        <a href="product_edit.php?id=<?= $p['id'] ?>" class="btn btn-primary" style="margin-right: 5px;"><i class="fa-solid fa-pen"></i> Edit</a>
                        <a href="product_delete.php?id=<?= $p['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa-solid fa-trash-can"></i> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 30px;">No products found. Start by adding one.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if ($total_pages > 1): ?>
<div style="margin-top: 20px; display: flex; justify-content: center; gap: 10px;">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>" class="btn btn-light"><i class="fa-solid fa-angle-left"></i> Prev</a>
    <?php endif; ?>
    
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?= $i ?>" class="btn <?= $i === $page ? 'btn-primary' : 'btn-light' ?>"><?= $i ?></a>
    <?php endfor; ?>
    
    <?php if ($page < $total_pages): ?>
        <a href="?page=<?= $page + 1 ?>" class="btn btn-light">Next <i class="fa-solid fa-angle-right"></i></a>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
