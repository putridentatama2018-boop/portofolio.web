<?php
$totalProyek   = $totalProyek ?? 12;
$totalSkill    = !empty($keahlian) ? array_sum(array_map('count', $keahlian)) : 24;
$proyekUnggulan = $proyekUnggulan ?? [];
$nama          = $profil['nama'] ?? 'Putri';
$email         = $profil['email'] ?? 'hello@putri.dev';
$telepon       = $profil['telepon'] ?? '+62 812-3456-7890';
$lokasi        = $profil['lokasi'] ?? 'Jember, Indonesia';
?>

<!-- =========================================================================
     HERO SECTION (AARAV SINGH INSPIRED - ETHEREAL GLASSMORPHISM)
     ========================================================================= -->
<section class="hero-ethereal" id="beranda">
  <div class="hero-ethereal-container">
    <!-- Left Column: Intro & Call To Actions -->
    <div class="hero-content-col">
      <div class="kicker-pill">
        <span>HALO, SAYA</span>
      </div>

      <h1 class="hero-main-name"><?= h($nama) ?></h1>

      <div class="hero-role-gradient">
        Software Engineer &amp; Desainer Produk Digital
      </div>

      <p class="hero-bio-text">
        Saya menciptakan pengalaman digital yang bermakna — intuitif, indah, dan dibangun dengan penuh tujuan. Menggabungkan rekayasa perangkat lunak berkinerja tinggi dengan desain visual multidisiplin.
      </p>

      <div class="hero-cta-group">
        <a class="btn-pill-dark" href="<?= BASE_URL ?>/proyek">
          <span>Lihat Karya Saya</span>
          <span class="pill-arrow">&nearr;</span>
        </a>
        <a class="btn-pill-glass" href="<?= BASE_URL ?>/kontak">
          <span>Unduh CV</span>
          <svg class="pill-icon-svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
            <polyline points="7 10 12 15 17 10"/>
            <line x1="12" y1="15" x2="12" y2="3"/>
          </svg>
        </a>
      </div>

      <!-- Strip Klien & Teknologi -->
      <div class="trusted-strip">
        <span class="trusted-label">Dipercaya oleh</span>
        <div class="trusted-logos">
          <span class="brand-item">Google</span>
          <span class="brand-item">Microsoft</span>
          <span class="brand-item">Airbnb</span>
          <span class="brand-item">HubSpot</span>
          <span class="brand-item">Dribbble</span>
        </div>
      </div>
    </div>

    <!-- Right Column: Avatar Frame, Floating Experience Card, Impact Sparkline & Glass Sphere -->
    <div class="hero-avatar-col">
      <div class="avatar-stage-ethereal">
        <!-- Floating Glass Sphere with Sparkle (Left side of avatar) -->
        <div class="floating-glass-pearl" aria-hidden="true">
          <div class="pearl-inner-shine"></div>
          <span class="pearl-sparkle">✦</span>
        </div>

        <!-- Asymmetrical Arched Organic Mask Frame (Matching Reference) -->
        <div class="avatar-organic-frame">
          <img src="<?= BASE_URL ?>/assets/images/profile-light.jpg" alt="<?= h($nama) ?>" class="avatar-portrait-img">
        </div>

        <!-- Kartu Melayang Kanan Atas: 5+ Tahun Pengalaman -->
        <div class="floating-glass-card card-experience">
          <strong class="floating-stat-num">5+</strong>
          <span class="floating-stat-label">Tahun<br>Pengalaman</span>
        </div>

        <!-- Kartu Melayang Bawah: Dampak Desain & Kode +120% -->
        <div class="floating-glass-card card-impact">
          <div class="impact-header">
            <span class="impact-label">Dampak Desain &amp; Kode</span>
            <strong class="impact-percent">+120%</strong>
          </div>
          <div class="impact-chart-wrap">
            <svg class="sparkline-svg" viewBox="0 0 120 32" fill="none" preserveAspectRatio="none">
              <path d="M2 26 C 25 24, 35 12, 55 18 C 75 24, 85 6, 118 4" stroke="#8b5cf6" stroke-width="2.5" stroke-linecap="round" />
              <circle cx="118" cy="4" r="3.5" fill="#8b5cf6" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     ABOUT ME SECTION (MATCHING REFERENCE)
     ========================================================================= -->
