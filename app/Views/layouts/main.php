<?php
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$nama = $profil['nama'] ?? 'Putri';

$currentUri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
if (BASE_URL !== '' && str_starts_with($currentUri, BASE_URL)) {
    $currentUri = substr($currentUri, strlen(BASE_URL));
}
$currentUri = '/' . ltrim($currentUri, '/');
if ($currentUri !== '/') {
    $currentUri = rtrim($currentUri, '/');
}
?>
<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= h($title ?? 'Portofolio') ?> | <?= h($nama) ?> - Software Engineer &amp; Kreator Multidisiplin</title>
  <meta name="description" content="Portofolio resmi <?= h($nama) ?>: Software Engineer & Multidisciplinary Creator spesialisasi Rekayasa Perangkat Lunak, Fotografi, Desain Grafis, dan Editing Videografi.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="<?= BASE_URL ?>/assets/css/style.css?v=<?= filemtime(dirname(__DIR__, 3) . '/public/assets/css/style.css') ?>" rel="stylesheet">
  <script>
    (function() {
      const savedTheme = localStorage.getItem('tema') || 'light';
      document.documentElement.dataset.theme = savedTheme;
    })();
  </script>
</head>
<body class="site-body">
  <!-- Scroll Progress Indicator -->
  <div class="scroll-progress-bar" id="scrollProgress" aria-hidden="true"></div>

  <!-- Ambient Ethereal Glow & Silk Curves -->
  <div class="ambient-glow-wrapper" aria-hidden="true">
    <div class="ambient-orb orb-soft-purple"></div>
    <div class="ambient-orb orb-soft-blue"></div>
    <div class="ambient-silk-curve"></div>
  </div>

  <!-- Floating Island Header (Matching Reference Image) -->
  <header class="nav-island-wrapper">
    <div class="nav-island" id="mainNavbar">
      <!-- Left: Logo & Title -->
      <a class="logo-box" href="<?= BASE_URL ?>/">
        <div class="logo-avatar-badge">
          <span>P</span>
        </div>
        <div class="logo-title-group">
          <strong class="logo-name"><?= h($nama) ?></strong>
          <span class="logo-role">Software Engineer &amp; Kreator</span>
        </div>
      </a>

      <!-- Center: Capsule Pill Navigation -->
      <nav class="nav-capsule-pill" id="navLinks">
        <a href="<?= BASE_URL ?>/#beranda" class="capsule-link <?= ($currentUri === '/' || $currentUri === '') ? 'active' : '' ?>">Beranda</a>
        <a href="<?= BASE_URL ?>/proyek" class="capsule-link <?= str_starts_with($currentUri, '/proyek') ? 'active' : '' ?>">Karya</a>
        <a href="<?= BASE_URL ?>/kontak" class="capsule-link <?= str_starts_with($currentUri, '/kontak') ? 'active' : '' ?>">Kontak</a>
      </nav>

      <!-- Right: Action Button & Theme Toggle -->
      <div class="nav-actions-group">
        <button class="theme-switch-btn" id="themeBtn" aria-label="Ganti tema terang atau gelap" title="Beralih tema">
          <span class="theme-icon" id="themeIcon">☀️</span>
        </button>
        <a href="<?= BASE_URL ?>/kontak" class="btn-dark-pill">
          <span>Mari Bicara</span>
          <span class="pill-arrow">&nearr;</span>
        </a>
      </div>

      <!-- Mobile Hamburger Toggle -->
      <button class="nav-toggle" id="navToggle" aria-label="Buka menu navigasi" aria-expanded="false">
        <span class="bar-icon"></span>
        <span class="bar-icon"></span>
        <span class="bar-icon"></span>
      </button>
    </div>
  </header>

  <!-- Global Toast Feedback -->
  <div id="toastContainer" class="toast-container" aria-live="polite">
    <?php if ($flash): ?>
      <div class="toast toast-<?= h($flash['type']) ?>" role="status" id="toast">
        <span class="toast-icon"><?= $flash['type'] === 'success' ? '✨' : '⚠️' ?></span>
        <span class="toast-message"><?= h($flash['message']) ?></span>
      </div>
    <?php endif; ?>
  </div>

  <main id="mainContent"><?= $content ?></main>

  <!-- Back to Top Button -->
  <button class="back-to-top" id="backToTop" aria-label="Kembali ke atas" title="Kembali ke atas">
    <span class="back-to-top-arrow">&uarr;</span>
  </button>

  <footer class="footer-ref">
    <div class="footer-inner-ref">
      <div class="footer-brand-ref">
        <div class="footer-brand-header">
          <div class="logo-avatar-badge"><span>P</span></div>
          <strong><?= h($nama) ?></strong>
        </div>
        <p class="footer-desc-ref">Menciptakan pengalaman digital bermakna, aplikasi web berkinerja tinggi, dan cerita visual yang memukau dengan presisi dan tujuan.</p>
      </div>

      <div class="footer-nav-col">
        <h4>Navigasi</h4>
        <div class="footer-links-list">
          <a href="<?= BASE_URL ?>/">Beranda</a>
          <a href="<?= BASE_URL ?>/proyek">Karya &amp; Proyek</a>
          <a href="<?= BASE_URL ?>/kontak">Kontak</a>
        </div>
      </div>

      <div class="footer-disciplines-col">
        <h4>Spesialisasi</h4>
        <div class="footer-tag-pills">
          <span>💻 Rekayasa Perangkat Lunak</span>
          <span>📷 Fotografi</span>
          <span>🎨 UI/UX &amp; Desain Brand</span>
          <span>🎬 Video Sinematik</span>
        </div>
      </div>
    </div>

    <div class="footer-bottom-bar">
      <p>&copy; <?= date('Y') ?> <strong><?= h($nama) ?></strong>. Semua hak dilindungi.</p>
      <p class="footer-sub-note">Dirancang &amp; dibangun dengan Arsitektur Bersih &amp; Estetika Modern.</p>
    </div>
  </footer>

  <script src="<?= BASE_URL ?>/assets/js/app.js?v=<?= filemtime(dirname(__DIR__, 3) . '/public/assets/js/app.js') ?>"></script>
</body>
</html>
