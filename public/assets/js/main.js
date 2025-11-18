/**
 * Hotel Pasundan - Main JavaScript
 * Modern, Interactive, and Performant
 */

// ===================================
// UTILITY FUNCTIONS
// ===================================

const $ = (selector) => document.querySelector(selector);
const $$ = (selector) => document.querySelectorAll(selector);

const debounce = (func, wait) => {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
};

const throttle = (func, limit) => {
  let inThrottle;
  return function(...args) {
    if (!inThrottle) {
      func.apply(this, args);
      inThrottle = true;
      setTimeout(() => inThrottle = false, limit);
    }
  };
};

// ===================================
// NAVBAR FUNCTIONALITY
// ===================================

class Navbar {
  constructor() {
    this.navbar = $('.navbar');
    this.toggle = $('.navbar-toggle');
    this.menu = $('.navbar-menu');
    this.links = $$('.navbar-link');
    
    this.init();
  }

  init() {
    if (!this.navbar) return;

    // Scroll effect
    window.addEventListener('scroll', throttle(() => {
      if (window.scrollY > 50) {
        this.navbar.classList.add('scrolled');
      } else {
        this.navbar.classList.remove('scrolled');
      }
    }, 100));

    // Mobile menu toggle
    if (this.toggle) {
      this.toggle.addEventListener('click', () => {
        this.menu.classList.toggle('active');
        this.toggle.classList.toggle('active');
      });
    }

    // Close menu on link click (mobile)
    this.links.forEach(link => {
      link.addEventListener('click', () => {
        if (window.innerWidth <= 768) {
          this.menu.classList.remove('active');
          this.toggle.classList.remove('active');
        }
      });
    });

    // Active link based on scroll position
    this.setActiveLink();
    window.addEventListener('scroll', throttle(() => this.setActiveLink(), 200));
  }

  setActiveLink() {
    const sections = $$('section[id]');
    const scrollY = window.pageYOffset;

    sections.forEach(section => {
      const sectionHeight = section.offsetHeight;
      const sectionTop = section.offsetTop - 100;
      const sectionId = section.getAttribute('id');
      const link = $(`.navbar-link[href*="${sectionId}"]`);

      if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
        this.links.forEach(l => l.classList.remove('active'));
        if (link) link.classList.add('active');
      }
    });
  }
}

// ===================================
// SMOOTH SCROLL
// ===================================

class SmoothScroll {
  constructor() {
    this.init();
  }

  init() {
    $$('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', (e) => {
        const href = anchor.getAttribute('href');
        if (href === '#') return;

        e.preventDefault();
        const target = $(href);
        
        if (target) {
          const offsetTop = target.offsetTop - 80;
          window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
          });
        }
      });
    });
  }
}

// ===================================
// LAZY LOADING IMAGES
// ===================================

class LazyLoader {
  constructor() {
    this.images = $$('img[data-src]');
    this.init();
  }

  init() {
    if ('IntersectionObserver' in window) {
      const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            this.loadImage(img);
            observer.unobserve(img);
          }
        });
      }, {
        rootMargin: '50px'
      });

      this.images.forEach(img => imageObserver.observe(img));
    } else {
      // Fallback for older browsers
      this.images.forEach(img => this.loadImage(img));
    }
  }

  loadImage(img) {
    const src = img.getAttribute('data-src');
    if (!src) return;

    img.src = src;
    img.classList.add('loaded');
    img.removeAttribute('data-src');
  }
}

// ===================================
// ANIMATED COUNTER
// ===================================

class AnimatedCounter {
  constructor() {
    this.counters = $$('.stat-number');
    this.init();
  }