<section class="sec-ref about-sec-ethereal" id="tentang">
  <div class="about-grid-ethereal">
    <!-- Kolom Kiri: Judul & Kartu Statistik -->
    <div class="about-left-col">
      <div class="kicker-pill">
        <span>TENTANG SAYA</span>
      </div>
      <h2 class="section-heading-ethereal">
        Merancang dengan Empati<br>
        Membangun dengan Tujuan
      </h2>

      <!-- Kartu Statistik 3 Item -->
      <div class="stat-capsule-card">
        <div class="stat-capsule-item">
          <div class="stat-icon-mini">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          </div>
          <strong class="stat-capsule-num">5+</strong>
          <span class="stat-capsule-label">Tahun Pengalaman</span>
        </div>

        <div class="stat-capsule-divider"></div>

        <div class="stat-capsule-item">
          <div class="stat-icon-mini">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
          </div>
          <strong class="stat-capsule-num"><?= max((int)$totalProyek, 30) ?>+</strong>
          <span class="stat-capsule-label">Proyek Selesai</span>
        </div>

        <div class="stat-capsule-divider"></div>

        <div class="stat-capsule-item">
          <div class="stat-icon-mini">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <strong class="stat-capsule-num">15+</strong>
          <span class="stat-capsule-label">Klien Puas</span>
        </div>
      </div>
    </div>

    <!-- Kolom Kanan: Narasi & Tombol -->
    <div class="about-right-col">
      <p class="about-narrative-text">
        Saya adalah software engineer dan desainer produk digital multidisiplin dengan 5+ tahun pengalaman mengubah masalah kompleks menjadi solusi yang sederhana, intuitif, dan menarik. Saya percaya pada desain yang berpusat pada pengguna, arsitektur kode yang bersih, dan detail yang penuh perhatian.
      </p>
      <p class="about-sub-narrative">
        <?= h($profil['bio'] ?? 'Menggabungkan logika rekayasa perangkat lunak, estetika desain grafis, fotografi studio, dan video editing sinematik untuk melahirkan karya digital yang berkesan.') ?>
      </p>
      <div class="about-btn-wrap">
        <a class="btn-pill-glass" href="<?= BASE_URL ?>/kontak">
          <span>Lebih Lanjut Tentang Saya</span>
          <span class="pill-arrow">&nearr;</span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     SERVICES I OFFER SECTION (4 FROSTED GLASS CARDS WITH PASTEL SQUIRCLES)
     ========================================================================= -->
