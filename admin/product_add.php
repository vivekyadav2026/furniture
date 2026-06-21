<?php
require_once 'includes/header.php';

// Fetch categories for dropdown
$categories = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll();

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $category_id = $_POST['category_id'];
    $description = trim($_POST['description']);
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name))) . '-' . uniqid();
    
    try {
        $pdo->beginTransaction();
        
        $stmt = $pdo->prepare("INSERT INTO products (category_id, name, slug, description) VALUES (?, ?, ?, ?)");
        $stmt->execute([$category_id, $name, $slug, $description]);
        $product_id = $pdo->lastInsertId();
        
        // Handle Multiple File Uploads
        if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];
            $file_count = count($_FILES['images']['name']);
            
            if (!is_dir('uploads/products')) {
                mkdir('uploads/products', 0777, true);
            }
            
            for ($i = 0; $i < $file_count; $i++) {
                if ($_FILES['images']['error'][$i] == 0) {
                    $filename = $_FILES['images']['name'][$i];
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    
                    if (in_array($ext, $allowed)) {
                        $new_filename = uniqid() . '_' . $i; // extension will be added by helper
                        $upload_path = 'uploads/products/' . $new_filename;
                        
                        // Use our image compression helper
                        require_once 'includes/image_helpers.php';
                        $final_path = compressAndSaveImage($_FILES['images']['tmp_name'][$i], $upload_path);
                        
                        if ($final_path) {
                            $is_primary = ($i == 0) ? 1 : 0; // First image is primary
                            $db_path = 'admin/' . $final_path;
                            $img_stmt = $pdo->prepare("INSERT INTO product_images (product_id, image_path, is_primary) VALUES (?, ?, ?)");
                            $img_stmt->execute([$product_id, $db_path, $is_primary]);
                        }
                    }
                }
            }
        }
        
        $pdo->commit();
        header("Location: products.php");
        exit();
        
    } catch (Exception $e) {
        $pdo->rollBack();
        $error = "Failed to save product: " . $e->getMessage();
    }
}
?>

<div class="page-header">
    <h1>Add New Product</h1>
    <a href="products.php" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
</div>

<div class="card" style="max-width: 800px;">
    <div class="card-body">
        <?php if ($error): ?>
            <div style="background: rgba(241, 65, 108, 0.1); color: var(--danger); padding: 10px; border-radius: 6px; margin-bottom: 20px; font-weight: 500;">
                <i class="fa-solid fa-triangle-exclamation"></i> <?= $error ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Category <span style="color: var(--danger);">*</span></label>
                <select name="category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Product Name <span style="color: var(--danger);">*</span></label>
                <input type="text" name="name" class="form-control" required placeholder="e.g. Maharaja Sofa 7 Seater">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" placeholder="Detailed product description..."></textarea>
            </div>
            
            <div class="form-group">
                <label>Product Images (Select multiple angles) <span style="color: var(--danger);">*</span></label>
                <input type="file" name="images[]" id="multiImageInput" class="form-control" accept="image/*" multiple required>
                <p style="color: var(--text-muted); font-size: 12px; margin-top: 5px;"><i class="fa-solid fa-info-circle"></i> Hold CTRL or Shift to select multiple images. The first image selected will be used as the primary cover photo.</p>
                
                <!-- JS Multiple Image Preview Grid -->
                <div class="preview-container" id="multiImagePreviewContainer"></div>
            </div>
            
            <hr style="border: 0; border-top: 1px dashed var(--border-color); margin: 25px 0;">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save Product</button>
        </form>
    </div>
</div>

<script>
let dt = new DataTransfer();

document.getElementById('multiImageInput').addEventListener('change', function(event) {
    const files = event.target.files;
    
    // Add newly selected files to our DataTransfer object
    for (let i = 0; i < files.length; i++) {
        if (files[i].type.match('image.*')) {
            dt.items.add(files[i]);
        }
    }
    
    // Update the input files
    this.files = dt.files;
    renderPreviews();
});

function renderPreviews() {
    const previewContainer = document.getElementById('multiImagePreviewContainer');
    previewContainer.innerHTML = ''; // Clear previous previews
    
    const files = dt.files;
    if (files.length > 0) {
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const wrapper = document.createElement('div');
                wrapper.style.position = 'relative';
                wrapper.style.display = 'inline-block';
                wrapper.style.marginRight = '10px';
                wrapper.style.marginBottom = '10px';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'preview-image';
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '6px';
                img.style.border = i === 0 ? '2px solid var(--success)' : '1px solid var(--border-color)';
                
                // Primary badge for the first image
                if (i === 0) {
                    const badge = document.createElement('span');
                    badge.innerHTML = 'Primary';
                    badge.style.position = 'absolute';
                    badge.style.top = '5px';
                    badge.style.left = '5px';
                    badge.style.background = 'var(--success)';
                    badge.style.color = 'white';
                    badge.style.fontSize = '9px';
                    badge.style.padding = '2px 6px';
                    badge.style.borderRadius = '4px';
                    badge.style.fontWeight = 'bold';
                    badge.style.textTransform = 'uppercase';
                    wrapper.appendChild(badge);
                }
                
                // Remove button
                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '<i class="fa-solid fa-times"></i>';
                removeBtn.type = 'button';
                removeBtn.className = 'btn btn-danger';
                removeBtn.style.position = 'absolute';
                removeBtn.style.top = '5px';
                removeBtn.style.right = '5px';
                removeBtn.style.padding = '2px 6px';
                removeBtn.style.fontSize = '10px';
                removeBtn.style.borderRadius = '4px';
                
                removeBtn.onclick = function() {
                    removeFile(i);
                };
                
                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                previewContainer.appendChild(wrapper);
            }
            reader.readAsDataURL(file);
        }
    }
}

function removeFile(index) {
    const newDt = new DataTransfer();
    
    for (let i = 0; i < dt.files.length; i++) {
        if (i !== index) {
            newDt.items.add(dt.files[i]);
        }
    }
    
    dt = newDt; // Replace with updated DataTransfer
    document.getElementById('multiImageInput').files = dt.files;
    renderPreviews();
}
</script>

<?php require_once 'includes/footer.php'; ?>
