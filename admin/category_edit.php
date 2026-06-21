<?php
require_once 'includes/header.php';

if (!isset($_GET['id'])) {
    header("Location: categories.php");
    exit();
}

$id = $_GET['id'];
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    
    // Check for duplicate slug
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE slug = ? AND id != ?");
    $stmt->execute([$slug, $id]);
    
    if ($stmt->fetchColumn() > 0) {
        $slug = $slug . '-' . uniqid();
    }
    
    $cover_image = null;
    $update_image_sql = "";
    $params = [$name, $slug];
    
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $filename = $_FILES['cover_image']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            if (!is_dir('uploads/categories')) {
                mkdir('uploads/categories', 0777, true);
            }
            $new_filename = uniqid(); // extension added by helper
            $upload_path = 'uploads/categories/' . $new_filename;
            
            require_once 'includes/image_helpers.php';
            $final_path = compressAndSaveImage($_FILES['cover_image']['tmp_name'], $upload_path);
            
            if ($final_path) {
                $cover_image = 'admin/' . $final_path;
                $update_image_sql = ", cover_image = ?";
                $params[] = $cover_image;
            }
        }
    }
    
    $params[] = $id;
    
    try {
        $stmt = $pdo->prepare("UPDATE categories SET name = ?, slug = ? $update_image_sql WHERE id = ?");
        $stmt->execute($params);
        $success = "Category updated successfully!";
    } catch (Exception $e) {
        $error = "Failed to update category: " . $e->getMessage();
    }
}

// Fetch current category
$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$id]);
$cat = $stmt->fetch();

if (!$cat) {
    header("Location: categories.php");
    exit();
}
?>

<div class="page-header">
    <h1>Edit Category: <?= htmlspecialchars($cat['name']) ?></h1>
    <a href="categories.php" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
</div>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <?php if ($error): ?>
            <div style="background: rgba(241, 65, 108, 0.1); color: var(--danger); padding: 10px; border-radius: 6px; margin-bottom: 20px; font-weight: 500;">
                <i class="fa-solid fa-triangle-exclamation"></i> <?= $error ?>
            </div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div style="background: rgba(80, 205, 137, 0.1); color: var(--success); padding: 10px; border-radius: 6px; margin-bottom: 20px; font-weight: 500;">
                <i class="fa-solid fa-check-circle"></i> <?= $success ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Category Name <span style="color: var(--danger);">*</span></label>
                <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($cat['name']) ?>">
            </div>
            
            <div class="form-group">
                <label>Current Cover Photo</label><br>
                <?php if ($cat['cover_image']): ?>
                    <img src="../<?= htmlspecialchars($cat['cover_image']) ?>" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border-color); margin-bottom: 10px;">
                <?php else: ?>
                    <div style="width: 150px; height: 150px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #aaa; margin-bottom: 10px;">No Image</div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Replace Cover Photo (Optional)</label>
                <input type="file" name="cover_image" id="categoryImageInput" class="form-control" accept="image/*">
                
                <div id="imagePreviewContainer" style="margin-top: 15px; display: none;">
                    <p style="font-size: 12px; color: var(--text-muted); margin-bottom: 5px;">New Image Preview:</p>
                    <img id="imagePreview" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border-color);">
                </div>
            </div>
            
            <hr style="border: 0; border-top: 1px dashed var(--border-color); margin: 25px 0;">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save Changes</button>
        </form>
    </div>
</div>

<script>
document.getElementById('categoryImageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreviewContainer').style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        document.getElementById('imagePreviewContainer').style.display = 'none';
    }
});
</script>

<?php require_once 'includes/footer.php'; ?>
