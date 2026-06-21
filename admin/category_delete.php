<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Optional: Delete physical cover image file if you want
    $stmt = $pdo->prepare("SELECT cover_image FROM categories WHERE id = ?");
    $stmt->execute([$id]);
    $cat = $stmt->fetch();
    
    if ($cat && $cat['cover_image'] && file_exists('../' . $cat['cover_image'])) {
        unlink('../' . $cat['cover_image']);
    }

    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: categories.php");
exit();
