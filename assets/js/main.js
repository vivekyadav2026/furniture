document.addEventListener("DOMContentLoaded", () => {
  // 1. Scroll-reveal using IntersectionObserver
  // Elements start fully visible (CSS default opacity:1).
  // JS adds .scroll-hidden ONLY to elements below the fold, then removes on scroll.
  const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -40px 0px' };
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.remove('scroll-hidden');
        revealObserver.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Only hide elements that are below the visible viewport
  const viewportHeight = window.innerHeight;
  document.querySelectorAll('.gsap-reveal, .gsap-reveal-left, .gsap-reveal-right').forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top > viewportHeight) {
      // Element is below the fold — safe to hide and observe
      el.classList.add('scroll-hidden');
      revealObserver.observe(el);
    }
    // Elements already visible (hero, above fold) stay at opacity:1
  });

  // Hero parallax — only if GSAP available
  if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
    gsap.registerPlugin(ScrollTrigger);
    gsap.to(".hero-parallax", {
      scrollTrigger: {
        trigger: ".hero-section",
        start: "top top",
        end: "bottom top",
        scrub: true
      },
      y: 60,
      ease: "none"
    });
  }



  // 2. Before / After Slider Mathematics
  const baContainers = document.querySelectorAll(".before-after-container");
  baContainers.forEach((container) => {
    const afterImg = container.querySelector(".ba-after");
    const handle = container.querySelector(".ba-slider-handle");
    const btn = container.querySelector(".ba-slider-button");
    let isDragging = false;

    const setSliderPosition = (x) => {
      const rect = container.getBoundingClientRect();
      let pos = ((x - rect.left) / rect.width) * 100;
      if (pos < 0) pos = 0;
      if (pos > 100) pos = 100;
      afterImg.style.width = `${pos}%`;
      handle.style.left = `${pos}%`;
    };

    const onStart = () => { isDragging = true; };
    const onEnd = () => { isDragging = false; };
    const onMove = (e) => {
      if (!isDragging) return;
      const clientX = e.touches ? e.touches[0].clientX : e.clientX;
      setSliderPosition(clientX);
    };

    // Event listeners for desktop mouse
    handle.addEventListener("mousedown", onStart);
    window.addEventListener("mouseup", onEnd);
    window.addEventListener("mousemove", onMove);

    // Touch support for mobile
    handle.addEventListener("touchstart", onStart);
    window.addEventListener("touchend", onEnd);
    window.addEventListener("touchmove", onMove);

    // Initial setting click anywhere in container
    container.addEventListener("click", (e) => {
      if (e.target === handle || e.target === btn) return;
      setSliderPosition(e.clientX);
    });
  });

  // 3. Interactive World Map Tooltips
  const markers = document.querySelectorAll(".map-marker");
  markers.forEach((marker) => {
    marker.addEventListener("mouseenter", (e) => {
      const tooltipId = marker.getAttribute("data-tooltip-target");
      const tooltip = document.getElementById(tooltipId);
      if (tooltip) {
        tooltip.style.display = "block";
        tooltip.style.left = `${marker.offsetLeft - 92}px`;
        tooltip.style.top = `${marker.offsetTop - 90}px`;
      }
    });

    marker.addEventListener("mouseleave", (e) => {
      const tooltipId = marker.getAttribute("data-tooltip-target");
      const tooltip = document.getElementById(tooltipId);
      if (tooltip) {
        tooltip.style.display = "none";
      }
    });
  });

  // 4. Slide-out Inquiry Drawer Controls
  const inquiryBtns = document.querySelectorAll(".trigger-inquiry");
  const drawer = document.getElementById("inquiryDrawer");
  const overlay = document.getElementById("drawerOverlay");
  const closeBtn = document.getElementById("drawerClose");

  const openDrawer = () => {
    if (drawer && overlay) {
      drawer.classList.add("active");
      overlay.classList.add("active");
      document.body.style.overflow = "hidden"; // disable background scroll
    }
  };

  const closeDrawer = () => {
    if (drawer && overlay) {
      drawer.classList.remove("active");
      overlay.classList.remove("active");
      document.body.style.overflow = ""; // enable background scroll
    }
  };

  inquiryBtns.forEach(btn => btn.addEventListener("click", openDrawer));
  if (closeBtn) closeBtn.addEventListener("click", closeDrawer);
  if (overlay) overlay.addEventListener("click", closeDrawer);

  // 5. Custom Material Selector Form Logic
  const materialChips = document.querySelectorAll(".material-chip");
  const hiddenMaterialInput = document.getElementById("selectedMaterialInput");

  materialChips.forEach((chip) => {
    chip.addEventListener("click", () => {
      const parent = chip.parentElement;
      const chipsInGroup = parent.querySelectorAll(".material-chip");
      chipsInGroup.forEach(c => c.classList.remove("active"));
      chip.classList.add("active");

      // Save selection value
      if (hiddenMaterialInput) {
        const selectedVal = chip.getAttribute("data-value");
        hiddenMaterialInput.value = selectedVal;
      }
    });
  });

  // 6. Lead Form / Booking Form Simulated Submission (Toast Feedback)
  const forms = document.querySelectorAll(".luxury-form");
  forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      
      // Simulate validation / submission
      const submitBtn = form.querySelector("button[type='submit']");
      const originalText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = "TRANSMITTING INQUIRY...";

      setTimeout(() => {
        // Create custom toast alert
        const toast = document.createElement("div");
        toast.className = "glass-panel text-gold p-3 rounded";
        toast.style.position = "fixed";
        toast.style.bottom = "2rem";
        toast.style.left = "50%";
        toast.style.transform = "translateX(-50%)";
        toast.style.zIndex = "10000";
        toast.style.boxShadow = "0 10px 30px rgba(212, 175, 55, 0.3)";
        toast.style.border = "1px solid var(--gold-primary)";
        toast.innerHTML = `
          <div class="d-flex align-items-center gap-2">
            <span style="font-weight: 600; font-family: var(--font-heading);">INQUIRY SECURED</span>
            <span style="font-size: 0.8rem; color: white;">A concierge representative will call you within 24 hours.</span>
          </div>
        `;

        document.body.appendChild(toast);
        form.reset();
        
        // Reset material choices if exist
        materialChips.forEach(c => c.classList.remove("active"));

        setTimeout(() => {
          toast.remove();
        }, 5000);

        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        
        // If drawer open, close it
        closeDrawer();
      }, 1500);
    });
  });

  // 7. Video Modal Playback Mechanics
  const playBtns = document.querySelectorAll(".video-play-trigger");
  const videoOverlay = document.getElementById("videoOverlay");
  const modalVideoFrame = document.getElementById("modalVideoFrame");

  playBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const videoSrc = btn.getAttribute("data-video-src");
      if (videoOverlay && modalVideoFrame) {
        modalVideoFrame.src = videoSrc;
        videoOverlay.classList.add("active");
      }
    });
  });

  if (videoOverlay) {
    videoOverlay.addEventListener("click", () => {
      videoOverlay.classList.remove("active");
      if (modalVideoFrame) {
        modalVideoFrame.src = ""; // Stop playback
      }
    });
  }

  // 8. Multi-Language Switcher Simulated Data
  const langToggler = document.getElementById("langSelector");
  if (langToggler) {
    langToggler.addEventListener("change", (e) => {
      const selectedLang = e.target.value;
      const languages = {
        en: {
          tagline: "Where Royal Craftsmanship Meets Modern Luxury",
          btnConsult: "Book Consultation",
          explore: "Explore Collection",
        },
        ar: {
          tagline: "حيث تلتقي الحرفية الملكية بالفخامة الحديثة",
          btnConsult: "احجز استشارة",
          explore: "اكتشف المجموعة",
        },
        ru: {
          tagline: "Где королевское мастерство встречается с современной роскошью",
          btnConsult: "Забронировать консультацию",
          explore: "Изучить коллекцию",
        },
        fr: {
          tagline: "Là où l'artisanat royal rencontre le luxe moderne",
          btnConsult: "Réserver une consultation",
          explore: "Explorer la collection",
        }
      };

      const trans = languages[selectedLang] || languages.en;
      
      // Selectively swap primary elements if they exist
      const brandTagline = document.querySelector(".header-tagline");
      const primaryCTA = document.querySelectorAll(".lang-cta-consult");
      const exploreCTA = document.querySelectorAll(".lang-cta-explore");

      if (brandTagline) brandTagline.textContent = trans.tagline;
      primaryCTA.forEach(btn => btn.textContent = trans.btnConsult);
      exploreCTA.forEach(btn => btn.textContent = trans.explore);
      
      // Visual notification
      const langNotice = document.createElement("div");
      langNotice.className = "bg-dark text-white p-2 rounded";
      langNotice.style.position = "fixed";
      langNotice.style.top = "5rem";
      langNotice.style.right = "2rem";
      langNotice.style.zIndex = "10000";
      langNotice.style.fontSize = "0.8rem";
      langNotice.style.border = "1px solid var(--gold-primary)";
      langNotice.textContent = `Language configured to: ${selectedLang.toUpperCase()}`;
      document.body.appendChild(langNotice);
      setTimeout(() => langNotice.remove(), 2500);
    });
  }

  // 9. Hotspot hover tooltips in Lookbook
  const hotspots = document.querySelectorAll(".lookbook-hotspot");
  hotspots.forEach((hs) => {
    hs.addEventListener("click", () => {
      const productName = hs.getAttribute("data-product-name");
      const productPrice = hs.getAttribute("data-product-price");
      
      // Populate and trigger slide drawer with specific info
      const inquiryMessageInput = document.getElementById("inquiryMessageInput");
      if (inquiryMessageInput) {
        inquiryMessageInput.value = `I am interested in bespoke options for the ${productName} (Ref Code: ${hs.getAttribute('data-product-ref')}). Please provide pricing details.`;
      }
      openDrawer();
    });
  });

  // 10. Show/Hide Announcement Bar on Scroll
  const topBar = document.getElementById("topBar");
  const superHeader = document.querySelector(".fh-super-header");
  
  window.addEventListener("scroll", () => {
    if (superHeader) superHeader.classList.remove("nav-hidden"); // Remove any old hide logic
    
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop < 0) scrollTop = 0;
    
    if (scrollTop > 50) {
      if (topBar) topBar.classList.add("hidden-on-scroll");
    } else {
      if (topBar) topBar.classList.remove("hidden-on-scroll");
    }
  });

  // 11. Search Functionality
  const searchBtn = document.querySelector('.fh-search-btn');
  const searchInput = document.querySelector('.fh-search-input');
  if(searchBtn && searchInput) {
    const doSearch = () => {
      const val = searchInput.value.trim();
      if(val) {
        alert("Searching for: " + val + "\\n(Search functionality is active. In a real app, this would filter products or navigate to a search results page.)");
      }
    };
    searchBtn.addEventListener('click', (e) => {
      e.preventDefault();
      doSearch();
    });
    searchInput.addEventListener('keypress', (e) => {
      if(e.key === 'Enter') {
        e.preventDefault();
        doSearch();
      }
    });
  }
});
