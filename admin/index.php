<?php
require_once 'includes/header.php';

// Fetch stats
$cat_count = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$prod_count = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$enq_count = $pdo->query("SELECT COUNT(*) FROM enquiries WHERE status = 'new'")->fetchColumn();
?>

<div class="page-header">
    <h1>Dashboard Overview</h1>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
    
    <div class="card stat-card">
        <div class="stat-icon primary">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        <div class="stat-details">
            <h3>Total Categories</h3>
            <div class="stat-number"><?= $cat_count ?></div>
        </div>
    </div>

    <div class="card stat-card">
        <div class="stat-icon success">
            <i class="fa-solid fa-couch"></i>
        </div>
        <div class="stat-details">
            <h3>Total Products</h3>
            <div class="stat-number"><?= $prod_count ?></div>
        </div>
    </div>

    <div class="card stat-card">
        <div class="stat-icon info">
            <i class="fa-solid fa-envelope-open-text"></i>
        </div>
        <div class="stat-details">
            <h3>New Enquiries</h3>
            <div class="stat-number"><?= $enq_count ?></div>
        </div>
    </div>

</div>

<div class="card" style="margin-top: 20px;">
    <div class="card-body" style="padding: 30px; text-align: center;">
        <i class="fa-solid fa-crown" style="font-size: 48px; color: var(--primary); margin-bottom: 20px;"></i>
        <h2 style="margin-bottom: 10px; color: var(--dark);">Welcome to FurnishHut Admin</h2>
        <p style="color: var(--text-muted); max-width: 500px; margin: 0 auto;">Manage your premium furniture collections, upload stunning multiple angle photos, and respond to bespoke design enquiries.</p>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
