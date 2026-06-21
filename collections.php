<?php
require_once 'config/db.php';
$page_title = "All Collections | FurnishHut Royal Furniture Categories";
$page_description = "Explore all FurnishHut collections — handcrafted beds, sofas, dining sets, chairs, mandirs, swings, mirrors, doors and more. Bespoke royal furniture for elite homes.";
include 'header.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 12; // Categories per page
$offset = ($page - 1) * $limit;

$total_stmt = $pdo->query("SELECT COUNT(*) FROM categories");
$total_categories = $total_stmt->fetchColumn();
$total_pages = ceil($total_categories / $limit);

// Fetch dynamic categories
$stmt = $pdo->prepare("SELECT * FROM categories ORDER BY name ASC LIMIT ? OFFSET ?");
$stmt->bindValue(1, $limit, PDO::PARAM_INT);
$stmt->bindValue(2, $offset, PDO::PARAM_INT);
$stmt->execute();
$categories = $stmt->fetchAll();
?>

  <!-- Page Header Banner -->
  <section class="relative py-24 overflow-hidden" style="background:#2C2420;">
    <div class="absolute inset-0 opacity-20">
      <img src="assets/img/Sofa_Set_Design/Best-Selling-Wooden-Royal-Sofa-Set.webp" class="w-full h-full object-cover" alt="">
    </div>
    <div class="container relative z-10 text-center px-4">
      <span class="text-[#C5A880] text-[10px] font-semibold tracking-[0.45em] uppercase block mb-4">Explore Our Craftsmanship</span>
      <h1 class="font-heading text-4xl md:text-6xl text-white mb-4">All Collections</h1>
      <div class="w-16 h-[1px] bg-[#C5A880] mx-auto mb-4"></div>
      <p class="text-[#C5A880]/80 text-sm max-w-xl mx-auto tracking-wide font-light">Mastercraft Categories &middot; 100% Handmade &middot; Palace-Grade Materials</p>
    </div>
  </section>

  <!-- ALL CATEGORIES SECTION -->
  <section class="py-24" style="background:#FDFBF7;">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="row g-5">
        <?php if(empty($categories)): ?>
            <p class="text-center w-full text-gray-500">Categories will be added soon.</p>
        <?php else: ?>
            <?php foreach($categories as $cat): ?>
                <div class="col-6 col-md-6 col-lg-4">
                  <a href="category.php?slug=<?= $cat['slug'] ?>" class="card-luxury block cursor-pointer" style="text-decoration:none;">
                    <div class="card-luxury-img-wrapper">
                      <?php if ($cat['cover_image']): ?>
                          <img src="<?= htmlspecialchars($cat['cover_image']) ?>" alt="<?= htmlspecialchars($cat['name']) ?>" class="card-luxury-img" style="height:350px;">
                      <?php else: ?>
                          <div style="background:#eee; height:350px; display:flex; align-items:center; justify-content:center;">No Cover</div>
                      <?php endif; ?>
                    </div>
                    <div class="p-4 flex justify-between items-center bg-white border-t border-gray-100">
                      <h3 class="text-base font-heading text-luxeBlack font-bold m-0"><?= htmlspecialchars($cat['name']) ?></h3>
                      <span class="text-luxeGold text-[10px] tracking-widest uppercase font-semibold">Explore &rarr;</span>
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
              <a href="?page=<?= $page - 1 ?>" class="border border-[#C5A880] text-[#C5A880] px-4 py-2 text-xs uppercase tracking-widest hover:bg-[#C5A880] hover:text-white transition-colors">&larr; Prev</a>
          <?php endif; ?>
          
          <div class="flex gap-2">
              <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                  <a href="?page=<?= $i ?>" class="<?= $i === $page ? 'bg-[#C5A880] text-white' : 'border border-gray-200 text-gray-500 hover:border-[#C5A880] hover:text-[#C5A880]' ?> px-4 py-2 text-xs transition-colors"><?= $i ?></a>
              <?php endfor; ?>
          </div>
          
          <?php if ($page < $total_pages): ?>
              <a href="?page=<?= $page + 1 ?>" class="border border-[#C5A880] text-[#C5A880] px-4 py-2 text-xs uppercase tracking-widest hover:bg-[#C5A880] hover:text-white transition-colors">Next &rarr;</a>
          <?php endif; ?>
      </div>
      <?php endif; ?>
      
    </div>
  </section>

  <!-- CTA Banner -->
  <section style="background:#2C2420; padding:80px 1rem; text-align:center;">
    <span style="color:#C5A880; font-size:10px; letter-spacing:0.4em; text-transform:uppercase; font-family:'Montserrat',sans-serif; display:block; margin-bottom:1rem;">Can't find what you need?</span>
    <h2 class="font-heading text-white text-3xl md:text-4xl mb-4">We Craft Anything. Bespoke.</h2>
    <div class="w-12 h-[1px] bg-[#C5A880] mx-auto mb-6"></div>
    <p style="color:#C5A880; opacity:0.75; font-size:0.875rem; max-width:500px; margin:0 auto 2rem; line-height:1.8;">Share your idea, reference image or room plan — our master artisans will craft it exactly as you envision, in solid teak with 24K gold gilding.</p>
    <button class="btn-luxury-filled trigger-inquiry">Request Custom Design</button>
  </section>

<?php include 'footer.php'; ?>