  init() {
    if (!this.counters.length) return;

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          this.animateCounter(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    this.counters.forEach(counter => {
      counter.closest('.stat-item').style.opacity = '0';
      observer.observe(counter);
    });
  }

  animateCounter(element) {
    const target = element.textContent;
    const isPlus = target.includes('+');
    const number = parseInt(target.replace(/\D/g, ''));
    const duration = 2000;
    const increment = number / (duration / 16);
    let current = 0;

    element.closest('.stat-item').style.opacity = '1';
    element.closest('.stat-item').style.transition = 'opacity 0.5s ease';

    const updateCounter = () => {
      current += increment;
      if (current < number) {
        element.textContent = Math.floor(current) + (isPlus ? '+' : '');
        requestAnimationFrame(updateCounter);
      } else {
        element.textContent = target;
      }
    };

    updateCounter();
  }
}

// ===================================
// TESTIMONIAL SLIDER
// ===================================

class TestimonialSlider {
  constructor() {
    this.slider = $('.testimonial-slider');
    if (!this.slider) return;

    this.track = this.slider.querySelector('.testimonial-track');
    this.slides = this.slider.querySelectorAll('.testimonial-card');
    this.dotsContainer = this.slider.querySelector('.testimonial-controls');
    
    this.currentIndex = 0;
    this.autoplayInterval = null;
    
    this.init();
  }

  init() {
    if (!this.slides.length) return;

    // Create dots
    this.createDots();
    
    // Auto play
    this.startAutoplay();

    // Pause on hover
    this.slider.addEventListener('mouseenter', () => this.stopAutoplay());
    this.slider.addEventListener('mouseleave', () => this.startAutoplay());

    // Touch support
    this.addTouchSupport();
  }

  createDots() {
    this.slides.forEach((_, index) => {
      const dot = document.createElement('div');
      dot.classList.add('testimonial-dot');
      if (index === 0) dot.classList.add('active');
      dot.addEventListener('click', () => this.goToSlide(index));
      this.dotsContainer.appendChild(dot);
    });
    this.dots = this.dotsContainer.querySelectorAll('.testimonial-dot');
  }

  goToSlide(index) {
    this.currentIndex = index;
    this.track.style.transform = `translateX(-${index * 100}%)`;
    
    this.dots.forEach((dot, i) => {
      dot.classList.toggle('active', i === index);
    });
  }

  nextSlide() {
    this.currentIndex = (this.currentIndex + 1) % this.slides.length;
    this.goToSlide(this.currentIndex);
  }

  prevSlide() {
    this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
    this.goToSlide(this.currentIndex);
  }

  startAutoplay() {
    this.autoplayInterval = setInterval(() => this.nextSlide(), 5000);
  }

  stopAutoplay() {
    if (this.autoplayInterval) {
      clearInterval(this.autoplayInterval);
    }
  }

  addTouchSupport() {
    let startX = 0;
    let currentX = 0;

    this.slider.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
      this.stopAutoplay();
    });

    this.slider.addEventListener('touchmove', (e) => {
      currentX = e.touches[0].clientX;
    });

    this.slider.addEventListener('touchend', () => {
      const diff = startX - currentX;
      if (Math.abs(diff) > 50) {
        if (diff > 0) {
          this.nextSlide();
        } else {
          this.prevSlide();
        }
      }
      this.startAutoplay();
    });
  }
}

// ===================================
// GALLERY LIGHTBOX
// ===================================

class GalleryLightbox {
  constructor() {
    this.galleryItems = $$('.gallery-item');
    this.lightbox = null;
    this.currentIndex = 0;
    this.images = [];
    
    this.init();
  }

  init() {
    if (!this.galleryItems.length) return;

    // Create lightbox
    this.createLightbox();

    // Add click handlers
    this.galleryItems.forEach((item, index) => {
      const img = item.querySelector('img');
      if (img) {
        this.images.push({
          src: img.src,
          alt: img.alt || 'Gallery Image'
        });

        item.addEventListener('click', () => {
          this.currentIndex = index;
          this.openLightbox();
        });
      }
    });
  }

  createLightbox() {
    this.lightbox = document.createElement('div');
    this.lightbox.className = 'lightbox';
    this.lightbox.innerHTML = `
      <div class="lightbox-content">
        <div class="lightbox-close">×</div>
        <img class="lightbox-image" src="" alt="">
        <div class="lightbox-nav lightbox-prev">‹</div>
        <div class="lightbox-nav lightbox-next">›</div>
      </div>
    `;
    document.body.appendChild(this.lightbox);

    // Event listeners
    this.lightbox.querySelector('.lightbox-close').addEventListener('click', () => this.closeLightbox());
    this.lightbox.querySelector('.lightbox-prev').addEventListener('click', (e) => {
      e.stopPropagation();
      this.prevImage();
    });
    this.lightbox.querySelector('.lightbox-next').addEventListener('click', (e) => {
      e.stopPropagation();
      this.nextImage();
    });
    this.lightbox.addEventListener('click', (e) => {
      if (e.target === this.lightbox) this.closeLightbox();
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (!this.lightbox.classList.contains('active')) return;
      
      if (e.key === 'Escape') this.closeLightbox();
      if (e.key === 'ArrowLeft') this.prevImage();
      if (e.key === 'ArrowRight') this.nextImage();
    });
  }

