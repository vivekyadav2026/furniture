<?php
require_once 'config/db.php';

if (!isset($_GET['slug'])) {
    header("Location: collections.php");
    exit();
}

$slug = $_GET['slug'];
$stmt = $pdo->prepare("SELECT p.*, c.name as category_name, c.slug as category_slug FROM products p JOIN categories c ON p.category_id = c.id WHERE p.slug = ?");
$stmt->execute([$slug]);
$product = $stmt->fetch();

if (!$product) {
    header("Location: collections.php");
    exit();
}

// Fetch images
$stmt = $pdo->prepare("SELECT * FROM product_images WHERE product_id = ? ORDER BY is_primary DESC");
$stmt->execute([$product['id']]);
$images = $stmt->fetchAll();



$page_title = htmlspecialchars($product['name']) . " | FurnishHut";
$page_description = htmlspecialchars($product['description']);
include 'header.php';
?>

  <section class="py-24" style="background:#FDFBF7;">
    <div class="container mx-auto px-4 max-w-6xl">
      
      <!-- Breadcrumb -->
      <div class="mb-8 text-sm text-gray-500 font-sans">
          <a href="collections.php" class="hover:text-luxeGold">Collections</a> &gt; 
          <a href="category.php?slug=<?= htmlspecialchars($product['category_slug']) ?>" class="hover:text-luxeGold"><?= htmlspecialchars($product['category_name']) ?></a> &gt; 
          <span class="text-luxeBlack font-semibold"><?= htmlspecialchars($product['name']) ?></span>
      </div>

      <div class="row g-5">
        
        <!-- Product Images Gallery -->
        <div class="col-12 col-lg-7">
            <?php if (!empty($images)): ?>
                <!-- Main Image -->
                <div class="mb-4">
                    <img id="mainImage" src="<?= htmlspecialchars($images[0]['image_path']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-auto object-cover border border-gray-200" style="border-radius: 8px; max-height: 500px;">
                </div>
                <!-- Thumbnails -->
                <div class="flex gap-4 overflow-x-auto pb-2">
                    <?php foreach ($images as $img): ?>
                        <img src="<?= htmlspecialchars($img['image_path']) ?>" onclick="document.getElementById('mainImage').src=this.src;" class="w-24 h-24 object-cover cursor-pointer border-2 border-transparent hover:border-luxeGold transition-all" style="border-radius: 4px;" alt="Angle">
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div style="background:#eee; height:400px; display:flex; align-items:center; justify-content:center; border-radius: 8px;">No Images Available</div>
            <?php endif; ?>
        </div>

        <!-- Product Details & Enquiry Form -->
        <div class="col-12 col-lg-5">
            <h1 class="text-3xl md:text-4xl font-heading text-luxeBlack mb-4"><?= htmlspecialchars($product['name']) ?></h1>
            <div class="w-12 h-[2px] bg-luxeGold mb-6"></div>
            
            <div class="mb-8 text-gray-600 font-sans leading-relaxed">
                <?= nl2br(htmlspecialchars($product['description'])) ?>
            </div>

            <!-- WhatsApp Action -->
            <div class="bg-white p-6 border border-gray-200 shadow-sm text-center" style="border-radius: 8px;">
                <h3 class="text-xl font-heading text-luxeBlack mb-2">Interested in this masterpiece?</h3>
                <p class="text-gray-500 text-sm mb-6">Skip the forms. Chat directly with our concierge team to discuss customizations, pricing, and delivery.</p>
                
                <?php 
                $whatsapp_number = "919068047086";
                $text = "Hello! I am interested in: *" . $product['name'] . "*\nPlease share more details.";
                $whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode($text);
                ?>
                
                <a href="<?= htmlspecialchars($whatsapp_url) ?>" target="_blank" class="btn-luxury-filled w-full d-flex align-items-center justify-content-center gap-2" style="background-color: #25D366; border-color: #25D366; color: white;">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                    Inquire on WhatsApp
                </a>
            </div>
        </div>

      </div>
    </div>
  </section>

<?php include 'footer.php'; ?>
