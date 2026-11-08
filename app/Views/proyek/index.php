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
        <span class="mini-pill-icon">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        </span>
        <span><b><?= count($daftarProyek) ?></b> Karya Terkurasi</span>
      </div>
      <div class="highlight-mini-pill">
        <span class="mini-pill-icon">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="4"/></svg>
        </span>
        <span><b>4</b> Bidang Spesialisasi</span>
      </div>
      <div class="highlight-mini-pill">
        <span class="mini-pill-icon">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </span>
        <span>Studi Kasus Lengkap</span>
      </div>
    </div>
  </div>


  <!-- Projects Grid -->
  <div class="projects-grid" id="grid">
    <?php foreach ($daftarProyek as $p): ?>
      <?php 
        $katSlug = getKatSlug($p['kategori']); 
        $katSvg = getKatSvgIcon($p['kategori'], 14);
        $techList = array_map('trim', explode(',', $p['teknologi']));
      ?>
      <a class="card project-card kat-theme-<?= h($katSlug) ?>" href="<?= BASE_URL ?>/proyek/detail?slug=<?= urlencode($p['slug']) ?>"
         data-kat="<?= h($p['kategori']) ?>" 
         data-cari="<?= h(mb_strtolower($p['judul'] . ' ' . $p['teknologi'] . ' ' . $p['ringkasan'] . ' ' . $p['kategori'])) ?>">
        
        <!-- Card Top Visual Cover -->
        <div class="project-card-cover">
          <div class="cover-mesh-bg"></div>
          <div class="cover-watermark-icon"><?= $katSvg ?></div>
          
          <div class="cover-top-badges">
            <span class="badge-category">
              <span class="badge-icon"><?= $katSvg ?></span>
              <span class="badge-text"><?= h($p['kategori']) ?></span>
            </span>
            <?php if (!empty($p['unggulan'])): ?>
              <span class="badge-featured">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span>Unggulan</span>
              </span>
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

</section>
