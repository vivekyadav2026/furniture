<?php
$page_title = "FurnishHut | Handcrafted Royal Furniture & Bespoke Luxury Interiors";
$page_description = "FurnishHut specializes in handcrafted royal furniture, palace-inspired luxury bedroom sets, designer sofas, dining furniture, and bespoke interior solutions.";
include 'header.php';
?>

  


  
  <!-- HERO SECTION — Immersive Luxury Editorial -->
  <section class="hero-section relative min-h-screen flex items-center overflow-hidden bg-black" style="padding-top:0;">

    <!-- Full-Bleed Background Image -->
    <div class="absolute inset-0 z-0">
      <img src="assets/img/Sofa_Set_Design/Choice-Wala-Sofa-Set-in-Teak-Wood-2.webp" alt="FurnishHut Grand Luxury Living Space" class="w-full h-full object-cover object-center lg:object-right">
      
      <!-- Seamless Soft Fade Gradient (Left to Right) for Text Readability -->
      <div class="absolute inset-0 bg-gradient-to-r from-[#FDFBF7] via-[#FDFBF7]/70 to-transparent lg:w-[65%] w-[90%]"></div>
      
      <!-- Subtle Dark Vignette at the very bottom for depth -->
      <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/20 to-transparent"></div>
    </div>

    <!-- Typography Content (Integrated seamlessly, no box) -->
    <div class="relative z-10 w-full lg:w-[50%] px-8 md:px-16 xl:px-24 py-24 flex flex-col justify-center">

      <!-- Eyebrow tag -->
      <div class="flex items-center gap-3 mb-6 gsap-reveal">
        <span class="block w-12 h-[1px] bg-luxeGold"></span>
        <span class="text-luxeGold text-[10px] font-semibold tracking-[0.45em] uppercase">The Epitome of Royal Living</span>
      </div>

      <!-- Main Headline -->
      <h1 class="font-heading text-[3rem] md:text-[4rem] xl:text-[5rem] leading-[1.05] text-[#1F1F1F] mb-6 gsap-reveal" style="letter-spacing:-0.01em; font-family:'Cormorant Garamond',Georgia,serif; font-weight:600;">
        Handcrafted<br>
        for <em style="font-style:italic; color:#D4AF37;">Royal</em><br>
        Spaces
      </h1>

      <!-- Divider line -->
      <div class="w-16 h-[1px] bg-luxeGold mb-7 gsap-reveal"></div>

      <!-- Subtext -->
      <p class="text-[#2C2420] text-sm md:text-base leading-relaxed max-w-md mb-10 font-normal gsap-reveal" style="letter-spacing:0.01em;">
        Bespoke luxury furniture &amp; palace-inspired interiors — crafted by master artisans for elite residences worldwide.
      </p>

      <!-- CTAs -->
      <div class="flex flex-wrap gap-5 gsap-reveal items-center">
        <a href="collections.php" class="btn-luxury-filled shadow-xl">Explore Collection</a>
        <button class="btn-luxury trigger-inquiry !text-[#1F1F1F] !border-[#1F1F1F] hover:!bg-[#1F1F1F]/5">Book Consultation</button>
      </div>

      <!-- Subtle stats row -->
      <div class="flex gap-10 mt-16 gsap-reveal">
        <div>
          <div class="font-heading text-2xl md:text-3xl text-[#1F1F1F] font-bold" style="font-family:'Cormorant Garamond',serif;">20+</div>
          <div class="text-[9px] uppercase tracking-widest text-zinc-500 mt-2 font-medium">Years of Craft</div>
        </div>
        <div class="border-l border-zinc-300 pl-10">
          <div class="font-heading text-2xl md:text-3xl text-[#1F1F1F] font-bold" style="font-family:'Cormorant Garamond',serif;">5000+</div>
          <div class="text-[9px] uppercase tracking-widest text-zinc-500 mt-2 font-medium">Elite Installs</div>
        </div>
        <div class="border-l border-zinc-300 pl-10">
          <div class="font-heading text-2xl md:text-3xl text-[#1F1F1F] font-bold" style="font-family:'Cormorant Garamond',serif;">100%</div>
          <div class="text-[9px] uppercase tracking-widest text-zinc-500 mt-2 font-medium">Handmade</div>
        </div>
      </div>
    </div>

    <!-- Floating tag on image (Bottom Right) -->
    <div class="absolute bottom-10 right-10 z-10 hidden md:block text-right">
      <div class="text-[9px] text-[#FDFBF7] uppercase tracking-widest mb-1 drop-shadow-md">Signature Collection</div>
      <div class="font-heading text-sm text-[#FDFBF7] drop-shadow-md">Royal Palace Suite 2026</div>
    </div>

  </section>

  <!-- Section 2: All Collections Grid -->
  <section class="py-24 bg-white relative">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="text-center mb-16">
        <span class="text-luxeGold text-xs tracking-[0.3em] uppercase block mb-2 font-semibold">15 Mastercraft Categories</span>
        <h2 class="text-3xl md:text-5xl font-heading text-luxeBlack">Our Collections</h2>
        <div class="w-24 h-[1px] bg-luxeGold mx-auto mt-4 mb-4"></div>
        <p class="text-gray-500 text-sm max-w-xl mx-auto">Every piece handcrafted in solid teak &amp; rosewood with 24K gold gilding — made to palace-grade standards.</p>
      </div>

      <!-- Featured Row: Bed + Sofa (big) -->
      <div class="row g-4 mb-4">
        <div class="col-lg-6">
          <div class="card-luxury" style="position:relative;">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/bedroom_furniture/Premium-Bedroom-Set-in-White-Gold-scaled.webp" alt="Royal Handcrafted Beds" class="card-luxury-img" style="height:400px;">
            </div>
            <div style="position:absolute;top:1rem;left:1rem;background:#C5A880;color:#fff;font-size:9px;letter-spacing:0.2em;padding:4px 12px;text-transform:uppercase;font-family:'Montserrat',sans-serif;">Royal Collection</div>
            <div class="p-5 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <div>
                <h3 class="text-xl font-heading text-luxeBlack mb-1">Royal Beds</h3>
                <span class="text-[10px] text-gray-400 uppercase tracking-wider">King · Queen · Canopy · Custom</span>
              </div>
              <a href="bedroom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Explore →</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card-luxury" style="position:relative;">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/Sofa_Set_Design/10-Seater-Sofa-Set-Center-Table-2-Corner-Tables-Carved-in-Teak-YT-416-scaled.webp" alt="Luxury Carved Sofa Sets" class="card-luxury-img" style="height:400px;">
            </div>
            <div style="position:absolute;top:1rem;left:1rem;background:#C5A880;color:#fff;font-size:9px;letter-spacing:0.2em;padding:4px 12px;text-transform:uppercase;font-family:'Montserrat',sans-serif;">Signature Series</div>
            <div class="p-5 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <div>
                <h3 class="text-xl font-heading text-luxeBlack mb-1">Sofa Sets</h3>
                <span class="text-[10px] text-gray-400 uppercase tracking-wider">3+1+1 · L-Shape · Custom</span>
              </div>
              <a href="sofa.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Explore →</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Grid of remaining 13 categories -->
      <div class="row g-4">
        <!-- Console Table -->
        <div class="col-lg-4 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/console_table/Full-Handcrafted-Mirror-Console-With-Designer-Table.webp" alt="Console Tables" class="card-luxury-img" style="height:260px;">
            </div>
            <div class="p-4 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h3 class="text-base font-heading text-luxeBlack">Console Tables</h3>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
        <!-- Dining -->
        <div class="col-lg-4 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/Dining_furniture/dining-table-chair-design (2).webp" alt="Dining Sets" class="card-luxury-img" style="height:260px;">
            </div>
            <div class="p-4 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h3 class="text-base font-heading text-luxeBlack">Dining Sets</h3>
              <a href="dining.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Explore →</a>
            </div>
          </div>
        </div>
        <!-- Chair -->
        <div class="col-lg-4 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/gurujichair/Antique-Gold-Guruji-Chair-Singhasan-YT-641.webp" alt="Accent Chairs" class="card-luxury-img" style="height:260px;">
            </div>
            <div class="p-4 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h3 class="text-base font-heading text-luxeBlack">Accent Chairs</h3>
              <a href="throne.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Explore →</a>
            </div>
          </div>
        </div>
        <!-- Table -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/console_table/Grand-Console-with-Mirror-Frame-for-Home.jpg" alt="Centre Tables" class="card-luxury-img" style="height:220px;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Centre Tables</h4>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
        <!-- Swings -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/swing_design/Buy-a-strong-durable-and-long-lasting-wooden-swing.webp" alt="Royal Swings" class="card-luxury-img" style="height:220px;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Royal Swings</h4>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
        <!-- Mirrors -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/partition_and_decorative/Classic-Room-Separator-in-Sheesham-Wood-PART-0092-jpg.webp" alt="Ornate Mirrors" class="card-luxury-img" style="height:220px;object-position:right;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Ornate Mirrors</h4>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
        <!-- Mandir -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/temple/2026-Hindu-Puja-Mandir-Design-for-home.webp" alt="Pooja Mandirs" class="card-luxury-img" style="height:220px;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Pooja Mandirs</h4>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
        <!-- Rock Chairs -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/gurujichair/Antique-Guru-JI-Chair-with-lion-handles-5.webp" alt="Rocking Chairs" class="card-luxury-img" style="height:220px;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Rocking Chairs</h4>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
        <!-- Doors -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/door_Design/Decorative-Wooden-Door-Design.webp" alt="Designer Doors" class="card-luxury-img" style="height:220px;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Designer Doors</h4>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
        <!-- Partition -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/partition_and_decorative/Floral-Carving-Partition-Screen-UH-PART-0047-jpg.webp" alt="Partition Designs" class="card-luxury-img" style="height:220px;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Partition Designs</h4>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
        <!-- Guruji Chair -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/gurujichair/Crafted-Royal-Chair-for-Guruji-Gaddi-Design-1-1.webp" alt="Guruji Chair" class="card-luxury-img" style="height:220px;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Guruji Chair</h4>
              <a href="throne.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Explore →</a>
            </div>
          </div>
        </div>
        <!-- Office Furniture -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/Office_furniture/Custom-built-executive-Furniture-for-Office-2-scaled.webp" alt="Office Furniture" class="card-luxury-img" style="height:220px;object-position:left;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Office Furniture</h4>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
        <!-- Study Tables -->
        <div class="col-lg-3 col-md-6">
          <div class="card-luxury">
            <div class="card-luxury-img-wrapper">
              <img src="assets/img/console_table/Hallway-Entryway-Console-For-Home-0.webp" alt="Study Tables" class="card-luxury-img" style="height:220px;">
            </div>
            <div class="p-3 flex justify-between items-center border-t border-[rgba(197,168,128,0.15)]">
              <h4 class="text-sm font-heading text-luxeBlack">Study Tables</h4>
              <a href="custom.php" class="text-luxeGold text-xs tracking-widest uppercase hover:underline">Inquire →</a>
            </div>
          </div>
        </div>
      </div>

      <!-- View All CTA -->
      <div class="text-center mt-12">
        <a href="collections.php" class="btn-luxury-filled" style="padding:0.85rem 2.5rem;">View All 15 Categories →</a>
      </div>

    </div>
  </section>

  <!-- Section 3: Featured Masterpieces Gallery -->
  <section class="py-24 bg-luxeCream relative">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="text-center mb-16">
        <span class="text-luxeGold text-xs tracking-[0.3em] uppercase block mb-2 font-semibold">The Portfolio</span>
        <h2 class="text-3xl md:text-5xl font-heading text-luxeBlack">Featured Masterpieces</h2>
        <div class="w-24 h-[1px] bg-luxeGold mx-auto mt-4"></div>
      </div>

      <!-- Gallery Filters -->
      <div class="flex flex-wrap justify-center gap-4 mb-12 text-sm uppercase tracking-widest">
        <button class="material-chip active px-4 py-2" onclick="filterGallery('all')">All Masterpieces</button>
        <button class="material-chip px-4 py-2" onclick="filterGallery('bed')">King Size Beds</button>
        <button class="material-chip px-4 py-2" onclick="filterGallery('sofa')">Luxury Sofas</button>
        <button class="material-chip px-4 py-2" onclick="filterGallery('dining')">Palatial Dining</button>
        <button class="material-chip px-4 py-2" onclick="filterGallery('throne')">Maharaja Chairs</button>
      </div>

      <!-- Gallery Grid -->
      <div class="row g-4" id="galleryMasterpieces">
        <div class="col-md-4 gallery-item bed gsap-reveal">
          <div class="relative overflow-hidden group">
            <img src="assets/img/bedroom_furniture/Premium-Bedroom-Set-with-Modern-Home-scaled.webp" alt="Imperial King Bed" class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-white bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
              <h4 class="font-heading text-lg text-luxeBlack">Imperial Carved King Bed</h4>
              <p class="text-luxeGold text-xs tracking-wider uppercase mb-3">Burmese Teak & 24K Gilding</p>
              <button class="btn-luxury trigger-inquiry text-[10px] py-1 px-3">Bespoke Inquiry</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 gallery-item sofa gsap-reveal">
          <div class="relative overflow-hidden group">
            <img src="assets/img/Sofa_Set_Design/6-Seater-Glossy-Finish-Sofa-Set-YT-303.webp" alt="Baroque Velvet Sofa Set" class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-white bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
              <h4 class="font-heading text-lg text-luxeBlack">Baroque Deep Velvet Sofa Set</h4>
              <p class="text-luxeGold text-xs tracking-wider uppercase mb-3">Bentley Home Luxury Concept</p>
              <button class="btn-luxury trigger-inquiry text-[10px] py-1 px-3">Bespoke Inquiry</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 gallery-item dining gsap-reveal">
          <div class="relative overflow-hidden group">
            <img src="assets/img/Dining_furniture/Gold-Brown-Dual-Shade-4-Seater-Dining-Set-Custom-Made-scaled.webp" alt="Grand Palace Dining Ensemble" class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-white bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
              <h4 class="font-heading text-lg text-luxeBlack">Grand Palace Dining Table</h4>
              <p class="text-luxeGold text-xs tracking-wider uppercase mb-3">White Calacatta Marble Top</p>
              <button class="btn-luxury trigger-inquiry text-[10px] py-1 px-3">Bespoke Inquiry</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 gallery-item throne gsap-reveal">
          <div class="relative overflow-hidden group">
            <img src="assets/img/gurujichair/Customized-Wooden-Guru-Ji-Chair-Royal-Sofa-Chair.webp" alt="Gilded Teak Throne" class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-white bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
              <h4 class="font-heading text-lg text-luxeBlack">Gilded Teak Throne Chair</h4>
              <p class="text-luxeGold text-xs tracking-wider uppercase mb-3">Palace Entrance Masterpiece</p>
              <button class="btn-luxury trigger-inquiry text-[10px] py-1 px-3">Bespoke Inquiry</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 gallery-item bed gsap-reveal">
          <div class="relative overflow-hidden group">
            <img src="assets/img/bedroom_furniture/Buy-Royal-Beds-Online-at-Best-Prices-side-drawers-scaled.webp" alt="Crown Tufted Canopy Bed" class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-white bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
              <h4 class="font-heading text-lg text-luxeBlack">Crown Tufted Canopy Bed</h4>
              <p class="text-luxeGold text-xs tracking-wider uppercase mb-3">Bespoke Royal Bedding</p>
              <button class="btn-luxury trigger-inquiry text-[10px] py-1 px-3">Bespoke Inquiry</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 gallery-item sofa gsap-reveal">
          <div class="relative overflow-hidden group">
            <img src="assets/img/Sofa_Set_Design/Classic-Rajwada-Sofa-Set-E.jpg" alt="Chesterfield Royal Sectional" class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-white bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
              <h4 class="font-heading text-lg text-luxeBlack">Chesterfield Royal Lounge</h4>
              <p class="text-luxeGold text-xs tracking-wider uppercase mb-3">Custom High-End Panel Fit</p>
              <button class="btn-luxury trigger-inquiry text-[10px] py-1 px-3">Bespoke Inquiry</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 4: Why Choose Us -->
  <section class="py-20 bg-white border-y border-[rgba(197,168,128,0.25)] relative">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="row g-4 text-center">
        <div class="col-6 col-lg-2.4 col-md-4 gsap-reveal">
          <h3 class="text-4xl md:text-5xl font-heading text-luxeGold mb-2 font-bold">20+</h3>
          <p class="text-xs uppercase tracking-widest text-luxeBlack">Years of Craftsmanship</p>
        </div>
        <div class="col-6 col-lg-2.4 col-md-4 gsap-reveal">
          <h3 class="text-4xl md:text-5xl font-heading text-luxeGold mb-2 font-bold">5000+</h3>
          <p class="text-xs uppercase tracking-widest text-luxeBlack">Luxury Installations</p>
        </div>
        <div class="col-6 col-lg-2.4 col-md-4 gsap-reveal">
          <h3 class="text-4xl md:text-5xl font-heading text-luxeGold mb-2 font-bold">100%</h3>
          <p class="text-xs uppercase tracking-widest text-luxeBlack">Handmade Detailing</p>
        </div>
        <div class="col-6 col-lg-2.4 col-md-4 gsap-reveal">
          <h3 class="text-4xl md:text-5xl font-heading text-luxeGold mb-2 font-bold">Global</h3>
          <p class="text-xs uppercase tracking-widest text-luxeBlack">Worldwide Shipping</p>
        </div>
        <div class="col-6 col-lg-2.4 col-md-4 gsap-reveal">
          <h3 class="text-4xl md:text-5xl font-heading text-luxeGold mb-2 font-bold">Custom</h3>
          <p class="text-xs uppercase tracking-widest text-luxeBlack">Bespoke Designs</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 5: Luxury Craftsmanship Experience Timeline -->
  <section class="py-24 bg-luxeCream relative">
    <div class="container mx-auto px-4 max-w-5xl">
      <div class="text-center mb-20">
        <span class="text-luxeGold text-xs tracking-[0.3em] uppercase block mb-2 font-semibold">Behind The Masterpiece</span>
        <h2 class="text-3xl md:text-5xl font-heading text-luxeBlack">The Craftsmanship Experience</h2>
        <div class="w-24 h-[1px] bg-luxeGold mx-auto mt-4"></div>
      </div>

      <div class="crafts-timeline max-w-3xl mx-auto">
        <!-- Stage 1 -->
        <div class="timeline-item gsap-reveal">
          <div class="flex flex-col md:flex-row gap-4 justify-between">
            <div>
              <span class="text-luxeGold text-xs tracking-widest uppercase font-semibold">Stage 01</span>
              <h3 class="text-2xl font-heading text-luxeBlack mt-1">Master Hand Carving</h3>
              <p class="text-sm mt-3 text-luxeBlack leading-relaxed max-w-lg">
                Our master craftsmen, carrying generations of heritage, sculpt solid seasoned teak and rosewood blocks into majestic motifs. Every curve is carved entirely by hand, capturing intricate baroque reliefs.
              </p>
            </div>
            <div class="w-full md:w-48 h-32 overflow-hidden border border-[rgba(197,168,128,0.25)] flex-shrink-0">
              <img src="assets/img/Sofa_Set_Design/Classic-Victorian-Sofa-Set-in-White-Polish-YT-396.webp" alt="Hand Woodcarving" class="w-full h-full object-cover">
            </div>
          </div>
        </div>

        <!-- Stage 2 -->
        <div class="timeline-item gsap-reveal">
          <div class="flex flex-col md:flex-row gap-4 justify-between">
            <div>
              <span class="text-luxeGold text-xs tracking-widest uppercase font-semibold">Stage 02</span>
              <h3 class="text-2xl font-heading text-luxeBlack mt-1">Gilding & Gold Leaf Finishing</h3>
              <p class="text-sm mt-3 text-luxeBlack leading-relaxed max-w-lg">
                We apply premium 24K real gold leaf and antique bronze patinas using traditional Italian gilding practices. The finish is rubbed by hand to create depth, lustre, and an authentic imperial aging.
              </p>
            </div>
            <div class="w-full md:w-48 h-32 overflow-hidden border border-[rgba(197,168,128,0.25)] flex-shrink-0">
              <img src="assets/img/gurujichair/Customized-Wooden-Guru-Ji-Chair-Small-Size.webp" alt="Gold Leaf Gilding" class="w-full h-full object-cover">
            </div>
          </div>
        </div>

        <!-- Stage 3 -->
        <div class="timeline-item gsap-reveal">
          <div class="flex flex-col md:flex-row gap-4 justify-between">
            <div>
              <span class="text-luxeGold text-xs tracking-widest uppercase font-semibold">Stage 03</span>
              <h3 class="text-2xl font-heading text-luxeBlack mt-1">Palace Upholstery</h3>
              <p class="text-sm mt-3 text-luxeBlack leading-relaxed max-w-lg">
                We source ultra-premium velvets, silks, and heavy brocades from historic European weaving mills. Our artisans hand-tailor deep button-tufting, hand-stitched borders, and luxury piping for cloud-like comfort.
              </p>
            </div>
            <div class="w-full md:w-48 h-32 overflow-hidden border border-[rgba(197,168,128,0.25)] flex-shrink-0">
              <img src="assets/img/Sofa_Set_Design/Classic-Wingback-Sofa-Set-2211-YT-482-1.webp" alt="Luxury Upholstery" class="w-full h-full object-cover">
            </div>
          </div>
        </div>

        <!-- Stage 4 -->
        <div class="timeline-item gsap-reveal">
          <div class="flex flex-col md:flex-row gap-4 justify-between">
            <div>
              <span class="text-luxeGold text-xs tracking-widest uppercase font-semibold">Stage 04</span>
              <h3 class="text-2xl font-heading text-luxeBlack mt-1">Bespoke White-Glove Install</h3>
              <p class="text-sm mt-3 text-luxeBlack leading-relaxed max-w-lg">
                Every customized luxury furniture collection is shipped globally inside reinforced wooden crates, then assembled in your residence under our engineering supervision to guarantee flawless placement.
              </p>
            </div>
            <div class="w-full md:w-48 h-32 overflow-hidden border border-[rgba(197,168,128,0.25)] flex-shrink-0">
              <img src="assets/img/Sofa_Set_Design/Colonial-Style-Sofa-Set-in-Sheesham-Wood-YT-319-scaled.webp" alt="Luxury Installation" class="w-full h-full object-cover">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 6: Luxury Interior Projects (Before/After Slider) -->
  <section class="py-24 bg-white relative border-t border-[rgba(197,168,128,0.25)]">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="row items-center g-5">
        <div class="col-lg-5 gsap-reveal-left">
          <span class="text-luxeGold text-xs tracking-[0.3em] uppercase block mb-2 font-semibold">Metamorphosis</span>
          <h2 class="text-3xl md:text-5xl font-heading text-luxeBlack mb-6">Palace-Inspired Makeovers</h2>
          <p class="text-sm text-luxeBlack leading-relaxed mb-8">
            Experience the design alchemy of FurnishHut. We transform bare architectural structures into extraordinary, fully decorated palaces and high-end residences. 
          </p>
          <div class="border-l border-luxeGold pl-4 mb-8">
            <span class="text-luxeBlack font-medium block">Interactive Showcase:</span>
            <span class="text-xs text-gray-500">Drag the vertical bar to reveal the raw structural shell versus the bespoke completed palace styling.</span>
          </div>
          <a href="projects.php" class="btn-luxury">View Portfolio</a>
        </div>
        <div class="col-lg-7 gsap-reveal-right">
          <!-- Before/After Slider Component -->
          <div class="before-after-container shadow-2xl">
            <!-- Before Image -->
            <div class="ba-image ba-before" style="background-image: url('assets/img/bedroom_furniture/Luxury-Teak-Wood-Bed-with-Storage-scaled.webp');">
              <div class="absolute top-4 left-4 bg-white/60 px-3 py-1 text-xs text-luxeBlack uppercase tracking-widest border border-white/20">The Shell</div>
            </div>
            <!-- After Image -->
            <div class="ba-image ba-after" style="background-image: url('assets/img/bedroom_furniture/Maharaja-Design-of-bed-scaled.webp');">
              <div class="absolute top-4 right-4 bg-luxeGold/80 px-3 py-1 text-xs text-black uppercase tracking-widest font-semibold border border-luxeGold">The Palace</div>
            </div>
            <!-- Slide bar handle -->
            <div class="ba-slider-handle">
              <div class="ba-slider-button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18-6-6 6-6M15 6l6 6-6 6"/></svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 7: Client Testimonials -->
  <section class="py-24 bg-luxeCream relative">
    <div class="container mx-auto px-4 max-w-5xl">
      <div class="text-center mb-16">
        <span class="text-luxeGold text-xs tracking-[0.3em] uppercase block mb-2 font-semibold">Testimonials</span>
        <h2 class="text-3xl md:text-5xl font-heading text-luxeBlack">Elite Experiences</h2>
        <div class="w-24 h-[1px] bg-luxeGold mx-auto mt-4"></div>
      </div>

      <!-- Testimonial Cards Carousel / Static structure (Simple BS Carousel) -->
      <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="glass-panel p-8 md:p-12 text-center max-w-3xl mx-auto border border-[rgba(197,168,128,0.25)]">
              <div class="text-luxeGold text-3xl mb-4">“</div>
              <p class="text-base md:text-lg italic text-luxeBlack mb-6 leading-relaxed">
                "We commissioned FurnishHut to design and furnish our private residence in Monaco. The Teak woodcarvings and real gold gilding are masterpiece standards. The craftsmanship makes the bedroom feel like a royal suite."
              </p>
              <h4 class="font-heading text-luxeBlack text-base">Count Alistair Vance</h4>
              <p class="text-xs text-luxeGold uppercase tracking-widest mt-1">Villa de l'Horizon, Monaco</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="glass-panel p-8 md:p-12 text-center max-w-3xl mx-auto border border-[rgba(197,168,128,0.25)]">
              <div class="text-luxeGold text-3xl mb-4">“</div>
              <p class="text-base md:text-lg italic text-luxeBlack mb-6 leading-relaxed">
                "Every designer sofa set from FurnishHut is an heirloom piece. Guests are amazed by the hand-carved mahogany scrollwork. Their white-glove shipping crew handled installation flawlessly."
              </p>
              <h4 class="font-heading text-luxeBlack text-base">Helena Rostova</h4>
              <p class="text-xs text-luxeGold uppercase tracking-widest mt-1">Elite Interior Consultant, London</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon opacity-50 hover:opacity-100" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon opacity-50 hover:opacity-100" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </section>

  <!-- Section 8: Custom Furniture Bespoke Process -->
  <section class="py-24 bg-white relative border-y border-[rgba(197,168,128,0.25)]">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="text-center mb-20">
        <span class="text-luxeGold text-xs tracking-[0.3em] uppercase block mb-2 font-semibold">Your Vision realized</span>
        <h2 class="text-3xl md:text-5xl font-heading text-luxeBlack">The Bespoke Process</h2>
        <div class="w-24 h-[1px] bg-luxeGold mx-auto mt-4"></div>
      </div>

      <div class="row g-4 justify-center">
        <!-- Step 1 -->
        <div class="col-lg-3 col-md-6 text-center gsap-reveal">
          <div class="p-6 relative">
            <span class="font-heading text-6xl text-[rgba(212,175,55,0.1)] block mb-4 font-bold">01</span>
            <h3 class="font-heading text-luxeBlack text-xl mb-3">Consultation</h3>
            <p class="text-xs text-luxeBlack leading-relaxed">
              We host a private call or physical session to analyze your palace floorplans, interior themes, wood choices, and aesthetic goals.
            </p>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="col-lg-3 col-md-6 text-center gsap-reveal">
          <div class="p-6 relative">
            <span class="font-heading text-6xl text-[rgba(212,175,55,0.1)] block mb-4 font-bold">02</span>
            <h3 class="font-heading text-luxeBlack text-xl mb-3">Design & Approval</h3>
            <p class="text-xs text-luxeBlack leading-relaxed">
              Our designers draft 3D structural renders and detail specific hand-carvings for your review and bespoke selection.
            </p>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="col-lg-3 col-md-6 text-center gsap-reveal">
          <div class="p-6 relative">
            <span class="font-heading text-6xl text-[rgba(212,175,55,0.1)] block mb-4 font-bold">03</span>
            <h3 class="font-heading text-luxeBlack text-xl mb-3">Handcrafting</h3>
            <p class="text-xs text-luxeBlack leading-relaxed">
              Our team of master artisans hand-carves, gilds, and upholsters your furniture collections in seasoned Burmese Teak.
            </p>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="col-lg-3 col-md-6 text-center gsap-reveal">
          <div class="p-6 relative">
            <span class="font-heading text-6xl text-[rgba(212,175,55,0.1)] block mb-4 font-bold">04</span>
            <h3 class="font-heading text-luxeBlack text-xl mb-3">White-Glove Install</h3>
            <p class="text-xs text-luxeBlack leading-relaxed">
              Secure ocean casing shipping, customs clearance, and manual alignment/assembly inside your home.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 9: Luxury Lookbook (Editorial Hotspot) -->
  <section class="py-24 bg-luxeCream relative">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="text-center mb-16">
        <span class="text-luxeGold text-xs tracking-[0.3em] uppercase block mb-2 font-semibold">Editorial</span>
        <h2 class="text-3xl md:text-5xl font-heading text-luxeBlack">The Luxury Lookbook</h2>
        <div class="w-24 h-[1px] bg-luxeGold mx-auto mt-4"></div>
      </div>

      <div class="lookbook-container glass-panel p-4 rounded-0 max-w-5xl mx-auto gsap-reveal">
        <div class="lookbook-image-wrapper">
          <img src="assets/img/Dining_furniture/High-Tea-Table-Chair-Set-1-scaled.webp" alt="FurnishHut Gold Dining Collection Layout" class="w-full h-[600px] object-cover">
          
          <!-- Hotspot 1 -->
          <div class="lookbook-hotspot top-[50%] left-[20%]" data-product-name="Maharaja Highback Chair" data-product-ref="M-HC01" data-product-price="Inquire for Price" title="Click to Inquire">
            <span>+</span>
          </div>

          <!-- Hotspot 2 -->
          <div class="lookbook-hotspot top-[60%] left-[55%]" data-product-name="Calacatta Marble Dining Table" data-product-ref="D-MT09" data-product-price="Inquire for Price" title="Click to Inquire">
            <span>+</span>
          </div>

          <div class="absolute bottom-4 left-4 bg-white/80 px-3 py-2 text-xs border border-[rgba(197,168,128,0.3)]">
            <span class="text-luxeGold font-bold">&#9673; Interactive:</span> Click hotspots to inquire about individual dining set pieces.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 10: Global Presence Showrooms (SVG Map) -->
  <section class="py-24 bg-white relative border-t border-[rgba(197,168,128,0.25)]">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="row align-items-center g-5">
        <div class="col-lg-4 gsap-reveal-left">
          <span class="text-luxeGold text-xs tracking-[0.3em] uppercase block mb-2 font-semibold">Showrooms</span>
          <h2 class="text-3xl md:text-5xl font-heading text-luxeBlack mb-6">Global Presence</h2>
          <p class="text-sm leading-relaxed mb-6">
            FurnishHut serves royalty, luxury estate owners, and top architects across five continents. Browse our official flagship showrooms and design centers.
          </p>
          <ul class="text-xs uppercase tracking-wider space-y-3 font-semibold text-luxeBlack">
            <li><span class="text-luxeGold">&#9673;</span> Milan, Italy &ndash; Design HQ</li>
            <li><span class="text-luxeGold">&#9673;</span> Dubai, UAE &ndash; Middle East Flagship</li>
            <li><span class="text-luxeGold">&#9673;</span> London, UK &ndash; Mayfair Showroom</li>
            <li><span class="text-luxeGold">&#9673;</span> New York, USA &ndash; Fifth Avenue Suite</li>
            <li><span class="text-luxeGold">&#9673;</span> Mumbai, India &ndash; Heritage Salon</li>
          </ul>
        </div>
        
        <div class="col-lg-8 gsap-reveal-right">
          <div class="showroom-map-container h-[450px] relative w-full overflow-hidden">
            <!-- Simulated Vector SVG Map (Styled with Gold Grid outline) -->
            <svg class="w-full h-full opacity-25" viewBox="0 0 1000 500" fill="none" stroke="currentColor">
              <path d="M 100 250 Q 200 150 300 250 T 500 250 T 700 250 T 900 250" stroke="rgba(212, 175, 55, 0.2)" stroke-width="1" fill="none"/>
              <!-- Outline grids -->
              <line x1="0" y1="100" x2="1000" y2="100" stroke="rgba(212, 175, 55, 0.05)"/>
              <line x1="0" y1="200" x2="1000" y2="200" stroke="rgba(212, 175, 55, 0.05)"/>
              <line x1="0" y1="300" x2="1000" y2="300" stroke="rgba(212, 175, 55, 0.05)"/>
              <line x1="0" y1="400" x2="1000" y2="400" stroke="rgba(212, 175, 55, 0.05)"/>
              <line x1="200" y1="0" x2="200" y2="500" stroke="rgba(212, 175, 55, 0.05)"/>
              <line x1="400" y1="0" x2="400" y2="500" stroke="rgba(212, 175, 55, 0.05)"/>
              <line x1="600" y1="0" x2="600" y2="500" stroke="rgba(212, 175, 55, 0.05)"/>
              <line x1="800" y1="0" x2="800" y2="500" stroke="rgba(212, 175, 55, 0.05)"/>
            </svg>
            
            <!-- Showroom Pins -->
            <!-- NY Pin -->
            <div class="map-marker left-[25%] top-[35%]" data-tooltip-target="tooltipNY"></div>
            <div id="tooltipNY" class="map-tooltip">
              <h5 class="text-luxeBlack font-heading font-semibold text-sm">Fifth Ave Design Suite</h5>
              <p class="text-muted text-[10px] mt-1">Fifth Avenue, Manhattan, New York<br>Call: +1 (212) 555-0199</p>
            </div>

            <!-- London Pin -->
            <div class="map-marker left-[46%] top-[25%]" data-tooltip-target="tooltipLon"></div>
            <div id="tooltipLon" class="map-tooltip">
              <h5 class="text-luxeBlack font-heading font-semibold text-sm">London Mayfair Gallery</h5>
              <p class="text-muted text-[10px] mt-1">Mayfair, London W1S<br>Call: +44 20 7946 0912</p>
            </div>

            <!-- Milan Pin -->
            <div class="map-marker left-[49%] top-[32%]" data-tooltip-target="tooltipMilan"></div>
            <div id="tooltipMilan" class="map-tooltip">
              <h5 class="text-luxeBlack font-heading font-semibold text-sm">Milan Atelier HQ</h5>
              <p class="text-muted text-[10px] mt-1">Via della Spiga, Milan<br>Call: +39 02 8976 5431</p>
            </div>

            <!-- Dubai Pin -->
            <div class="map-marker left-[61%] top-[45%]" data-tooltip-target="tooltipDubai"></div>
            <div id="tooltipDubai" class="map-tooltip">
              <h5 class="text-luxeBlack font-heading font-semibold text-sm">Middle East Flagship</h5>
              <p class="text-muted text-[10px] mt-1">Downtown Boulevard, Dubai<br>Call: +971 4 366 1111</p>
            </div>

            <!-- Mumbai Pin -->
            <div class="map-marker left-[69%] top-[55%]" data-tooltip-target="tooltipMumbai"></div>
            <div id="tooltipMumbai" class="map-tooltip">
              <h5 class="text-luxeBlack font-heading font-semibold text-sm">Mumbai Heritage Salon</h5>
              <p class="text-muted text-[10px] mt-1">Colaba Chamber, Mumbai<br>Call: +91 22 6112 0987</p>
            </div>

            <div class="absolute bottom-4 left-4 bg-white/80 px-2 py-1 text-xs border border-[rgba(197,168,128,0.3)]">
              Hover over pins to reveal flagship contact coordinates.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 11: Premium Lead Generation Form -->
  <section class="py-24 bg-luxeCream relative">
    <div class="container mx-auto px-4 max-w-4xl">
      <div class="glass-panel p-8 md:p-16 border border-[rgba(197,168,128,0.3)] relative">
        <div class="text-center mb-12">
          <span class="text-luxeGold text-xs tracking-[0.3em] uppercase block mb-2 font-semibold">Private Access</span>
          <h2 class="text-3xl md:text-5xl font-heading text-luxeBlack">Request Bespoke Catalog</h2>
          <div class="w-16 h-[1px] bg-luxeGold mx-auto mt-4"></div>
          <p class="text-xs text-gray-500 mt-3">Receive physical lookbooks printed on archival Italian cardstock, and custom finish samples.</p>
        </div>

        <form class="luxury-form row g-4">
          <div class="col-md-6">
            <label class="form-label text-xs uppercase tracking-widest text-luxeGold">Full Name</label>
            <input type="text" required class="form-control bg-transparent text-luxeBlack border-0 border-b border-[rgba(197,168,128,0.3)] rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
          </div>
          <div class="col-md-6">
            <label class="form-label text-xs uppercase tracking-widest text-luxeGold">E-Mail Coordinates</label>
            <input type="email" required class="form-control bg-transparent text-luxeBlack border-0 border-b border-[rgba(197,168,128,0.3)] rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
          </div>
          <div class="col-md-6">
            <label class="form-label text-xs uppercase tracking-widest text-luxeGold">Contact Line</label>
            <input type="tel" required class="form-control bg-transparent text-luxeBlack border-0 border-b border-[rgba(197,168,128,0.3)] rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
          </div>
          <div class="col-md-6">
            <label class="form-label text-xs uppercase tracking-widest text-luxeGold">Primary Collection Interest</label>
            <select class="form-select bg-white text-luxeBlack border-0 border-b border-[rgba(197,168,128,0.3)] rounded-0 px-0 py-2 focus:bg-white focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
              <option value="bedroom">Royal Bedroom Collections</option>
              <option value="sofa">Luxury Sofa Sets</option>
              <option value="dining">Designer Dining Hall</option>
              <option value="throne">Throne Chairs</option>
              <option value="temple">Pooja Mandir / Temples</option>
              <option value="custom">Complete Interior Customization</option>
            </select>
          </div>
          <div class="col-12 mt-5">
            <button type="submit" class="btn-luxury-filled w-full">Transmit Request</button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Elegant Footer -->
  
<?php include 'footer.php'; ?>
