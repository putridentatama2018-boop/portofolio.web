<?php
$katSlug = getKatSlug($proyek['kategori']);
$katIcon = getKatIcon($proyek['kategori']);
$techItems = array_map('trim', explode(',', $proyek['teknologi']));
?>
<article class="sec detail-article">
  <!-- Top Navigation & Actions Bar -->
  <div class="detail-nav-bar">
    <a class="back-link-btn" href="<?= BASE_URL ?>/proyek">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
      <span>Kembali ke Katalog Karya</span>
    </a>

    <div class="detail-actions-right">
      <button class="action-btn-pill" id="shareProjectBtn" title="Salin tautan proyek ini" type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan proyek berhasil disalin ke clipboard!');">
        <span class="action-icon">🔗</span>
        <span class="action-text">Bagikan Tautan</span>
      </button>
      <span class="detail-kategori-badge kat-theme-<?= h($katSlug) ?>">
        <?= $katIcon ?> <?= h($proyek['kategori']) ?>
      </span>
    </div>
  </div>

  <!-- Header -->
  <header class="detail-header-card">
    <div class="detail-meta-tags">
      <span class="meta-pill-year">📅 Tahun Pengerjaan: <?= h($proyek['tahun']) ?></span>
      <?php if (!empty($proyek['unggulan'])): ?>
        <span class="meta-pill-featured">⭐ Featured Case Study</span>
      <?php endif; ?>
      <span class="meta-pill-category"><?= $katIcon ?> <?= h($proyek['kategori']) ?></span>
    </div>
    
    <h1 class="detail-headline"><?= h($proyek['judul']) ?></h1>
    <p class="detail-summary-lead"><?= h($proyek['ringkasan']) ?></p>
  </header>

  <!-- Showcase Hero Banner -->
  <div class="detail-banner-stage kat-theme-<?= h($katSlug) ?>">
    <div class="detail-banner-backdrop" aria-hidden="true"></div>
    <div class="detail-banner-content">
      <div class="banner-icon-bubble"><?= $katIcon ?></div>
      <div class="banner-text-info">
        <span class="banner-kicker"><?= h($proyek['kategori']) ?> • Studi Kasus Produksi</span>
        <h2 class="banner-title"><?= h($proyek['judul']) ?></h2>
        <div class="banner-pills-row">
          <span class="b-pill">Standard Produksi</span>
          <span class="b-pill">Terkurasi &amp; Teruji</span>
          <span class="b-pill"><?= count($techItems) ?> Alat / Teknologi</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Body Grid -->
  <div class="detail-body-layout">
    <div class="detail-main-story">
      <div class="detail-content-card">
        <h3 class="section-subheading">
          <span class="subheading-icon">📖</span> Uraian &amp; Arsitektur Proyek
        </h3>
        <div class="detail-story-text">
          <?= nl2br(h($proyek['deskripsi'])) ?>
        </div>
      </div>

      <div class="detail-pillars-highlight-box">
        <h3 class="section-subheading">
          <span class="subheading-icon">🎯</span> Nilai Tambah &amp; Pendekatan Metodologi
        </h3>
        <div class="methodology-grid">
          <div class="meth-card">
            <div class="meth-icon">🛡️</div>
            <h4>Standar &amp; Best Practices</h4>
            <p>Didesain dan dieksekusi dengan kepatuhan pada standar industri <?= h($proyek['kategori']) ?>, memastikan keandalan, skalabilitas, dan kemudahan pemeliharaan.</p>
          </div>
          <div class="meth-card">
            <div class="meth-icon">💎</div>
            <h4>Kualitas Visual &amp; Performa</h4>
            <p>Perhatian cermat pada efisiensi performa, kebersihan alur pengguna, keakuratan warna, dan dampak visual yang kuat.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Sticky Sidebar -->
    <aside class="detail-sidebar-col">
      <div class="sidebar-sticky-box">
        <h3 class="sidebar-box-title">Spesifikasi &amp; Instrumen</h3>

        <div class="sidebar-section">
          <span class="sidebar-label">Stack &amp; Software:</span>
          <div class="sidebar-tech-badges">
            <?php foreach ($techItems as $t): ?>
              <span class="sidebar-tech-tag">
                <span class="bullet-dot"></span>
                <span><?= h($t) ?></span>
              </span>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="sidebar-divider"></div>

        <div class="sidebar-meta-list">
          <div class="meta-list-row">
            <span class="meta-row-label">Kategori Utama</span>
            <strong class="meta-row-val"><?= h($proyek['kategori']) ?></strong>
          </div>
          <div class="meta-list-row">
            <span class="meta-row-label">Tahun Pembuatan</span>
            <strong class="meta-row-val"><?= h($proyek['tahun']) ?></strong>
          </div>
          <div class="meta-list-row">
            <span class="meta-row-label">Status Proyek</span>
            <strong class="meta-row-val status-complete">🟢 Selesai / Terpublikasi</strong>
          </div>
        </div>

        <div class="sidebar-action-wrap">
          <a href="<?= BASE_URL ?>/kontak" class="btn-pill-dark btn-full-width">
            <span>Diskusikan Proyek Serupa</span>
            <span class="pill-arrow">&nearr;</span>
          </a>
          <a href="<?= BASE_URL ?>/proyek" class="btn-pill-glass btn-full-width">
            <span>Lihat Karya Lainnya</span>
          </a>
        </div>
      </div>
    </aside>
  </div>
</article>
