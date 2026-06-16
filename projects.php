<?php
$page_title = "Interior Projects Portfolio | FurnishHut Palace Renovation";
$page_description = "Browse FurnishHut's luxury interior portfolio. Explore bespoke palace renovations, luxury villa interiors, and mega-yacht salons worldwide.";
include 'header.php';
?>

  


  <!-- Banner Header -->
  <section class="relative py-24 bg-luxeCream overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
      <img src="assets/img/Sofa_Set_Design/Designer-06-Seater-Sofa-Set-in-Solid-Teak-Wood-YT-612.webp" alt="Interior Projects Banner" class="w-full h-full object-cover ">
      
    </div>
    <div class="container relative z-10 text-center px-4 max-w-3xl">
      <div class="glass-panel py-6 px-8 inline-block border border-[rgba(197,168,128,0.35)] shadow-lg">
        <span class="text-luxeGold text-xs font-semibold tracking-[0.4em] uppercase block mb-2">GRAND COMMISSIONS</span>
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-luxeBlack tracking-wide m-0">Luxury Interior Projects</h1>
      </div>
    </div>
  </section>

  <!-- Before/After Slider Section -->
  <section class="py-24 bg-luxeCream">
    <div class="container mx-auto px-4 max-w-5xl">
      <div class="text-center mb-16">
        <span class="text-luxeGold text-xs tracking-widest uppercase block mb-2 font-semibold font-body">The Shell Metamorphosis</span>
        <h2 class="text-3xl font-heading text-luxeBlack">Before & After Showcase</h2>
        <div class="w-12 h-[1px] bg-luxeGold mx-auto mt-3"></div>
      </div>

      <!-- Before/After Slider -->
      <div class="before-after-container shadow-2xl mx-auto">
        <!-- Before -->
        <div class="ba-image ba-before" style="background-image: url('assets/img/bedroom_furniture/Majestic-King-Size-Golden-Bed-scaled.webp');">
          <div class="absolute top-4 left-4 bg-white/60 px-3 py-1 text-xs text-luxeBlack uppercase tracking-widest border border-white/20">The Shell</div>
        </div>
        <!-- After -->
        <div class="ba-image ba-after" style="background-image: url('assets/img/bedroom_furniture/Modern-Style-Double-Bed-design-with-drawers-scaled.webp');">
          <div class="absolute top-4 right-4 bg-luxeGold/80 px-3 py-1 text-xs text-black uppercase tracking-widest font-semibold border border-luxeGold">The Finished Palace</div>
        </div>
        <!-- Handle -->
        <div class="ba-slider-handle">
          <div class="ba-slider-button">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18-6-6 6-6M15 6l6 6-6 6"/></svg>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class="py-24 bg-white border-t border-[rgba(197,168,128,0.25)]">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="row g-5 align-items-center mb-20">
        <div class="col-lg-6 gsap-reveal-left">
          <span class="text-luxeGold text-xs uppercase tracking-widest block mb-2 font-semibold">Project 01 / Milan</span>
          <h3 class="text-3xl font-heading text-luxeBlack mb-4">Villa di Fiorano Residential Commission</h3>
          <p class="text-sm text-gray-500 leading-relaxed mb-6">
            A complete restoration of a historical 18th-century salon in Milan. FurnishHut designed and carved solid seasoned rosewood structural wall paneling, ceiling mouldings, matching dining ensembles, and tufted sofas.
          </p>
          <ul class="text-[10px] uppercase tracking-wider text-zinc-500 mb-6 space-y-2">
            <li><strong class="text-luxeGold">Scope:</strong> Full Living & Dining Room</li>
            <li><strong class="text-luxeGold">Timeline:</strong> 14 Months Execution</li>
            <li><strong class="text-luxeGold">Gilding:</strong> 24K Gold Leaf trims</li>
          </ul>
          <button class="btn-luxury trigger-inquiry">Inquire For Villa Refits</button>
        </div>
        <div class="col-lg-6 gsap-reveal-right">
          <img src="assets/img/Sofa_Set_Design/Designer-Royal-Concept-Sofa-Set-1.webp" alt="Milan Villa Commission" class="w-full h-[400px] object-cover border border-[rgba(197,168,128,0.25)]">
        </div>
      </div>

      <div class="row g-5 align-items-center">
        <div class="col-lg-6 order-lg-2 gsap-reveal-right">
          <span class="text-luxeGold text-xs uppercase tracking-widest block mb-2 font-semibold">Project 02 / Dubai</span>
          <h3 class="text-3xl font-heading text-luxeBlack mb-4">Palm Jumeirah Penthouse Salon</h3>
          <p class="text-sm text-gray-500 leading-relaxed mb-6">
            Bespoke interior execution for a luxury contemporary penthouse. Clean curved Bentley-inspired sofa systems, gold-plated stainless steel coffee tables, and matching bedroom panel fittings.
          </p>
          <ul class="text-[10px] uppercase tracking-wider text-zinc-500 mb-6 space-y-2">
            <li><strong class="text-luxeGold">Scope:</strong> Penthouse Living & Master Bedroom</li>
            <li><strong class="text-luxeGold">Material:</strong> Custom Charcoal Leather & Teak</li>
            <li><strong class="text-luxeGold">Style:</strong> Modern Palace Design</li>
          </ul>
          <button class="btn-luxury trigger-inquiry">Inquire For Villa Refits</button>
        </div>
        <div class="col-lg-6 order-lg-1 gsap-reveal-left">
          <img src="assets/img/Sofa_Set_Design/Designer-Sofa-Set-for-Living-Area-1.webp" alt="Palm Jumeirah Penthouse" class="w-full h-[400px] object-cover border border-[rgba(197,168,128,0.25)]">
        </div>
      </div>
    </div>
  </section>

  <!-- Shared Footer -->
  
<?php include 'footer.php'; ?>
