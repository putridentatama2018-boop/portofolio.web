<section class="sec page-proyek-sec">
  <!-- Page Header -->
  <div class="sec-header-ethereal proyek-hero-header">
    <div class="kicker-pill">
      <span class="kicker-dot"></span>
      <span>KATALOG KARYA &amp; PORTOFOLIO</span>
    </div>
    <h1 class="page-main-heading">Karya &amp; Eksplorasi Proyek</h1>
    <p class="page-main-sub">
      Koleksi karya terpilih yang memadukan rekayasa perangkat lunak berkinerja tinggi, sistem desain UI/UX intuitif, fotografi editorial, dan videografi sinematik.
    </p>

    <div class="header-highlights-row">
      <div class="highlight-mini-pill">
        <span class="mini-pill-icon">✨</span>
        <span><b><?= count($daftarProyek) ?></b> Karya Terkurasi</span>
      </div>
      <div class="highlight-mini-pill">
        <span class="mini-pill-icon">🎯</span>
        <span><b>4</b> Bidang Spesialisasi</span>
      </div>
      <div class="highlight-mini-pill">
        <span class="mini-pill-icon">⚡</span>
        <span>Studi Kasus Lengkap</span>
      </div>
    </div>
  </div>

  <!-- Filter & Search Toolbar Card -->
  <div class="portfolio-controls-card">
    <div class="tools-top-row">
      <!-- Category Filter Pills -->
      <div class="chips-scroll-wrapper">
        <div class="chips" id="chips">
          <button class="chip active" data-kat="semua" type="button">
            <span class="chip-icon">✨</span>
            <span class="chip-text">Semua Karya</span>
            <span class="chip-count" id="countAll"><?= count($daftarProyek) ?></span>
          </button>
          <?php foreach ($kategori as $k): ?>
            <?php 
              $katSlug = getKatSlug($k);
              $countKat = count(array_filter($daftarProyek, fn($item) => $item['kategori'] === $k));
            ?>
            <button class="chip chip-<?= h($katSlug) ?>" data-kat="<?= h($k) ?>" type="button">
              <span class="chip-icon"><?= getKatIcon($k) ?></span>
              <span class="chip-text"><?= h($k) ?></span>
              <span class="chip-count"><?= $countKat ?></span>
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Search Box -->
      <div class="search-box-wrapper">
        <div class="search-box">
          <svg class="search-icon-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input class="search-input" id="cari" type="search" placeholder="Cari nama proyek, teknologi (Laravel, Figma, Flutter)..." aria-label="Cari proyek">
          <button class="search-clear-btn" id="clearSearch" aria-label="Hapus pencarian" hidden>&times;</button>
        </div>
      </div>
    </div>

    <!-- Meta Status Bar -->
    <div class="tools-meta-bar">
      <div class="results-counter" id="resultsCount">
        <span class="counter-dot"></span>
        <span>Menampilkan <b id="displayedCount"><?= count($daftarProyek) ?></b> dari <?= count($daftarProyek) ?> karya</span>
      </div>
      <div class="filter-tip">
        <span>💡 Klik kartu untuk membaca studi kasus &amp; spesifikasi teknis</span>
      </div>
    </div>
  </div>

  <!-- Projects Grid -->
  <div class="projects-grid" id="grid">
    <?php foreach ($daftarProyek as $p): ?>
      <?php 
        $katSlug = getKatSlug($p['kategori']); 
        $katIcon = getKatIcon($p['kategori']);
        $techList = array_map('trim', explode(',', $p['teknologi']));
      ?>
      <a class="card project-card kat-theme-<?= h($katSlug) ?>" href="<?= BASE_URL ?>/proyek/detail?slug=<?= urlencode($p['slug']) ?>"
         data-kat="<?= h($p['kategori']) ?>" 
         data-cari="<?= h(mb_strtolower($p['judul'] . ' ' . $p['teknologi'] . ' ' . $p['ringkasan'] . ' ' . $p['kategori'])) ?>">
        
        <!-- Card Top Visual Cover -->
        <div class="project-card-cover">
          <div class="cover-mesh-bg"></div>
          <div class="cover-watermark-icon"><?= $katIcon ?></div>
          
          <div class="cover-top-badges">
            <span class="badge-category">
              <span class="badge-icon"><?= $katIcon ?></span>
              <span class="badge-text"><?= h($p['kategori']) ?></span>
            </span>
            <?php if (!empty($p['unggulan'])): ?>
              <span class="badge-featured">⭐ Unggulan</span>
            <?php endif; ?>
          </div>

          <div class="cover-bottom-info">
            <span class="badge-year"><?= h($p['tahun']) ?></span>
          </div>
        </div>

        <!-- Card Body -->
        <div class="project-card-body">
          <h3 class="project-card-title"><?= h($p['judul']) ?></h3>
          <p class="project-card-desc"><?= h($p['ringkasan']) ?></p>
          
          <!-- Tech Tags Cloud -->
          <div class="project-card-tech">
            <div class="tech-tags-cloud">
              <?php foreach (array_slice($techList, 0, 3) as $tech): ?>
                <span class="tech-tag-pill"><?= h($tech) ?></span>
              <?php endforeach; ?>
              <?php if (count($techList) > 3): ?>
                <span class="tech-tag-pill tech-tag-more">+<?= count($techList) - 3 ?></span>
              <?php endif; ?>
            </div>
          </div>

          <!-- Card Footer CTA -->
          <div class="project-card-footer">
            <span class="footer-cta-text">Lihat Detail Studi Kasus</span>
            <span class="footer-cta-arrow">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M5 12h14M12 5l7 7-7 7"/>
              </svg>
            </span>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- Empty State Box -->
  <div class="empty-state-box" id="kosong" hidden>
    <div class="empty-state-card">
      <div class="empty-icon-circle">🔍</div>
      <h3 class="empty-title">Tidak Ada Proyek yang Cocok</h3>
      <p class="empty-desc">Tidak ditemukan hasil untuk kata kunci atau kategori yang Anda pilih. Coba gunakan kata kunci lain.</p>
      <button class="btn-pill-dark" id="resetFilterBtn" type="button">
        <span>Reset Semua Filter</span>
      </button>
    </div>
  </div>
</section>