<section class="sec-ref services-sec-ethereal" id="services">
  <div class="sec-heading-block">
    <div class="kicker-pill">
      <span>APA YANG SAYA LAKUKAN</span>
    </div>
    <h2 class="section-heading-ethereal">Layanan yang Saya Tawarkan</h2>
  </div>

  <div class="services-cards-grid">
    <!-- Layanan 1: Software Engineering -->
    <div class="service-frosted-card">
      <div class="service-icon-squircle squircle-amber">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
          <line x1="8" y1="21" x2="16" y2="21"/>
          <line x1="12" y1="17" x2="12" y2="21"/>
        </svg>
      </div>
      <h3 class="service-card-title">Rekayasa Perangkat Lunak</h3>
      <p class="service-card-desc">
        Membangun produk web dan mobile yang tangguh dan skalabel dengan arsitektur MVC bersih, RESTful API, dan interaksi responsif.
      </p>
      <div class="service-card-footer">
        <span class="card-arrow-circle">&nearr;</span>
      </div>
    </div>

    <!-- Layanan 2: UI/UX Design -->
    <div class="service-frosted-card">
      <div class="service-icon-squircle squircle-purple">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
          <polyline points="2 17 12 22 22 17"></polyline>
          <polyline points="2 12 12 17 22 12"></polyline>
        </svg>
      </div>
      <h3 class="service-card-title">Desain UI/UX</h3>
      <p class="service-card-desc">
        Menciptakan pengalaman pengguna yang mulus melalui riset mendalam, wireframing, prototipe high-fidelity, dan pengujian desain.
      </p>
      <div class="service-card-footer">
        <span class="card-arrow-circle">&nearr;</span>
      </div>
    </div>

    <!-- Layanan 3: Sistem Desain & Fullstack -->
    <div class="service-frosted-card">
      <div class="service-icon-squircle squircle-blue">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="3" y="3" width="7" height="7"></rect>
          <rect x="14" y="3" width="7" height="7"></rect>
          <rect x="14" y="14" width="7" height="7"></rect>
          <rect x="3" y="14" width="7" height="7"></rect>
        </svg>
      </div>
      <h3 class="service-card-title">Sistem Desain</h3>
      <p class="service-card-desc">
        Membangun design token yang skalabel, pustaka komponen yang dapat digunakan ulang, dan framework UI yang terstruktur untuk pengalaman yang konsisten.
      </p>
      <div class="service-card-footer">
        <span class="card-arrow-circle">&nearr;</span>
      </div>
    </div>

    <!-- Layanan 4: Multimedia & Riset Pengguna -->
    <div class="service-frosted-card">
      <div class="service-icon-squircle squircle-cyan">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
          <circle cx="12" cy="13" r="4"></circle>
        </svg>
      </div>
      <h3 class="service-card-title">Riset Pengguna &amp; Media</h3>
      <p class="service-card-desc">
        Memahami pengguna secara mendalam melalui analitik data dan wawancara, dipadukan dengan penceritaan sinematik dan fotografi studio.
      </p>
      <div class="service-card-footer">
        <span class="card-arrow-circle">&nearr;</span>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     TECHNOLOGIES I USE SECTION (FROSTED DOCK OF TOOL BADGES)
     ========================================================================= -->
