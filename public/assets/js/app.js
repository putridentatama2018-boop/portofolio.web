/**
 * PixelCraft Portfolio - Clean & Lightweight Interactive Script
 */

(function () {
  'use strict';

  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));

  // 1. Toast & Flash notifications disabled as requested
  function showToast() { /* Notifications disabled */ }
  window.showToast = showToast;

  // 2. Mobile Menu Toggle
  const navToggle = $('#navToggle');
  const navLinks = $('#navLinks');
  if (navToggle && navLinks) {
    navToggle.addEventListener('click', () => {
      const isBlock = navLinks.style.display === 'flex';
      navLinks.style.display = isBlock ? 'none' : 'flex';
      navLinks.style.flexDirection = 'column';
      navLinks.style.position = 'absolute';
      navLinks.style.top = '100%';
      navLinks.style.left = '0';
      navLinks.style.width = '100%';
      navLinks.style.background = 'var(--bg-card)';
      navLinks.style.backdropFilter = 'blur(20px)';
      navLinks.style.borderRadius = '20px';
      navLinks.style.padding = '1.25rem';
      navLinks.style.marginTop = '0.5rem';
      navLinks.style.border = '1px solid var(--border-glass)';
      navLinks.style.boxShadow = 'var(--shadow-card)';
    });

    $$('#navLinks a').forEach(a => {
      a.addEventListener('click', () => {
        if (window.innerWidth <= 768) {
          navLinks.style.display = 'none';
        }
      });
    });
  }

  // 2b. Theme Switcher (Light Soft Lilac <-> Dark Cyber Violet)
  const themeBtn = $('#themeBtn');
  const themeBtnIcon = $('#themeBtnIcon');
  if (themeBtn) {
    const updateThemeIcon = (theme) => {
      if (themeBtnIcon) {
        themeBtnIcon.textContent = theme === 'dark' ? '☀️' : '🌙';
      }
      themeBtn.setAttribute('title', theme === 'dark' ? 'Beralih ke mode terang' : 'Beralih ke mode gelap');
    };

    const currentTheme = document.documentElement.dataset.theme || 'light';
    updateThemeIcon(currentTheme);

    themeBtn.addEventListener('click', () => {
      const activeTheme = document.documentElement.dataset.theme === 'dark' ? 'dark' : 'light';
      const nextTheme = activeTheme === 'dark' ? 'light' : 'dark';
      document.documentElement.dataset.theme = nextTheme;
      localStorage.setItem('vp_theme', nextTheme);
      updateThemeIcon(nextTheme);
    });
  }

  // 3. Scroll Tracking: Nav Active State, Progress Bar & Back to Top
  const scrollProgressBar = $('#scrollProgress');
  const backToTopBtn = $('#backToTop');
  const navItems = $$('.pixel-nav-item');
  const sections = $$('section[id]');

  function handleScroll() {
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) : 0;

    if (scrollProgressBar) {
      scrollProgressBar.style.width = `${scrollPercent * 100}%`;
    }

    if (backToTopBtn) {
      if (scrollTop > 350) {
        backToTopBtn.classList.add('visible');
      } else {
        backToTopBtn.classList.remove('visible');
      }
    }

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
      navItems.forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.includes('#' + currentSectionId)) {
          navItems.forEach(l => l.classList.remove('active'));
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

  // Smooth scroll
  $$('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      const hashIndex = href.indexOf('#');
      if (hashIndex !== -1) {
        const targetId = href.substring(hashIndex + 1);
        const targetEl = document.getElementById(targetId);
        if (targetEl) {
          e.preventDefault();
          const targetOffset = targetEl.offsetTop - 75;
          window.scrollTo({ top: targetOffset, behavior: 'smooth' });
        }
      }
    });
  });

  // 4. Project Carousel Navigation Buttons
  const prevProjBtn = $('#prevProj');
  const nextProjBtn = $('#nextProj');
  const projectsGrid = $('.pixel-projects-grid');

  if (prevProjBtn && nextProjBtn && projectsGrid) {
    prevProjBtn.addEventListener('click', () => {
      projectsGrid.scrollBy({ left: -300, behavior: 'smooth' });
    });
    nextProjBtn.addEventListener('click', () => {
      projectsGrid.scrollBy({ left: 300, behavior: 'smooth' });
    });
  }

  // 5. Catalog Search & Filter (/proyek)
  const chips = $$('.chip');
  const cards = $$('.project-card, .card[data-kat]');
  const searchInput = $('#cari');
  const emptyState = $('#kosong');
  const displayedCount = $('#displayedCount');

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

      if (isMatch) visibleCount++;
    });

    if (displayedCount) displayedCount.textContent = visibleCount;
    if (emptyState) emptyState.hidden = visibleCount > 0;
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

})();