  openLightbox() {
    this.updateImage();
    this.lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  closeLightbox() {
    this.lightbox.classList.remove('active');
    document.body.style.overflow = '';
  }

  updateImage() {
    const img = this.lightbox.querySelector('.lightbox-image');
    img.src = this.images[this.currentIndex].src;
    img.alt = this.images[this.currentIndex].alt;
  }

  nextImage() {
    this.currentIndex = (this.currentIndex + 1) % this.images.length;
    this.updateImage();
  }

  prevImage() {
    this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
    this.updateImage();
  }
}

// ===================================
// GALLERY FILTER
// ===================================

class GalleryFilter {
  constructor() {
    this.filterBtns = $$('.filter-btn');
    this.galleryItems = $$('.gallery-item');
    
    this.init();
  }

  init() {
    if (!this.filterBtns.length) return;

    this.filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const filter = btn.getAttribute('data-filter');
        
        // Update active button
        this.filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        // Filter items
        this.filterItems(filter);
      });
    });
  }

  filterItems(filter) {
    this.galleryItems.forEach(item => {
      const category = item.getAttribute('data-category');
      
      if (filter === 'all' || category === filter) {
        item.style.display = 'block';
        item.style.animation = 'fadeIn 0.5s ease';
      } else {
        item.style.display = 'none';
      }
    });
  }
}

// ===================================
// SCROLL ANIMATIONS
// ===================================

class ScrollAnimations {
  constructor() {
    this.elements = $$('[class*="animate-"]');
    this.init();
  }

  init() {
    if (!this.elements.length) return;

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });

    this.elements.forEach(el => {
      el.style.opacity = '0';
      observer.observe(el);
    });
  }
}

// ===================================
// PARALLAX EFFECT
// ===================================

class ParallaxEffect {
  constructor() {
    this.parallaxElements = $$('[data-parallax]');
    this.init();
  }

  init() {
    if (!this.parallaxElements.length) return;

    window.addEventListener('scroll', throttle(() => {
      const scrolled = window.pageYOffset;

      this.parallaxElements.forEach(el => {
        const speed = el.getAttribute('data-parallax') || 0.5;
        const yPos = -(scrolled * speed);
        el.style.transform = `translateY(${yPos}px)`;
      });
    }, 10));
  }
}

// ===================================
// FORM VALIDATION
// ===================================

class FormValidator {
  constructor() {
    this.forms = $$('form');
    this.init();
  }

  init() {
    this.forms.forEach(form => {
      form.addEventListener('submit', (e) => {
        if (!this.validateForm(form)) {
          e.preventDefault();
        }
      });

      // Real-time validation
      const inputs = form.querySelectorAll('input, textarea');
      inputs.forEach(input => {
        input.addEventListener('blur', () => this.validateField(input));
      });
    });
  }

  validateForm(form) {
    let isValid = true;
    const inputs = form.querySelectorAll('input[required], textarea[required]');

    inputs.forEach(input => {
      if (!this.validateField(input)) {
        isValid = false;
      }
    });

    return isValid;
  }

  validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let message = '';

    if (field.hasAttribute('required') && !value) {
      isValid = false;
      message = 'Field ini wajib diisi';
    } else if (field.type === 'email' && value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) {
        isValid = false;
        message = 'Email tidak valid';
      }
    }

    this.showFieldError(field, isValid, message);
    return isValid;
  }

  showFieldError(field, isValid, message) {
    const existingError = field.parentElement.querySelector('.field-error');
    if (existingError) existingError.remove();

    if (!isValid) {
      field.style.borderColor = '#ef4444';
      const error = document.createElement('div');
      error.className = 'field-error';
      error.style.color = '#ef4444';
      error.style.fontSize = '0.875rem';
      error.style.marginTop = '0.25rem';
      error.textContent = message;
      field.parentElement.appendChild(error);
    } else {
      field.style.borderColor = '';
    }
  }
}