<section class="sec-ref tools-sec-ethereal" id="skills">
  <div class="sec-heading-block">
    <div class="kicker-pill">
      <span>ALAT &amp; KEAHLIAN</span>
    </div>
    <h2 class="section-heading-ethereal">Teknologi yang Saya Gunakan</h2>
  </div>

  <div class="tools-dock-card">
    <div class="tools-dock-grid">
      <!-- Tool 1: Figma -->
      <div class="tool-tile-item" title="Figma - UI/UX & Prototyping">
        <div class="tool-logo-box">
          <svg width="28" height="28" viewBox="0 0 38 57" fill="none">
            <path d="M19 28.5C19 23.2533 23.2533 19 28.5 19C33.7467 19 38 23.2533 38 28.5C38 33.7467 33.7467 38 28.5 38C23.2533 38 19 33.7467 19 28.5Z" fill="#1ABCFE"/>
            <path d="M0 47.5C0 42.2533 4.25329 38 9.5 38H19V47.5C19 52.7467 14.7467 57 9.5 57C4.25329 57 0 52.7467 0 47.5Z" fill="#0ACF83"/>
            <path d="M19 0V19H28.5C33.7467 19 38 14.7467 38 9.5C38 4.25329 33.7467 0 28.5 0H19Z" fill="#FF7262"/>
            <path d="M0 9.5C0 14.7467 4.25329 19 9.5 19H19V0H9.5C4.25329 0 0 4.25329 0 9.5Z" fill="#F24E1E"/>
            <path d="M0 28.5C0 33.7467 4.25329 38 9.5 38H19V19H9.5C4.25329 19 0 23.2533 0 28.5Z" fill="#A259FF"/>
          </svg>
        </div>
        <span class="tool-tile-name">Figma</span>
      </div>

      <!-- Tool 2: PHP & Laravel -->
      <div class="tool-tile-item" title="PHP & Laravel">
        <div class="tool-logo-box">
          <span class="tool-badge-text php-accent">PHP</span>
        </div>
        <span class="tool-tile-name">Laravel</span>
      </div>

      <!-- Tool 3: Flutter / Dart -->
      <div class="tool-tile-item" title="Flutter - Mobile Applications">
        <div class="tool-logo-box">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="#02569B">
            <path d="M14.314 0L2.3 12 6 15.7 21.684 0h-7.37zM14.314 11.215L8.71 16.82l3.7 3.7 5.604-5.605 5.604 5.605L24 20.12l-9.686-8.905z"/>
          </svg>
        </div>
        <span class="tool-tile-name">Flutter</span>
      </div>

      <!-- Tool 4: Photoshop -->
      <div class="tool-tile-item" title="Adobe Photoshop">
        <div class="tool-logo-box">
          <span class="tool-badge-text ps-accent">Ps</span>
        </div>
        <span class="tool-tile-name">Photoshop</span>
      </div>

      <!-- Tool 5: Illustrator -->
      <div class="tool-tile-item" title="Adobe Illustrator">
        <div class="tool-logo-box">
          <span class="tool-badge-text ai-accent">Ai</span>
        </div>
        <span class="tool-tile-name">Illustrator</span>
      </div>

      <!-- Tool 6: MySQL -->
      <div class="tool-tile-item" title="MySQL Database">
        <div class="tool-logo-box">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="#00758F">
            <path d="M12 3C7.58 3 4 4.79 4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7c0-2.21-3.58-4-8-4zm0 2c3.87 0 6 1.5 6 2s-2.13 2-6 2-6-1.5-6-2 2.13-2 6-2zm6 12c0 .5-2.13 2-6 2s-6-1.5-6-2v-2.23c1.61.78 3.72 1.23 6 1.23s4.39-.45 6-1.23V17zm0-5c0 .5-2.13 2-6 2s-6-1.5-6-2V9.77c1.61.78 3.72 1.23 6 1.23s4.39-.45 6-1.23V12z"/>
          </svg>
        </div>
        <span class="tool-tile-name">MySQL</span>
      </div>

      <!-- Tool 7: Framer / Webflow -->
      <div class="tool-tile-item" title="Framer - Interactive Design">
        <div class="tool-logo-box">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="#0055FF">
            <path d="M4 0h16v8h-8zM4 8h8l8 8H4zM4 16h8v8z"/>
          </svg>
        </div>
        <span class="tool-tile-name">Framer</span>
      </div>

      <!-- Tool 8: Git / GitHub -->
      <div class="tool-tile-item" title="Git Version Control">
        <div class="tool-logo-box">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="#F05032">
            <path d="M2.6 10.59L8.38 4.8a2.53 2.53 0 0 1 3.58 0l1.24 1.24-2.88 2.88a2.5 2.5 0 0 0-2.6 2.6l-2.02 2.02a2.5 2.5 0 1 0 1.42 1.42l2-2a2.49 2.49 0 0 0 1.94-.38l2.94 2.94a2.5 2.5 0 1 0 1.4-1.4L15 11.3a2.5 2.5 0 0 0-.46-2.92l2.9-2.9 1.96 1.96a2.53 2.53 0 0 1 0 3.58l-5.78 5.79a2.53 2.53 0 0 1-3.58 0L2.6 14.17a2.53 2.53 0 0 1 0-3.58z"/>
          </svg>
        </div>
        <span class="tool-tile-name">Git</span>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================================
     KARYA STRIP — Arahkan ke halaman Proyek
     ========================================================================= -->
<section class="sec-ref karya-strip-sec" id="proyek">
  <div class="karya-strip-inner">
    <div class="karya-strip-badge">
      <span class="karya-strip-count"><?= max((int)$totalProyek, 12) ?>+</span>
      <span class="karya-strip-label">Proyek Selesai</span>
    </div>
    <div class="karya-strip-text">
      <div class="kicker-pill"><span>PROYEK UNGGULAN</span></div>
      <h2 class="section-heading-ethereal">Eksplorasi Seluruh Karya Saya</h2>
      <p class="karya-strip-desc">Dari rekayasa perangkat lunak, desain UI/UX, fotografi sinematik, hingga videografi — temukan koleksi proyek terpilih saya.</p>
    </div>
    <div class="karya-strip-action">
      <a class="btn-pill-dark" href="<?= BASE_URL ?>/proyek">
        <span>Lihat Semua Karya</span>
        <span class="pill-arrow">&nearr;</span>
      </a>
    </div>
  </div>
