<?php
$page_title = "Contact Concierge | FurnishHut Flagship Showrooms";
$page_description = "Contact FurnishHut's private concierge. Book a virtual showroom tour or schedule a physical consultation at our Saharanpur head office.";
include 'header.php';
?>

  

  <!-- Banner Header -->
  <section class="relative py-24 bg-luxeCream overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
      <img src="assets/img/Sofa_Set_Design/Brown-Leatherette-Sofa-in-Teak-Wood-YT-401.webp" alt="Contact banner background" class="w-full h-full object-cover ">
      
    </div>
    <div class="container relative z-10 text-center px-4 max-w-3xl">
      <div class="glass-panel py-6 px-8 inline-block border border-[rgba(197,168,128,0.35)] shadow-lg">
        <span class="text-luxeGold text-xs font-semibold tracking-[0.4em] uppercase block mb-2">PRIVATE CLIENT CHANNELS</span>
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-luxeBlack tracking-wide m-0">Connect With Concierge</h1>
      </div>
    </div>
  </section>

  <!-- Contact Coordinates & Booking Simulator -->
  <section class="py-24 bg-luxeCream">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="row g-5">
        <!-- Flags & Hours -->
        <div class="col-lg-5 gsap-reveal-left">
          <span class="text-luxeGold text-xs uppercase tracking-widest font-semibold block mb-2">Flagship Salons</span>
          <h2 class="text-3xl font-heading text-luxeBlack mb-6">Our Coordinates</h2>
          
          <div class="space-y-6 text-sm">
            <div>
              <h4 class="font-heading text-luxeGold text-lg font-semibold">Saharanpur Head Office</h4>
              <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                U.P Saharanpur pin. 247001<br>
                Hours: Mon &ndash; Sat: 10:00 &ndash; 19:00 (Private invitation only)<br>
                Call: +91 90680 47086
              </p>
            </div>
          </div>
        </div>

        <!-- Booking Simulator Calendar Form -->
        <div class="col-lg-7 gsap-reveal-right">
          <div class="glass-panel p-8 md:p-12 border border-[rgba(197,168,128,0.3)]">
            <h3 class="font-heading text-2xl text-luxeGold mb-3 uppercase text-center">Book Salon Consultation</h3>
            <p class="text-xs text-gray-500 text-center uppercase tracking-widest mb-6">Secure a physical or virtual design slot</p>
            
            <form id="contactForm" class="luxury-form row g-3">
              <div class="col-md-6">
                <label class="form-label text-xs uppercase tracking-widest text-luxeGold">Full Name</label>
                <input type="text" name="name" required class="form-control bg-transparent text-luxeBlack border border-[rgba(197,168,128,0.5)] rounded-sm bg-white/50 rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
              </div>
              <div class="col-md-6">
                <label class="form-label text-xs uppercase tracking-widest text-luxeGold">Email</label>
                <input type="email" name="email" required class="form-control bg-transparent text-luxeBlack border border-[rgba(197,168,128,0.5)] rounded-sm bg-white/50 rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
              </div>
              <div class="col-md-6">
                <label class="form-label text-xs uppercase tracking-widest text-luxeGold">Consultation Type</label>
                <select name="type" class="form-select bg-white text-luxeBlack border border-[rgba(197,168,128,0.5)] rounded-sm bg-white/50 rounded-0 px-0 py-2 focus:bg-white focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
                  <option value="virtual">Virtual Zoom Design Session</option>
                  <option value="saharanpur">Saharanpur Head Office In-person</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label text-xs uppercase tracking-widest text-luxeGold">Target Date</label>
                <input type="date" name="date" required class="form-control bg-transparent text-luxeBlack border border-[rgba(197,168,128,0.5)] rounded-sm bg-white/50 rounded-0 px-0 py-2 focus:bg-transparent focus:text-luxeBlack focus:border-b-2 focus:border-luxeGold focus:shadow-none focus:outline-none">
              </div>
              <div class="col-12 mt-4">
                <button type="submit" class="btn-luxury-filled w-full">Request Invitation</button>
              </div>
            </form>
            
            <script>
            document.getElementById('contactForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const name = this.elements['name'].value;
                const email = this.elements['email'].value;
                const type = this.elements['type'].options[this.elements['type'].selectedIndex].text;
                const date = this.elements['date'].value;
                
                let text = "Hello! I would like to book a Salon Consultation.\n\n";
                text += "Name: " + name + "\n";
                text += "Email: " + email + "\n";
                text += "Type: " + type + "\n";
                text += "Target Date: " + date;
                
                const url = "https://wa.me/919068047086?text=" + encodeURIComponent(text);
                window.location.href = url;
            });
            </script>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Shared Footer -->
  
<?php include 'footer.php'; ?>
