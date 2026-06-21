<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require_once '../config/db.php';
$current_page = basename($_SERVER['PHP_SELF']);

// Fetch admin user
$stmt = $pdo->prepare("SELECT * FROM admin_users WHERE id = ?");
$stmt->execute([$_SESSION['admin_id']]);
$admin_user = $stmt->fetch();
$admin_name = $admin_user ? $admin_user['username'] : 'Admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Admin Panel - FurnishHut</title>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="adminSidebar">
    <div class="sidebar-header">
        <h2><i class="fa-solid fa-crown" style="color: var(--primary); margin-right: 10px;"></i>Furnish<span>Hut</span></h2>
        <i class="fa-solid fa-times close-sidebar" id="closeSidebarBtn" style="display: none; cursor: pointer;"></i>
    </div>
    <div class="sidebar-menu">
        <a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">
            <i class="fa-solid fa-grid-2"></i> Dashboard
        </a>
        <a href="categories.php" class="<?= in_array($current_page, ['categories.php', 'category_add.php']) ? 'active' : '' ?>">
            <i class="fa-solid fa-layer-group"></i> Categories
        </a>
        <a href="products.php" class="<?= in_array($current_page, ['products.php', 'product_add.php']) ? 'active' : '' ?>">
            <i class="fa-solid fa-couch"></i> Products & Angles
        </a>
        <a href="enquiries.php" class="<?= in_array($current_page, ['enquiries.php', 'enquiry_view.php']) ? 'active' : '' ?>">
            <i class="fa-solid fa-envelope-open-text"></i> Enquiries
        </a>
        <a href="profile.php" class="<?= $current_page == 'profile.php' ? 'active' : '' ?>">
            <i class="fa-solid fa-user-pen"></i> Profile
        </a>
    </div>
</div>

<!-- Top Navbar -->
<div class="top-navbar">
    <div class="hamburger-menu" id="hamburgerMenu" style="display: none; cursor: pointer; font-size: 24px; color: var(--text-main);">
        <i class="fa-solid fa-bars"></i>
    </div>
    <div class="user-profile">
        <div class="user-avatar"><?= strtoupper(substr($admin_name, 0, 1)) ?></div>
        <span><?= htmlspecialchars($admin_name) ?></span>
        <a href="logout.php" style="margin-left: 20px; color: var(--danger); font-size: 18px;" title="Logout"><i class="fa-solid fa-power-off"></i></a>
    </div>
</div>

<div class="main-content">
