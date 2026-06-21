<?php
require_once 'includes/header.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    
    // Handle File Upload
    $cover_image = null;
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $filename = $_FILES['cover_image']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $new_filename = uniqid() . '.' . $ext;
            $upload_path = 'uploads/categories/' . $new_filename;
            
            if (!is_dir('uploads/categories')) {
                mkdir('uploads/categories', 0777, true);
            }
            
            require_once 'includes/image_helpers.php';
            $final_path = compressAndSaveImage($_FILES['cover_image']['tmp_name'], $upload_path);
            
            if ($final_path) {
                $cover_image = 'admin/' . $final_path;
            } else {
                $error = "Failed to upload or compress image.";
            }
        } else {
            $error = "Invalid file type. Only JPG, PNG, WEBP allowed.";
        }
    }

    if (!$error) {
        try {
            $stmt = $pdo->prepare("INSERT INTO categories (name, slug, cover_image) VALUES (?, ?, ?)");
            $stmt->execute([$name, $slug, $cover_image]);
            header("Location: categories.php");
            exit();
        } catch (PDOException $e) {
            $error = "Failed to save to database. Slug might already exist.";
        }
    }
}
?>

<div class="page-header">
    <h1>Add New Category</h1>
    <a href="categories.php" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
</div>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <?php if ($error): ?>
            <div style="background: rgba(241, 65, 108, 0.1); color: var(--danger); padding: 10px; border-radius: 6px; margin-bottom: 20px; font-weight: 500;">
                <i class="fa-solid fa-triangle-exclamation"></i> <?= $error ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Category Name <span style="color: var(--danger);">*</span></label>
                <input type="text" name="name" class="form-control" required placeholder="e.g. Royal Beds">
            </div>
            <div class="form-group">
                <label>Cover Photo <span style="color: var(--danger);">*</span></label>
                <input type="file" name="cover_image" id="coverImageInput" class="form-control" accept="image/*" required>
                
                <!-- JS Image Preview -->
                <div class="preview-container" id="imagePreviewContainer" style="display: none;">
                    <img id="imagePreview" class="preview-image" src="" alt="Preview">
                </div>
            </div>
            
            <hr style="border: 0; border-top: 1px dashed var(--border-color); margin: 25px 0;">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save Category</button>
        </form>
    </div>
</div>

<script>
document.getElementById('coverImageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('imagePreview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'flex';
        }
        reader.readAsDataURL(file);
    } else {
        previewContainer.style.display = 'none';
        previewImage.src = '';
    }
});
</script>

<?php require_once 'includes/footer.php'; ?>
