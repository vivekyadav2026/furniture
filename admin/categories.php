<?php
require_once 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM categories ORDER BY created_at DESC");
$categories = $stmt->fetchAll();
?>

<div class="page-header">
    <h1>Manage Categories</h1>
    <a href="category_add.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New Category</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Cover Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $cat): ?>
                <tr>
                    <td>
                        <?php if ($cat['cover_image']): ?>
                            <img src="../<?= htmlspecialchars($cat['cover_image']) ?>" class="thumbnail" alt="Cover">
                        <?php else: ?>
                            <div style="width: 60px; height: 60px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #aaa; font-size: 10px;">None</div>
                        <?php endif; ?>
                    </td>
                    <td style="font-weight: 600; color: var(--dark);"><?= htmlspecialchars($cat['name']) ?></td>
                    <td style="color: var(--text-muted);"><?= htmlspecialchars($cat['slug']) ?></td>
                    <td style="text-align: right;">
                        <a href="../category.php?slug=<?= htmlspecialchars($cat['slug']) ?>" target="_blank" class="btn btn-light" style="margin-right: 5px;"><i class="fa-regular fa-eye"></i> View</a>
                        <a href="category_edit.php?id=<?= $cat['id'] ?>" class="btn btn-primary" style="margin-right: 5px;"><i class="fa-solid fa-pen"></i> Edit</a>
                        <a href="category_delete.php?id=<?= $cat['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure? This will delete all products inside this category as well.');"><i class="fa-solid fa-trash-can"></i> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($categories)): ?>
                <tr>
                    <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 30px;">No categories found. Start by adding one.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
