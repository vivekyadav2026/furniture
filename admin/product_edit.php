<?php
require_once 'includes/header.php';

if (!isset($_GET['id'])) {
    header("Location: products.php");
    exit();
}

$product_id = $_GET['id'];
$error = '';
$success = '';

// Fetch categories for dropdown
$categories = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $category_id = $_POST['category_id'];
    $description = trim($_POST['description']);
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name))) . '-' . uniqid();
    
    try {
        $pdo->beginTransaction();
        
        // Update product details
        $stmt = $pdo->prepare("UPDATE products SET category_id = ?, name = ?, slug = ?, description = ? WHERE id = ?");
        $stmt->execute([$category_id, $name, $slug, $description, $product_id]);
        
        // Handle new multiple file uploads
        if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];
            $file_count = count($_FILES['images']['name']);
            
            if (!is_dir('uploads/products')) {
                mkdir('uploads/products', 0777, true);
            }
            
            // Check if product already has a primary image
            $stmt_check = $pdo->prepare("SELECT COUNT(*) FROM product_images WHERE product_id = ? AND is_primary = 1");
            $stmt_check->execute([$product_id]);
            $has_primary = ($stmt_check->fetchColumn() > 0);
            
            for ($i = 0; $i < $file_count; $i++) {
                if ($_FILES['images']['error'][$i] == 0) {
                    $filename = $_FILES['images']['name'][$i];
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    
                    if (in_array($ext, $allowed)) {
                        $new_filename = uniqid() . '_' . $i; // extension added by helper
                        $upload_path = 'uploads/products/' . $new_filename;
                        
                        // Use our image compression helper
                        require_once 'includes/image_helpers.php';
                        $final_path = compressAndSaveImage($_FILES['images']['tmp_name'][$i], $upload_path);
                        
                        if ($final_path) {
                            // If no primary exists, make the very first successfully uploaded image primary
                            $is_primary = (!$has_primary) ? 1 : 0;
                            $has_primary = true; // Set to true after first one is marked
                            
                            $db_path = 'admin/' . $final_path;
                            $img_stmt = $pdo->prepare("INSERT INTO product_images (product_id, image_path, is_primary) VALUES (?, ?, ?)");
                            $img_stmt->execute([$product_id, $db_path, $is_primary]);
                        }
                    }
                }
            }
        }
        
        $pdo->commit();
        $success = "Product updated successfully!";
        
    } catch (Exception $e) {
        $pdo->rollBack();
        $error = "Failed to update product: " . $e->getMessage();
    }
}

// Fetch current product details
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch();

if (!$product) {
    header("Location: products.php");
    exit();
}

// Fetch current product images
$stmt = $pdo->prepare("SELECT * FROM product_images WHERE product_id = ? ORDER BY is_primary DESC, id ASC");
$stmt->execute([$product_id]);
$images = $stmt->fetchAll();

?>

<div class="page-header">
    <h1>Edit Product: <?= htmlspecialchars($product['name']) ?></h1>
    <a href="products.php" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
</div>

<div class="card" style="max-width: 900px;">
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
        
        <!-- Current Image Gallery Management -->
        <h3 style="font-size: 16px; margin-bottom: 15px; color: var(--dark); font-weight: 600;"><i class="fa-regular fa-images"></i> Manage Product Images</h3>
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid var(--border-color); margin-bottom: 30px;">
            <?php if (!empty($images)): ?>
                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <?php foreach ($images as $img): ?>
                        <div style="position: relative; width: 120px; height: 120px; border-radius: 8px; overflow: hidden; border: 2px solid <?= $img['is_primary'] ? 'var(--success)' : '#e4e6ef' ?>;">
                            <img src="../<?= htmlspecialchars($img['image_path']) ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="Product Image">
                            
                            <?php if ($img['is_primary']): ?>
                                <div style="position: absolute; top: 5px; left: 5px; background: var(--success); color: white; font-size: 9px; padding: 2px 6px; border-radius: 4px; font-weight: bold; text-transform: uppercase;">Primary</div>
                            <?php else: ?>
                                <a href="image_delete.php?id=<?= $img['id'] ?>&product_id=<?= $product_id ?>" class="btn btn-danger" style="position: absolute; top: 5px; right: 5px; padding: 4px 8px; font-size: 10px;" onclick="return confirm('Delete this image?');" title="Delete Image"><i class="fa-solid fa-times"></i></a>
                                <a href="image_set_primary.php?id=<?= $img['id'] ?>&product_id=<?= $product_id ?>" class="btn btn-light" style="position: absolute; bottom: 5px; left: 50%; transform: translateX(-50%); padding: 2px 8px; font-size: 10px; border-radius: 4px; white-space: nowrap; border: 1px solid #ccc; font-weight: 500;" title="Set as Cover Photo">Make Primary</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p style="font-size: 12px; color: var(--text-muted); margin-top: 10px; margin-bottom: 0;"><i class="fa-solid fa-info-circle"></i> The primary image cannot be deleted. If you want to delete it, set another image as primary first.</p>
            <?php else: ?>
                <p style="color: var(--text-muted); margin: 0; text-align: center;">No images uploaded for this product.</p>
            <?php endif; ?>
        </div>
        
        <hr style="border: 0; border-top: 1px dashed var(--border-color); margin: 25px 0;">

        <!-- Product Details Form -->
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Category <span style="color: var(--danger);">*</span></label>
                <select name="category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $product['category_id'] ? 'selected' : '' ?>><?= htmlspecialchars($cat['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Product Name <span style="color: var(--danger);">*</span></label>
                <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($product['name']) ?>">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5"><?= htmlspecialchars($product['description']) ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Upload More Images (Optional)</label>
                <input type="file" name="images[]" id="multiImageInput" class="form-control" accept="image/*" multiple>
                <p style="color: var(--text-muted); font-size: 12px; margin-top: 5px;"><i class="fa-solid fa-info-circle"></i> Hold CTRL or Shift to select multiple images to add to the gallery.</p>
                
                <!-- JS Multiple Image Preview Grid -->
                <div class="preview-container" id="multiImagePreviewContainer"></div>
            </div>
            
            <hr style="border: 0; border-top: 1px dashed var(--border-color); margin: 25px 0;">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save Changes</button>
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
                img.style.border = '1px solid var(--border-color)';
                
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