// ===================================
// HERO IMAGE LOADER
// ===================================

class HeroImageLoader {
  constructor() {
    this.heroBg = $('.hero-bg');
    this.init();
  }

  init() {
    if (!this.heroBg) return;

    const img = new Image();
    img.onload = () => {
      this.heroBg.classList.add('loaded');
    };
    img.src = this.heroBg.src;
  }
}

// ===================================
// WHATSAPP BUTTON
// ===================================

class WhatsAppButton {
  constructor() {
    this.createButton();
  }

  createButton() {
    const phone = '6281234567890'; // Update with actual number
    const message = 'Halo Hotel Pasundan, saya ingin bertanya tentang...';
    const url = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;

    const button = document.createElement('a');
    button.href = url;
    button.target = '_blank';
    button.className = 'whatsapp-float';
    button.innerHTML = `
      <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 0C7.164 0 0 7.164 0 16c0 2.825.738 5.488 2.031 7.794L.05 31.95l8.344-2.012A15.923 15.923 0 0016 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm0 29.333c-2.544 0-4.944-.706-6.981-1.931l-.5-.3-5.181 1.25 1.3-4.756-.331-.519A13.267 13.267 0 012.667 16c0-7.363 5.969-13.333 13.333-13.333S29.333 8.637 29.333 16 23.363 29.333 16 29.333z"/>
        <path d="M23.094 19.525c-.394-.2-2.331-1.15-2.694-1.281-.362-.131-.625-.2-.888.2-.262.4-1.019 1.281-1.25 1.544-.231.262-.462.294-.856.094-.394-.2-1.663-.613-3.169-1.956-1.169-1.044-1.956-2.331-2.188-2.725-.231-.394-.025-.606.175-.8.181-.175.394-.462.594-.694.2-.231.262-.394.394-.656.131-.262.069-.494-.031-.694-.1-.2-.888-2.137-1.219-2.925-.319-.769-.644-.663-.888-.675-.231-.012-.494-.012-.756-.012s-.694.1-1.056.494c-.362.394-1.381 1.35-1.381 3.294s1.413 3.819 1.613 4.081c.2.262 2.825 4.313 6.844 6.05.956.413 1.7.656 2.281.844.956.3 1.831.256 2.519.156.769-.113 2.331-.956 2.663-1.875.331-.919.331-1.706.231-1.875-.1-.169-.362-.269-.756-.469z"/>
      </svg>
    `;
    document.body.appendChild(button);
  }
}

// ===================================
// PERFORMANCE OPTIMIZATION
// ===================================

// Preload critical images
const preloadImages = () => {
  const criticalImages = [
    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1920&q=80'
  ];

  criticalImages.forEach(src => {
    const link = document.createElement('link');
    link.rel = 'preload';
    link.as = 'image';
    link.href = src;
    document.head.appendChild(link);
  });
};

// ===================================
// INITIALIZATION
// ===================================

document.addEventListener('DOMContentLoaded', () => {
  // Initialize all components
  new Navbar();
  new SmoothScroll();
  new LazyLoader();
  new AnimatedCounter();
  new TestimonialSlider();
  new GalleryLightbox();
  new GalleryFilter();
  new ScrollAnimations();
  new ParallaxEffect();
  new FormValidator();
  new HeroImageLoader();
  new WhatsAppButton();

  // Preload critical resources
  preloadImages();

  // Remove loading class
  document.body.classList.remove('loading');
});

// Handle page visibility for performance
document.addEventListener('visibilitychange', () => {
  if (document.hidden) {
    // Pause animations when tab is not visible
    console.log('Page hidden - pausing animations');
  } else {
    // Resume animations when tab is visible
    console.log('Page visible - resuming animations');
  }
});

// Export for use in other scripts if needed
window.HotelPasundan = {
  Navbar,
  SmoothScroll,
  LazyLoader,
  AnimatedCounter,
  TestimonialSlider,
  GalleryLightbox,
  GalleryFilter,
  ScrollAnimations,
  ParallaxEffect,
  FormValidator
};