</section>

<!-- =========================================================================
     DESIGN PROCESS I FOLLOW SECTION (5 CONNECTED STEP CARDS)
     ========================================================================= -->
<section class="sec-ref process-sec-ethereal" id="process">
  <div class="sec-heading-block">
    <div class="kicker-pill">
      <span>PROSES KERJA SAYA</span>
    </div>
    <h2 class="section-heading-ethereal">Alur Desain yang Saya Gunakan</h2>
  </div>

  <div class="process-steps-track">
    <!-- Langkah 01: Temukan -->
    <div class="process-step-card">
      <div class="step-num-badge">
        <span class="step-num-icon">🔍</span>
        <strong>01</strong>
      </div>
      <h3 class="step-card-title">Temukan</h3>
      <p class="step-card-desc">Riset dan pahami kebutuhan pengguna, ekspektasi pemangku kepentingan, dan tujuan strategis proyek.</p>
      <div class="step-connector-arrow">&rarr;</div>
    </div>

    <!-- Langkah 02: Definisikan -->
    <div class="process-step-card">
      <div class="step-num-badge">
        <span class="step-num-icon">📋</span>
        <strong>02</strong>
      </div>
      <h3 class="step-card-title">Definisikan</h3>
      <p class="step-card-desc">Sintesis wawasan, analisis lanskap kompetitif, dan rumuskan pernyataan masalah yang jelas.</p>
      <div class="step-connector-arrow">&rarr;</div>
    </div>

    <!-- Langkah 03: Ideasi -->
    <div class="process-step-card">
      <div class="step-num-badge">
        <span class="step-num-icon">💡</span>
        <strong>03</strong>
      </div>
      <h3 class="step-card-title">Ideasi</h3>
      <p class="step-card-desc">Brainstorm solusi kreatif, peta perjalanan pengguna, dan konstruksi wireframe low-fidelity.</p>
      <div class="step-connector-arrow">&rarr;</div>
    </div>

    <!-- Langkah 04: Rancang & Bangun -->
    <div class="process-step-card">
      <div class="step-num-badge">
        <span class="step-num-icon">🎨</span>
        <strong>04</strong>
      </div>
      <h3 class="step-card-title">Rancang</h3>
      <p class="step-card-desc">Membuat antarmuka pengguna yang bersih, intuitif, pixel-perfect, sistem desain, dan kode yang kokoh.</p>
      <div class="step-connector-arrow">&rarr;</div>
    </div>

    <!-- Langkah 05: Uji & Iterasi -->
    <div class="process-step-card">
      <div class="step-num-badge">
        <span class="step-num-icon">🚀</span>
        <strong>05</strong>
      </div>
      <h3 class="step-card-title">Uji &amp; Iterasi</h3>
      <p class="step-card-desc">Pengujian dengan pengguna nyata, pelacakan metrik kegunaan, dan pemolesan detail untuk pengalaman optimal.</p>
    </div>
  </div>
</section>
<!-- =========================================================================
     CTA STRIP — Arahkan ke halaman Kontak
     ========================================================================= -->
<section class="sec-ref cta-strip-sec" id="kontak">
  <div class="cta-strip-inner">
    <div class="cta-strip-text">
      <div class="kicker-pill">
        <span>AYO TERHUBUNG</span>
      </div>
      <h2 class="section-heading-ethereal">
        Punya proyek yang ingin diwujudkan?<br>
        Mari ciptakan sesuatu yang luar biasa bersama.
      </h2>
    </div>
    <div class="cta-strip-action">
      <a class="btn-pill-dark" href="<?= BASE_URL ?>/kontak">
        <span>Hubungi Saya</span>
        <span class="pill-arrow">&nearr;</span>
      </a>
      <a class="btn-pill-glass" href="mailto:<?= h($email) ?>">
        <span><?= h($email) ?></span>
      </a>
    </div>
  </div>
</section>
