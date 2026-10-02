/**
 * Putri Portfolio - High-Performance Interactive Script
 * PixelCraft Redesign — Clean White + Purple Accent
 * Features: Scroll Reveal IntersectionObserver, Capsule Nav Active State,
 * Smooth Scroll, Testimonial Carousel, Light/Dark Mode Switcher,
 * Form Handlers, Toast Notifications, Back-to-Top.
 */

(function () {
  'use strict';

  // Helper query selector shortcuts
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));

  // ==========================================================================
  // 1. Toast Notification Helper
  // ==========================================================================
  function showToast(message, type = 'success') {
    let container = $('#toastContainer');
    if (!container) {
      container = document.createElement('div');
      container.id = 'toastContainer';
      container.className = 'toast-container';
      document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.setAttribute('role', 'status');
    const icon = type === 'success' ? '✨' : '⚠️';
    toast.innerHTML = `<span class="toast-icon">${icon}</span><span class="toast-message">${message}</span>`;
    
    container.appendChild(toast);

    setTimeout(() => {
      toast.style.opacity = '0';
      toast.style.transform = 'translateY(-10px)';
      toast.style.transition = 'all 0.3s ease';
      setTimeout(() => toast.remove(), 350);
    }, 4500);
  }

  // Auto-hide PHP flash toast if present
  const initialToast = $('#toast');
  if (initialToast) {
    setTimeout(() => {
      initialToast.style.opacity = '0';
      initialToast.style.transform = 'translateY(-10px)';
      initialToast.style.transition = 'all 0.3s ease';
      setTimeout(() => initialToast.remove(), 350);
    }, 5000);
  }

  // ==========================================================================
  // 2. Theme Switching (Default: Light, with Dark Mode Option)
  // ==========================================================================
  const themeBtn = $('#themeBtn');
  const themeIcon = $('#themeIcon');

  function updateThemeUI(t) {
    document.documentElement.dataset.theme = t;
    if (themeIcon) {
      themeIcon.textContent = t === 'dark' ? '🌙' : '☀️';
    }
  }

  // Default theme is light, adhering to the reference image
  const currentSavedTheme = localStorage.getItem('tema') || 'light';
  updateThemeUI(currentSavedTheme);

  if (themeBtn) {
    themeBtn.addEventListener('click', () => {
      const nextTheme = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
      updateThemeUI(nextTheme);
      try {
        localStorage.setItem('tema', nextTheme);
      } catch (e) {}
    });
  }

  // ==========================================================================
  // 3. Mobile Navigation Menu Toggle
  // ==========================================================================
  const navToggle = $('#navToggle');
  const navLinks = $('#navLinks');
  if (navToggle && navLinks) {
    navToggle.addEventListener('click', () => {
      const isOpen = navLinks.classList.toggle('open');
      navToggle.setAttribute('aria-expanded', isOpen);
    });

    $$('#navLinks a').forEach(a => {
      a.addEventListener('click', () => {
        navLinks.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // ==========================================================================
  // 4. Scroll Tracking: Capsule Nav Active State, Progress Bar & Back to Top
  // ==========================================================================
  const scrollProgressBar = $('#scrollProgress');
  const backToTopBtn = $('#backToTop');
  const capsuleLinks = $$('.capsule-link');
  const sections = $$('section[id]');

  function handleScroll() {
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) : 0;

    // 1. Scroll Progress Bar
    if (scrollProgressBar) {
      scrollProgressBar.style.width = `${scrollPercent * 100}%`;
    }

    // 2. Back to Top Button
    if (backToTopBtn) {
      if (scrollTop > 350) {
        backToTopBtn.classList.add('visible');
      } else {
        backToTopBtn.classList.remove('visible');
      }
    }

    // 3. Capsule Nav Active Link Highlight
    let currentSectionId = '';
    const scrollPosition = scrollTop + 160;

    sections.forEach(sec => {
      const top = sec.offsetTop;
      const height = sec.offsetHeight;
      if (scrollPosition >= top && scrollPosition < top + height) {
        currentSectionId = sec.getAttribute('id');
      }
    });

    if (currentSectionId) {
      capsuleLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.includes('#' + currentSectionId)) {
          capsuleLinks.forEach(l => l.classList.remove('active'));
          link.classList.add('active');
        }
      });
    }
  }

  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  if (backToTopBtn) {
    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // Smooth scroll for internal hash links
  $$('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      const hashIndex = href.indexOf('#');
      if (hashIndex !== -1) {
        const targetId = href.substring(hashIndex + 1);
        const targetEl = document.getElementById(targetId);
        if (targetEl) {
          e.preventDefault();
          const targetOffset = targetEl.offsetTop - 85;
          window.scrollTo({ top: targetOffset, behavior: 'smooth' });
        }
      }
    });
  });


  // ==========================================================================
  // 6. Filter Kategori & Search Proyek (Catalog Page)
  // ==========================================================================
  const chips = $$('.chip');
  const cards = $$('.project-card, .card[data-kat]');
  const searchInput = $('#cari');
  const clearSearchBtn = $('#clearSearch');
  const emptyState = $('#kosong');
  const displayedCount = $('#displayedCount');
  const resetFilterBtn = $('#resetFilterBtn');

  let currentCategory = 'semua';

  function applyFilter() {
    const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
    let visibleCount = 0;

    cards.forEach(card => {
      const cardKat = card.dataset.kat;
      const cardText = (card.dataset.cari || '').toLowerCase();

      const matchCategory = (currentCategory === 'semua' || cardKat === currentCategory);
      const matchSearch = query === '' || cardText.indexOf(query) > -1;

      const isMatch = matchCategory && matchSearch;
      card.hidden = !isMatch;

      if (isMatch) {
        visibleCount++;
      }
    });

    if (displayedCount) {
      displayedCount.textContent = visibleCount;
    }

    if (emptyState) {
      emptyState.hidden = visibleCount > 0;
    }

    if (clearSearchBtn && searchInput) {
      clearSearchBtn.hidden = searchInput.value.length === 0;
    }
  }

  chips.forEach(chip => {
    chip.addEventListener('click', () => {
      chips.forEach(c => c.classList.remove('active'));
      chip.classList.add('active');
      currentCategory = chip.dataset.kat || 'semua';
      applyFilter();
    });
  });

  if (searchInput) {
    searchInput.addEventListener('input', applyFilter);
  }

  if (clearSearchBtn && searchInput) {
    clearSearchBtn.addEventListener('click', () => {
      searchInput.value = '';
      applyFilter();
      searchInput.focus();
    });
  }

  if (resetFilterBtn) {
    resetFilterBtn.addEventListener('click', () => {
      if (searchInput) searchInput.value = '';
      chips.forEach(c => c.classList.remove('active'));
      const allChip = $('.chip[data-kat="semua"]');
      if (allChip) allChip.classList.add('active');
      currentCategory = 'semua';
      applyFilter();
    });
  }

  // ==========================================================================
  // 7. Contact Form Live Character Counter & Validation
  // ==========================================================================
  const messageTextarea = $('#pesan') || $('#isi');
  const charCounter = $('#hitung');
  const charProgress = $('#charProgress');

  if (messageTextarea) {
    function updateCharCount() {
      const length = messageTextarea.value.length;
      if (charCounter) charCounter.textContent = length;
      if (charProgress) {
        const percent = Math.min((length / 1000) * 100, 100);
        charProgress.style.width = `${percent}%`;
      }
    }

    messageTextarea.addEventListener('input', updateCharCount);
    updateCharCount();
  }

  // ==========================================================================
  // 8. Scroll Reveal — IntersectionObserver for card animations
  // ==========================================================================
  const revealTargets = $$(
    '.service-frosted-card, .work-showcase-card, .testimonial-frosted-card, .process-step-card, .tool-tile-item'
  );

  if ('IntersectionObserver' in window && revealTargets.length > 0) {
    const revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
            revealObserver.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.08,
        rootMargin: '0px 0px -40px 0px',
      }
    );

    revealTargets.forEach(el => revealObserver.observe(el));
  } else {
    // Fallback: reveal all immediately
    revealTargets.forEach(el => el.classList.add('revealed'));
  }

})();
