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

    try {
        $pdo->beginTransaction();
        
        // Reset all images for this product to not primary
        $stmt = $pdo->prepare("UPDATE product_images SET is_primary = 0 WHERE product_id = ?");
        $stmt->execute([$product_id]);
        
        // Set the selected image to primary
        $stmt = $pdo->prepare("UPDATE product_images SET is_primary = 1 WHERE id = ?");
        $stmt->execute([$id]);
        
        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
    }
}

header("Location: product_edit.php?id=" . (isset($_GET['product_id']) ? $_GET['product_id'] : ''));
exit();
?>
