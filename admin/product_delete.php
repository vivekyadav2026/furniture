<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Optional: Delete physical files
    $stmt = $pdo->prepare("SELECT image_path FROM product_images WHERE product_id = ?");
    $stmt->execute([$id]);
    $images = $stmt->fetchAll();
    
    foreach ($images as $img) {
        if ($img['image_path'] && file_exists('../' . $img['image_path'])) {
            unlink('../' . $img['image_path']);
        }
    }

    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: products.php");
exit();
