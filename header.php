<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($page_title) ? $page_title : "FurnishHut"; ?></title>
  <meta name="description" content="<?php echo isset($page_description) ? $page_description : ""; ?>">
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts Preload -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- Tailwind CSS Play CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            luxeGold:     '#C5A880',
            luxeMaroon:   '#8B1C31',
            luxeBlack:    '#1A1410',
            luxeCharcoal: '#2C2420',
            luxeCream:    '#FDFBF7'
          },
          fontFamily: {
            heading: ['Cormorant Garamond', 'Playfair Display', 'Georgia', 'serif'],
            body:    ['DM Sans', 'Montserrat', 'system-ui', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-luxeCream text-luxeBlack">


  <!-- ========================================
       PREMIUM 3-PART NAVBAR
       ======================================== -->

    <!-- ========================================
       PREMIUM 3-PART NAVBAR
       ======================================== -->

    <!-- ========================================
       PREMIUM 3-PART NAVBAR
       ======================================== -->

    <!-- ========================================
       PREMIUM 3-PART NAVBAR
       ======================================== -->
  <header class="fh-super-header">
    <!-- PART 1: Top Announcement Strip (Maroon) -->
    <div id="topBar" style="background:#7B1C2E; padding:7px 0; overflow:hidden; position:relative;">
      <div class="marquee-track" style="display:flex; white-space:nowrap; animation: marqueeScroll 28s linear infinite;">
        <span style="color:#fff; font-size:10px; letter-spacing:0.28em; text-transform:uppercase; font-family:'DM Sans',sans-serif; font-weight:500; padding:0 3rem;">
          ✦ &nbsp; Luxury Handcrafted Furniture &nbsp;&nbsp;|&nbsp;&nbsp; 100% Solid Teak &amp; Rosewood &nbsp;&nbsp;|&nbsp;&nbsp; Custom Designs Available &nbsp;&nbsp;|&nbsp;&nbsp; 📞 +91-98765-43210 &nbsp;&nbsp;|&nbsp;&nbsp; Global Delivery Available &nbsp;&nbsp;|&nbsp;&nbsp; Palace-Grade Artistry Since 2004 &nbsp;&nbsp;|
        </span>
        <span style="color:#fff; font-size:10px; letter-spacing:0.28em; text-transform:uppercase; font-family:'DM Sans',sans-serif; font-weight:500; padding:0 3rem;">
          ✦ &nbsp; Luxury Handcrafted Furniture &nbsp;&nbsp;|&nbsp;&nbsp; 100% Solid Teak &amp; Rosewood &nbsp;&nbsp;|&nbsp;&nbsp; Custom Designs Available &nbsp;&nbsp;|&nbsp;&nbsp; 📞 +91-98765-43210 &nbsp;&nbsp;|&nbsp;&nbsp; Global Delivery Available &nbsp;&nbsp;|&nbsp;&nbsp; Palace-Grade Artistry Since 2004 &nbsp;&nbsp;|
        </span>
      </div>
    </div>

    <!-- PART 2: Main Header (White bg — Logo + Search + Icons + CTA) -->
    <div id="mainHeader" style="background:#fff; border-bottom:2px solid #ede5d8; padding:8px 0;">
      <div class="fh-header-inner">

        <!-- FurnishHut Logo Image -->
        <a href="index.php" class="fh-logo-link">
          <img src="assets/img/logo.png" alt="FurnishHut - Quality You Can Feel" class="fh-logo-img">
        </a>

        <!-- Premium Search Bar -->
        <div class="fh-search-bar">
          <div class="fh-search-select-wrap">
            <select id="catSearch" class="fh-search-select">
              <option>All Categories</option>
              <option>Royal Beds</option>
              <option>Sofa Sets</option>
              <option>Console Tables</option>
              <option>Dining Sets</option>
              <option>Accent Chairs</option>
              <option>Centre Tables</option>
              <option>Swings</option>
              <option>Mirrors</option>
              <option>Pooja Mandirs</option>
              <option>Rocking Chairs</option>
              <option>Designer Doors</option>
              <option>Partitions</option>
              <option>Guruji Chair</option>
              <option>Office Furniture</option>
              <option>Study Tables</option>
            </select>
            <svg class="fh-select-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1l4 4 4-4" stroke="#7B1C2E" stroke-width="1.5" stroke-linecap="round"/></svg>
          </div>
          <div class="fh-search-divider"></div>
          <input type="text" placeholder="Search sofas, beds, dining sets, mandirs..." class="fh-search-input" />
          <button class="fh-search-btn" aria-label="Search">
            <svg width="17" height="17" fill="none" stroke="#ffffff" stroke-width="2.2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
          </button>
        </div>

        <!-- Icon Actions -->
        <div class="fh-header-right">
          <a href="contact.php" class="fh-icon-link">
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Account</span>
          </a>
          <a href="https://wa.me/919876543210" target="_blank" class="fh-icon-link">
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            <span>Wishlist</span>
          </a>
          <a href="tel:+919876543210" class="fh-icon-link">
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.13 12 19.79 19.79 0 0 1 1.08 3.18 2 2 0 0 1 3.06 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 8.91A16 16 0 0 0 13 14.82l1.27-1.27a2 2 0 0 1 2.11-.45c.907.34 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <span>Call Us</span>
          </a>
          <a href="contact.php" class="fh-quote-btn">Get Quote</a>
          <button class="fh-hamburger" id="fhHamburger" aria-label="Menu" onclick="var m=document.getElementById('fhMobileNav');m.classList.toggle('open');">
            <span></span><span></span><span></span>
          </button>
        </div>
      </div>
    </div>

        <!-- Mobile menu -->
      <div id="fhMobileNav" style="display:none; background:#7B1C2E; flex-direction:column; padding:0.5rem 1.2rem 1rem;">
        <a href="index.php" class="fh-mob-link">Home</a>
        <a href="bedroom.php" class="fh-mob-link">Bed</a>
        <a href="sofa.php" class="fh-mob-link">Sofa</a>
        <a href="dining.php" class="fh-mob-link">Dining</a>
        <a href="throne.php" class="fh-mob-link">Chair</a>
        <a href="custom.php" class="fh-mob-link">Custom Order</a>
        <a href="partition.php" class="fh-mob-link">Partitions</a>
        <a href="mirrors.php" class="fh-mob-link">Mirrors</a>
        <a href="collections.php" class="fh-mob-link">All Collections</a>
        <a href="contact.php" class="fh-mob-link" style="border-bottom:none;">Contact</a>
      </div>
  </header>

    <!-- PART 3: Bottom Category Nav Strip (Maroon) -->
    <div id="bottomNav" style="background:#7B1C2E; border-bottom:2px solid #C5A880;">
      <div class="fh-bottom-nav-inner" id="fhDesktopNav">
        <div class="fh-nav-item"><a href="index.php">Home</a></div>
        <div class="fh-nav-item fh-has-drop">
          <a href="bedroom.php">Bed </a>
        </div>
        <div class="fh-nav-item fh-has-drop">
          <a href="sofa.php">Sofa </a>
        </div>
        <div class="fh-nav-item"><a href="console.php">Console Table</a></div>
        <div class="fh-nav-item fh-has-drop">
          <a href="dining.php">Dining </a>
        </div>
        <div class="fh-nav-item fh-has-drop">
          <a href="throne.php">Chair </a>
        </div>
        <div class="fh-nav-item"><a href="swing.php">Swing</a></div>
        <div class="fh-nav-item"><a href="partition.php">Partitions</a></div>
        <div class="fh-nav-item"><a href="mirrors.php">Mirrors</a></div>
        <div class="fh-nav-item"><a href="mandir.php">Mandir</a></div>
        <div class="fh-nav-item"><a href="doors.php">Doors</a></div>
        <div class="fh-nav-item fh-has-drop">
          <a href="collections.php">More </a>
          <div class="fh-dropdown">
            <a href="partition.php">Partition Designs</a>
            <a href="office.php">Office Furniture</a>
            <a href="study.php">Study Tables</a>
            <a href="gallery.php">Lookbook</a>
            <a href="projects.php">Projects</a>
            <a href="blog.php">Blog</a>
          </div>
        </div>
        <div class="fh-nav-item fh-nav-right"><a href="about.php">About</a></div>
        <div class="fh-nav-item"><a href="contact.php">Contact</a></div>
      </div>

    </div>