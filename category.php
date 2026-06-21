<?php
require_once 'config/db.php';

if (!isset($_GET['slug'])) {
    header("Location: collections.php");
    exit();
}

$slug = $_GET['slug'];
$stmt = $pdo->prepare("SELECT * FROM categories WHERE slug = ?");
$stmt->execute([$slug]);
$category = $stmt->fetch();

if (!$category) {
    header("Location: collections.php");
    exit();
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 12; // Products per page
$offset = ($page - 1) * $limit;

$total_stmt = $pdo->prepare("SELECT COUNT(*) FROM products WHERE category_id = ?");
$total_stmt->execute([$category['id']]);
$total_products = $total_stmt->fetchColumn();
$total_pages = ceil($total_products / $limit);

// Fetch products for this category
$stmt = $pdo->prepare("
    SELECT p.*, 
           (SELECT image_path FROM product_images WHERE product_id = p.id ORDER BY is_primary DESC LIMIT 1) as primary_image
    FROM products p 
    WHERE p.category_id = ? 
    ORDER BY p.created_at DESC
    LIMIT ? OFFSET ?
");
$stmt->bindValue(1, $category['id'], PDO::PARAM_INT);
$stmt->bindValue(2, $limit, PDO::PARAM_INT);
$stmt->bindValue(3, $offset, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll();

$page_title = htmlspecialchars($category['name']) . " | FurnishHut";
$page_description = "Explore our " . htmlspecialchars($category['name']) . " collection.";
include 'header.php';
?>

  <!-- Banner Header -->
  <section class="relative py-24 bg-luxeCream overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0 opacity-40 bg-black">
      <?php if ($category['cover_image']): ?>
          <img src="<?= htmlspecialchars($category['cover_image']) ?>" alt="<?= htmlspecialchars($category['name']) ?>" class="w-full h-full object-cover">
      <?php else: ?>
          <div style="background: #2C2420; width: 100%; height: 100%;"></div>
      <?php endif; ?>
    </div>
    <div class="container relative z-10 text-center px-4 max-w-3xl">
      <div class="glass-panel py-6 px-8 inline-block border border-[rgba(197,168,128,0.35)] shadow-lg" style="background: rgba(255,255,255,0.85);">
        <span class="text-luxeGold text-xs font-semibold tracking-[0.4em] uppercase block mb-2">EXCLUSIVE COLLECTION</span>
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-luxeBlack tracking-wide m-0"><?= htmlspecialchars($category['name']) ?></h1>
      </div>
    </div>
  </section>

  <!-- Product Catalog -->
  <section class="py-24 bg-luxeCream">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="row g-5">
        <?php if (empty($products)): ?>
            <p class="text-center w-full text-gray-500">More luxury designs coming soon.</p>
        <?php else: ?>
            <?php foreach ($products as $p): ?>
                <div class="col-6 col-md-6 col-lg-4 gsap-reveal">
                  <a href="product.php?slug=<?= $p['slug'] ?>" class="card-luxury block cursor-pointer" style="text-decoration:none;">
                    <div class="card-luxury-img-wrapper">
                      <?php if ($p['primary_image']): ?>
                          <img src="<?= htmlspecialchars($p['primary_image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="card-luxury-img" style="height:350px;">
                      <?php else: ?>
                          <div style="background:#eee; height:350px; display:flex; align-items:center; justify-content:center;">No Image</div>
                      <?php endif; ?>
                    </div>
                    <div class="p-6 bg-white">
                      <span class="text-luxeGold text-xs uppercase tracking-widest block mb-2">Exclusive Design</span>
                      <h3 class="text-xl font-heading text-luxeBlack mb-3" style="min-height: 56px;"><?= htmlspecialchars($p['name']) ?></h3>
                      <p class="text-xs text-gray-500 leading-relaxed mb-4"><?= htmlspecialchars(substr($p['description'], 0, 80)) ?>...</p>
                      <button class="btn-luxury w-full" style="pointer-events: none;">View Details & Photos</button>
                    </div>
                  </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
      </div>
      
      <!-- Pagination Controls -->
      <?php if ($total_pages > 1): ?>
      <div class="mt-16 flex justify-center items-center gap-4">
          <?php if ($page > 1): ?>
              <a href="?page=<?= $page - 1 ?>&slug=<?= urlencode($slug) ?>" class="border border-[#C5A880] text-[#C5A880] px-4 py-2 text-xs uppercase tracking-widest hover:bg-[#C5A880] hover:text-white transition-colors">&larr; Prev</a>
          <?php endif; ?>
          
          <div class="flex gap-2">
              <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                  <a href="?page=<?= $i ?>&slug=<?= urlencode($slug) ?>" class="<?= $i === $page ? 'bg-[#C5A880] text-white' : 'border border-gray-200 text-gray-500 hover:border-[#C5A880] hover:text-[#C5A880]' ?> px-4 py-2 text-xs transition-colors"><?= $i ?></a>
              <?php endfor; ?>
          </div>
          
          <?php if ($page < $total_pages): ?>
              <a href="?page=<?= $page + 1 ?>&slug=<?= urlencode($slug) ?>" class="border border-[#C5A880] text-[#C5A880] px-4 py-2 text-xs uppercase tracking-widest hover:bg-[#C5A880] hover:text-white transition-colors">Next &rarr;</a>
          <?php endif; ?>
      </div>
      <?php endif; ?>
      
    </div>
  </section>

<?php include 'footer.php'; ?>
