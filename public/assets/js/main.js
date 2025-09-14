/**
* Template Name: Active
* Template URL: https://bootstrapmade.com/active-bootstrap-website-template/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    
    // Only proceed if header exists and has the required classes
    if (selectHeader && (selectHeader.classList.contains('scroll-up-sticky') || selectHeader.classList.contains('sticky-top') || selectHeader.classList.contains('fixed-top'))) {
      window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
    }
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
  const body = document.querySelector('body');

  if (mobileNavToggleBtn) {
    function mobileNavToggle() {
      body.classList.toggle('mobile-nav-active');
      mobileNavToggleBtn.classList.toggle('bi-list');
      mobileNavToggleBtn.classList.toggle('bi-x');
    }
    
    mobileNavToggleBtn.addEventListener('click', mobileNavToggle);
    
    // Close mobile nav when clicking on nav links
    const navLinks = document.querySelectorAll('#navmenu a');
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        if (body.classList.contains('mobile-nav-active')) {
          mobileNavToggle();
        }
      });
    });
    
    // Close mobile nav when clicking outside
    document.addEventListener('click', (e) => {
      if (body.classList.contains('mobile-nav-active') && 
          !e.target.closest('#navmenu') && 
          !e.target.closest('.mobile-nav-toggle')) {
        mobileNavToggle();
      }
    });
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  const navmenuLinks = document.querySelectorAll('#navmenu a');
  if (navmenuLinks.length > 0) {
    navmenuLinks.forEach(navmenu => {
      navmenu.addEventListener('click', () => {
        if (document.querySelector('.mobile-nav-active')) {
          // Only call mobileNavToggle if it exists
          if (typeof mobileNavToggle === 'function') {
            mobileNavToggle();
          }
        }
      });
    });
  }

  /**
   * Toggle mobile nav dropdowns
   */
  const navmenuDropdowns = document.querySelectorAll('.navmenu .toggle-dropdown');
  if (navmenuDropdowns.length > 0) {
    navmenuDropdowns.forEach(navmenu => {
      navmenu.addEventListener('click', function(e) {
        e.preventDefault();
        this.parentNode.classList.toggle('active');
        this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
        e.stopImmediatePropagation();
      });
    });
  }

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  if (scrollTop) {
    function toggleScrollTop() {
      if (scrollTop) {
        window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
      }
    }
    
    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);
  }

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        mirror: false
      });
    }
  }
  window.addEventListener('load', aosInit);

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    if (typeof Swiper === 'undefined') return;
    
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      const swiperConfig = swiperElement.querySelector(".swiper-config");
      if (!swiperConfig) return;
      
      try {
        let config = JSON.parse(swiperConfig.innerHTML.trim());

        if (swiperElement.classList.contains("swiper-tab")) {
          initSwiperWithCustomPagination(swiperElement, config);
        } else {
          new Swiper(swiperElement, config);
        }
      } catch (e) {
        console.warn('Invalid swiper config:', e);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Initiate Pure Counter
   */
  if (typeof PureCounter !== 'undefined') {
    new PureCounter();
  }

  /**
   * Init swiper tabs sliders
   */
  function initSwiperTabs() {
    if (typeof Swiper === 'undefined') return;
    
    document
      .querySelectorAll(".init-swiper-tabs")
      .forEach(function(swiperElement) {
        const swiperConfig = swiperElement.querySelector(".swiper-config");
        if (!swiperConfig) return;
        
        try {
          let config = JSON.parse(swiperConfig.innerHTML.trim());

          const dotsContainer = swiperElement
            .closest("section")
            .querySelector(".js-custom-dots");
          if (!dotsContainer) return;

          const customDots = dotsContainer.querySelectorAll("a");

          // Remove the default pagination setting
          delete config.pagination;

          const swiperInstance = new Swiper(swiperElement, config);

          swiperInstance.on("slideChange", function() {
            updateSwiperTabsPagination(swiperInstance, customDots);
          });

          customDots.forEach((dot, index) => {
            dot.addEventListener("click", function(e) {
              e.preventDefault();
              swiperInstance.slideToLoop(index);
              updateSwiperTabsPagination(swiperInstance, customDots);
            });
          });

          updateSwiperTabsPagination(swiperInstance, customDots);
        } catch (e) {
          console.warn('Invalid swiper tabs config:', e);
        }
      });
  }

  function updateSwiperTabsPagination(swiperInstance, customDots) {
    const activeIndex = swiperInstance.realIndex;
    customDots.forEach((dot, index) => {
      if (index === activeIndex) {
        dot.classList.add("active");
      } else {
        dot.classList.remove("active");
      }
    });
  }

  window.addEventListener("load", initSwiperTabs);

  /**
   * Initiate glightbox
   */
  if (typeof GLightbox !== 'undefined') {
    const glightbox = GLightbox({
      selector: '.glightbox'
    });
  }

  /**
   * Init isotope layout and filters
   */
  if (typeof Isotope !== 'undefined' && typeof imagesLoaded !== 'undefined') {
    document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
      let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
      let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
      let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

      let initIsotope;
      imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
        initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
          itemSelector: '.isotope-item',
          layoutMode: layout,
          filter: filter,
          sortBy: sort
        });
      });

      isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
        filters.addEventListener('click', function() {
          const activeFilter = isotopeItem.querySelector('.isotope-filters .filter-active');
          if (activeFilter) {
            activeFilter.classList.remove('filter-active');
          }
          this.classList.add('filter-active');
          
          if (initIsotope) {
            initIsotope.arrange({
              filter: this.getAttribute('data-filter')
            });
            if (typeof aosInit === 'function') {
              aosInit();
            }
          }
        }, false);
      });
    });
  }

})();