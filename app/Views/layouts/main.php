<?php
unset($_SESSION['flash']);
$nama = $profil['nama'] ?? 'Putri';

$currentUri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
if (BASE_URL !== '' && str_starts_with($currentUri, BASE_URL)) {
    $currentUri = substr($currentUri, strlen(BASE_URL));
} else {
    $baseWithoutPublic = preg_replace('#/public$#', '', BASE_URL);
    if ($baseWithoutPublic !== '' && str_starts_with($currentUri, $baseWithoutPublic)) {
        $currentUri = substr($currentUri, strlen($baseWithoutPublic));
    }
}
$currentUri = '/' . ltrim($currentUri, '/');
if ($currentUri !== '/') {
    $currentUri = rtrim($currentUri, '/');
}
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= h($title ?? 'vectorpix.dev') ?> | <?= h($nama) ?> - Frontend Developer &amp; UI/UX</title>
  <meta name="description" content="Portofolio resmi <?= h($nama) ?> (vectorpix.dev): Frontend Developer &amp; UI/UX Designer. Turning Ideas Into Digital Reality.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Space+Grotesk:wght@500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
<?php
$cssFile = file_exists(BASE_PATH . '/assets/css/style.css') 
    ? BASE_PATH . '/assets/css/style.css' 
    : BASE_PATH . '/public/assets/css/style.css';
$cssVer = file_exists($cssFile) ? filemtime($cssFile) : '3.0';

$jsFile = file_exists(BASE_PATH . '/assets/js/app.js') 
    ? BASE_PATH . '/assets/js/app.js' 
    : BASE_PATH . '/public/assets/js/app.js';
$jsVer = file_exists($jsFile) ? filemtime($jsFile) : '3.0';
?>
  <link href="<?= BASE_URL ?>/assets/css/style.css?v=<?= $cssVer ?>" rel="stylesheet">
  <script>
    (function() {
      const savedTheme = localStorage.getItem('vp_theme') || 'light';
      document.documentElement.dataset.theme = savedTheme;
    })();
  </script>
</head>
<body class="site-body theme-pixelcraft">
  <!-- Scroll Progress Indicator -->
  <div class="scroll-progress-bar" id="scrollProgress" aria-hidden="true"></div>

  <!-- Ambient Glowing Blobs -->
  <div class="ambient-glow-layer" aria-hidden="true">
    <div class="glow-orb orb-top-left"></div>
    <div class="glow-orb orb-top-right"></div>
    <div class="glow-orb orb-mid-right"></div>
  </div>

  <!-- Floating Island Header (Matching Reference PixelCraft Mockup) -->
  <header class="header-floating-island">
    <div class="island-nav-container">
      <!-- Left: Logo & Brand Name -->
      <a class="pixel-brand-logo" href="<?= BASE_URL ?>/" title="vectorpix.dev">
        <div class="pixel-logo-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 4L12 21L12 13.2L7.8 4H3Z" fill="url(#vpGradLeft)"/>
            <path d="M21 4L12 21L12 13.2L16.2 4H21Z" fill="url(#vpGradRight)"/>
            <rect x="10.5" y="5" width="3" height="3" rx="0.75" fill="#ec4899"/>
            <defs>
              <linearGradient id="vpGradLeft" x1="3" y1="4" x2="12" y2="21" gradientUnits="userSpaceOnUse">
                <stop stop-color="#b674fc"/>
                <stop offset="1" stop-color="#ec4899"/>
              </linearGradient>
              <linearGradient id="vpGradRight" x1="21" y1="4" x2="12" y2="21" gradientUnits="userSpaceOnUse">
                <stop stop-color="#ec4899"/>
                <stop offset="1" stop-color="#d946ef"/>
              </linearGradient>
            </defs>
          </svg>
        </div>
        <span class="pixel-brand-title">vectorpix<span class="brand-tld">.dev</span></span>
      </a>

      <!-- Center: Navigation Menu -->
      <nav class="pixel-nav-links" id="navLinks">
        <a href="<?= BASE_URL ?>/#beranda" class="pixel-nav-item <?= ($currentUri === '/' || $currentUri === '') ? 'active' : '' ?>">Beranda</a>
        <a href="<?= BASE_URL ?>/#certificates" class="pixel-nav-item">Sertifikasi</a>
        <a href="<?= BASE_URL ?>/proyek" class="pixel-nav-item <?= (str_starts_with($currentUri, '/proyek')) ? 'active' : '' ?>">Proyek</a>
        <a href="<?= BASE_URL ?>/kontak" class="pixel-nav-item <?= ($currentUri === '/kontak') ? 'active' : '' ?>">Kontak</a>
      </nav>

      <!-- Right: Action Icons (Dark/Light Theme Toggle) -->
      <div class="pixel-nav-actions">
        <button class="pixel-icon-btn" id="themeBtn" aria-label="Ganti mode terang/gelap" title="Ganti mode terang/gelap">
          <span class="btn-icon-svg" id="themeBtnIcon">🌙</span>
        </button>
        <button class="pixel-mobile-toggle" id="navToggle" aria-label="Buka navigasi" aria-expanded="false">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>

  <!-- Main Content View -->
  <main id="mainContent" class="main-pixelcraft"><?= $content ?></main>

  <!-- Back to Top Button -->
  <button class="back-to-top" id="backToTop" aria-label="Kembali ke atas" title="Kembali ke atas">
    <span class="back-to-top-arrow">&uarr;</span>
  </button>

  <!-- Clean Minimalist Footer -->
  <footer class="pixel-footer">
    <div class="pixel-footer-inner">
      <div class="pixel-footer-left">
        <a class="pixel-brand-logo small" href="<?= BASE_URL ?>/" title="vectorpix.dev">
          <div class="pixel-logo-icon mini">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 4L12 21L12 13.2L7.8 4H3Z" fill="url(#vpGradLeftFoot)"/>
              <path d="M21 4L12 21L12 13.2L16.2 4H21Z" fill="url(#vpGradRightFoot)"/>
              <rect x="10.5" y="5" width="3" height="3" rx="0.75" fill="#ec4899"/>
              <defs>
                <linearGradient id="vpGradLeftFoot" x1="3" y1="4" x2="12" y2="21" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#b674fc"/>
                  <stop offset="1" stop-color="#ec4899"/>
                </linearGradient>
                <linearGradient id="vpGradRightFoot" x1="21" y1="4" x2="12" y2="21" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#ec4899"/>
                  <stop offset="1" stop-color="#d946ef"/>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <span class="pixel-brand-title">vectorpix<span class="brand-tld">.dev</span></span>
        </a>
        <p class="pixel-footer-sub">Mewujudkan ide menjadi kenyataan digital yang modern, responsif, dan fungsional.</p>
      </div>

      <div class="pixel-footer-right">
        <p class="copyright-text">&copy; <?= date('Y') ?> <strong><?= h($nama) ?></strong> (vectorpix.dev). Seluruh hak cipta dilindungi.</p>
      </div>
    </div>
  </footer>

  <script src="<?= BASE_URL ?>/assets/js/app.js?v=<?= $jsVer ?>"></script>
</body>
</html>
