<?php
require_once '../config/db.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['product_id'])) {
    $id = $_GET['id'];
    $product_id = $_GET['product_id'];

    // Ensure it's not the primary image
    $stmt = $pdo->prepare("SELECT * FROM product_images WHERE id = ?");
    $stmt->execute([$id]);
    $image = $stmt->fetch();

    if ($image && !$image['is_primary']) {
        // Delete from database
        $stmt = $pdo->prepare("DELETE FROM product_images WHERE id = ?");
        $stmt->execute([$id]);

        // Delete from file system if it exists (only if it's in the uploads directory)
        if (strpos($image['image_path'], 'admin/uploads/') !== false) {
            // Because we're in the admin folder, the path relative to admin is just 'uploads/...'
            // The DB stores 'admin/uploads/products/...'
            $filepath = str_replace('admin/', '', $image['image_path']);
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
    }
}

header("Location: product_edit.php?id=" . (isset($_GET['product_id']) ? $_GET['product_id'] : ''));
exit();
?>
