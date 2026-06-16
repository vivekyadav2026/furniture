<?php
$page_title = "Luxury Lookbook Gallery | FurnishHut Royal Furniture";
$page_description = "Browse our luxury lookbook gallery. High-resolution photographs of handcrafted palace bedroom suites, designer sofas, and custom royal interiors.";
include 'header.php';
?>

  


  <!-- Banner Header -->
  <section class="relative py-24 bg-luxeCream overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
      <img src="assets/img/Dining_furniture/DINING-CHAIR-400x226.webp" alt="Gallery Lookbook Banner" class="w-full h-full object-cover ">
      
    </div>
    <div class="container relative z-10 text-center px-4 max-w-3xl">
      <div class="glass-panel py-6 px-8 inline-block border border-[rgba(197,168,128,0.35)] shadow-lg">
        <span class="text-luxeGold text-xs font-semibold tracking-[0.4em] uppercase block mb-2">MAGAZINE STYLE</span>
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-luxeBlack tracking-wide m-0">Luxury Lookbook</h1>
      </div>
    </div>
  </section>

  <!-- Gallery Lookbook Grid -->
  <section class="py-24 bg-luxeCream">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="row g-4 justify-center">
        <!-- Gallery Card 1 -->
        <div class="col-md-6 gsap-reveal">
          <div class="card-luxury relative">
            <div class="lookbook-image-wrapper">
              <img src="assets/img/bedroom_furniture/Handcrafted-Wooden-Beds-Without-Storage-scaled.webp" alt="Royal Bedroom Chamber" class="w-full h-[450px] object-cover">
              <!-- Hotspot -->
              <div class="lookbook-hotspot top-[40%] left-[30%]" data-product-name="Royal Gilded Bedpost" data-product-ref="BR-CP10" data-product-price="Inquire for Price" title="Click to Inquire">
                <span>+</span>
              </div>
            </div>
            <div class="p-6 border-t border-[rgba(197,168,128,0.15)] text-center">
              <h4 class="font-heading text-luxeBlack text-lg">Chamber of Sovereign Sleep</h4>
              <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest">Italian Baroque bedroom styling</p>
            </div>
          </div>
        </div>

        <!-- Gallery Card 2 -->
        <div class="col-md-6 gsap-reveal">
          <div class="card-luxury relative">
            <div class="lookbook-image-wrapper">
              <img src="assets/img/Sofa_Set_Design/Chesterfield-sofa-top-design-International-Brand.webp" alt="Luxury Penthouse Lounge" class="w-full h-[450px] object-cover">
              <!-- Hotspot -->
              <div class="lookbook-hotspot top-[50%] left-[60%]" data-product-name="Navy Baroque Loveseat" data-product-ref="SF-BL03" data-product-price="Inquire for Price" title="Click to Inquire">
                <span>+</span>
              </div>
            </div>
            <div class="p-6 border-t border-[rgba(197,168,128,0.15)] text-center">
              <h4 class="font-heading text-luxeBlack text-lg">The Penthouse Salon Layout</h4>
              <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest">Bentley Contemporary Concept</p>
            </div>
          </div>
        </div>

        <!-- Gallery Card 3 -->
        <div class="col-md-6 gsap-reveal">
          <div class="card-luxury relative">
            <div class="lookbook-image-wrapper">
              <img src="assets/img/Dining_furniture/DINING-CHAIR-400x226.webp" alt="Palatial Dining Banquet" class="w-full h-[450px] object-cover">
              <!-- Hotspot -->
              <div class="lookbook-hotspot top-[65%] left-[45%]" data-product-name="Calacatta Banquet Table" data-product-ref="DN-BT09" data-product-price="Inquire for Price" title="Click to Inquire">
                <span>+</span>
              </div>
            </div>
            <div class="p-6 border-t border-[rgba(197,168,128,0.15)] text-center">
              <h4 class="font-heading text-luxeBlack text-lg">Imperial Banquet Dining Setting</h4>
              <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest">Gilded mahogany and marble</p>
            </div>
          </div>
        </div>

        <!-- Gallery Card 4 -->
        <div class="col-md-6 gsap-reveal">
          <div class="card-luxury relative">
            <div class="lookbook-image-wrapper">
              <img src="assets/img/gurujichair/Aesthetic-Lion-Faced-Guru-Ji-Chair-1.webp" alt="Royal Entrance lobby" class="w-full h-[450px] object-cover">
              <!-- Hotspot -->
              <div class="lookbook-hotspot top-[30%] left-[50%]" data-product-name="Royal Teak Throne" data-product-ref="TC-TK01" data-product-price="Inquire for Price" title="Click to Inquire">
                <span>+</span>
              </div>
            </div>
            <div class="p-6 border-t border-[rgba(197,168,128,0.15)] text-center">
              <h4 class="font-heading text-luxeBlack text-lg">Lobby Statement Seating</h4>
              <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest">Crimson velvet & hand carved teak</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Shared Footer -->
  
<?php include 'footer.php'; ?>
