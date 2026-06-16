<?php
$page_title = "Guruji Chairs | FurnishHut Luxury Furniture";
$page_description = "Discover FurnishHut's luxury bedroom collection. Solid wood carved canopy beds, gilded frames, and custom velvet headboards for elite chambers.";
include 'header.php';
?>

  


  <!-- Banner Header -->
  <section class="relative py-24 bg-luxeCream overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
      <img src="assets/img/gurujichair/Antique-Gold-Guruji-Chair-Singhasan-YT-641.webp" alt="Royal Bedroom Collection Header" class="w-full h-full object-cover ">
      
    </div>
    <div class="container relative z-10 text-center px-4 max-w-3xl">
      <div class="glass-panel py-6 px-8 inline-block border border-[rgba(197,168,128,0.35)] shadow-lg">
        <span class="text-luxeGold text-xs font-semibold tracking-[0.4em] uppercase block mb-2">Divine Seating</span>
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-luxeBlack tracking-wide m-0">Guruji Chairs</h1>
      </div>
    </div>
  </section>

  <!-- Product Catalog -->
  <section class="py-24 bg-luxeCream">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="row g-5">
<?php
$folder_path = "assets/img/gurujichair/";
$images = [];
if (is_dir($folder_path)) {
    foreach (glob($folder_path . "*.*") as $file) {
        if (preg_match('/\.(jpg|jpeg|png|webp)$/i', $file)) {
            $images[] = $file;
        }
    }
}

if (!empty($images)) {
    // Limit to max 12 images
    $images = array_slice($images, 0, 12);
    foreach ($images as $img) {
        $filename = basename($img);
        $name_no_ext = pathinfo($filename, PATHINFO_FILENAME);
        $display_title = ucwords(str_replace(['-', '_'], ' ', $name_no_ext));
        if (strlen($display_title) > 40) {
            $display_title = substr($display_title, 0, 40) . '...';
        }
        
        echo '<!-- Dynamic Product Card -->';
        echo '<div class="col-lg-4 col-md-6 gsap-reveal">';
        echo '  <div class="card-luxury">';
        echo '    <div class="card-luxury-img-wrapper">';
        echo '      <img src="' . htmlspecialchars($img) . '" alt="' . htmlspecialchars($display_title) . '" class="card-luxury-img">';
        echo '    </div>';
        echo '    <div class="p-6">';
        echo '      <span class="text-luxeGold text-xs uppercase tracking-widest block mb-2">Exclusive Design</span>';
        echo '      <h3 class="text-xl font-heading text-luxeBlack mb-3" style="min-height: 56px;">' . htmlspecialchars($display_title) . '</h3>';
        echo '      <p class="text-xs text-gray-500 leading-relaxed mb-4">Handcrafted bespoke furniture featuring exquisite detailing and premium finishes.</p>';
        echo '      <ul class="text-[10px] uppercase tracking-wider text-zinc-500 mb-6 space-y-2">';
        echo '        <li><strong class="text-luxeGold">Structure:</strong> Premium Solid Wood</li>';
        echo '        <li><strong class="text-luxeGold">Finish:</strong> Custom Luxury Polish</li>';
        echo '      </ul>';
        echo '      <button class="btn-luxury w-full" onclick="prefillInquiry(\'' . htmlspecialchars(addslashes($display_title)) . '\', \'Custom Bespoke\')">Inquire Bespoke Option</button>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-center w-full text-gray-500">More luxury designs coming soon.</p>';
}
?>
      </div>
    </div>
  </section>

  <!-- Footers & Drawer -->
  
<?php include 'footer.php'; ?>
