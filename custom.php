<?php
$page_title = "Bespoke Custom Furniture | FurnishHut Luxury Interiors";
$page_description = "Design your own custom furniture with FurnishHut. Choose seasoned teak wood, 24K gold foil gilding, and European velvet fabrics for custom luxury fittings.";
include 'header.php';
?>

  


  <!-- Banner Header -->
  <section class="relative py-24 bg-luxeCream overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
      <img src="assets/img/Sofa_Set_Design/Carved-Sofa-Set-Design-C-jpg.webp" alt="Bespoke Studio background" class="w-full h-full object-cover ">
      
    </div>
    <div class="container relative z-10 text-center px-4 max-w-3xl">
      <div class="glass-panel py-6 px-8 inline-block border border-[rgba(197,168,128,0.35)] shadow-lg">
        <span class="text-luxeGold text-xs font-semibold tracking-[0.4em] uppercase block mb-2">BESPOKE WORKSHOP</span>
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-luxeBlack tracking-wide m-0">Custom Luxury Interiors</h1>
      </div>
    </div>
  </section>

  <!-- Selection Configurator Showcase -->
  <section class="py-24 bg-luxeCream">
    <div class="container mx-auto px-4 max-w-5xl">
      <div class="row g-5">
        <div class="col-lg-6 gsap-reveal-left">
          <span class="text-luxeGold text-xs tracking-widest uppercase font-semibold block mb-2">Configure Heritage</span>
          <h2 class="text-3xl md:text-4xl font-heading text-luxeBlack mb-6">Select Materials Worthy of Royal Homes</h2>
          <p class="text-sm leading-relaxed mb-6">
            FurnishHut empowers client estate owners and luxury architects to customize every design element. Select the specific hardwood timber, real gold foil weight, and fine fabrics to match your salon layout.
          </p>

          <div class="space-y-6 mt-8">
            <div>
              <span class="text-xs uppercase text-luxeGold tracking-widest block mb-2 font-semibold">1. Hardwood Timber Selection</span>
              <div class="flex flex-wrap gap-2">
                <span class="material-chip active">Burmese Teak (High Oil, Outdoor resilient)</span>
                <span class="material-chip">Indian Rosewood (Rich dark swirls)</span>
                <span class="material-chip">African Mahogany (Sleek contemporary grain)</span>
              </div>
            </div>

            <div>
              <span class="text-xs uppercase text-luxeGold tracking-widest block mb-2 font-semibold">2. Gilding Foil Plating</span>
              <div class="flex flex-wrap gap-2">
                <span class="material-chip active">24K Italian Gold Leaf</span>
                <span class="material-chip">Antique Bronze Patina</span>
                <span class="material-chip">Champagne Chrome Foil</span>
              </div>
            </div>

            <div>
              <span class="text-xs uppercase text-luxeGold tracking-widest block mb-2 font-semibold">3. European Fabrics Selection</span>
              <div class="flex flex-wrap gap-2">
                <span class="material-chip active">Royal Cotton Velvet</span>
                <span class="material-chip">French Silk Brocade</span>
                <span class="material-chip">Aniline Italian Full Hide Leather</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Side: Configurator form -->
        <div class="col-lg-6 gsap-reveal-right">
          <div class="glass-panel p-8 border border-[rgba(197,168,128,0.3)]">
            <h3 class="font-heading text-2xl text-luxeGold mb-2 uppercase text-center">Bespoke Blueprint Request</h3>
            <p class="text-[10px] text-zinc-500 text-center uppercase tracking-widest mb-6">Get hand-drawn drafts from our chief designer</p>
            
            <form class="luxury-form row g-3">
              <input type="hidden" name="materials_chosen" value="Burmese Teak / 24K Gold Leaf / Cotton Velvet">
              
              <div class="col-12">
                <label class="form-label text-xs uppercase text-luxeGold tracking-widest">Full Name</label>
                <input type="text" required class="form-control bg-transparent text-luxeBlack border border-[rgba(197,168,128,0.5)] rounded-sm bg-white/50 rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
              </div>
              <div class="col-md-6">
                <label class="form-label text-xs uppercase text-luxeGold tracking-widest">Contact Number</label>
                <input type="tel" required class="form-control bg-transparent text-luxeBlack border border-[rgba(197,168,128,0.5)] rounded-sm bg-white/50 rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
              </div>
              <div class="col-md-6">
                <label class="form-label text-xs uppercase text-luxeGold tracking-widest">Room Dimensions</label>
                <input type="text" placeholder="e.g. 5m x 6m" class="form-control bg-transparent text-luxeBlack border border-[rgba(197,168,128,0.5)] rounded-sm bg-white/50 rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
              </div>
              <div class="col-12">
                <label class="form-label text-xs uppercase text-luxeGold tracking-widest">Scope of Work</label>
                <textarea rows="3" required placeholder="Outline bedroom set, sofa layout, pooja mandir width, or complete room architectural remodeling needs..." class="form-control bg-transparent text-luxeBlack border border-[rgba(197,168,128,0.5)] rounded-sm bg-white/50 rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:outline-none"></textarea>
              </div>
              <div class="col-12 mt-4">
                <button type="submit" class="btn-luxury-filled w-full">Request Digital Blueprint</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Process Timeline repeats here -->
  <section class="py-24 bg-white border-t border-[rgba(197,168,128,0.25)]">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="text-center mb-16">
        <span class="text-luxeGold text-xs tracking-widest uppercase block mb-2 font-semibold">The Journey</span>
        <h2 class="text-3xl font-heading text-luxeBlack">From Sketch to Sovereign Placement</h2>
        <div class="w-16 h-[1px] bg-luxeGold mx-auto mt-4"></div>
      </div>

      <div class="row g-4 text-center">
        <div class="col-md-3">
          <h4 class="font-heading text-luxeGold text-lg mb-2">Step 01: Consult</h4>
          <p class="text-xs text-gray-500">A private chat to examine floorplans, interior sizing, and wood preferences.</p>
        </div>
        <div class="col-md-3">
          <h4 class="font-heading text-luxeGold text-lg mb-2">Step 02: Blueprint</h4>
          <p class="text-xs text-gray-500">We construct 3D renders and detailed hand-carving drawings for approval.</p>
        </div>
        <div class="col-md-3">
          <h4 class="font-heading text-luxeGold text-lg mb-2">Step 03: Carving</h4>
          <p class="text-xs text-gray-500">Our master sculptors carve and gild Burmese Teak structures by hand.</p>
        </div>
        <div class="col-md-3">
          <h4 class="font-heading text-luxeGold text-lg mb-2">Step 04: Install</h4>
          <p class="text-xs text-gray-500">Reinforced ocean-crate shipping and manual placement in your estate.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Shared Footer -->
  
<?php include 'footer.php'; ?>
