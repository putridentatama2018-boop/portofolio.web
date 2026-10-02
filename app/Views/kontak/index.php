<?php
$errors = $_SESSION['errors'] ?? [];
$old    = $_SESSION['old'] ?? [];
$email  = $profil['email'] ?? 'putri.devcreative@gmail.com';
$lokasi = $profil['lokasi'] ?? 'Jawa Timur, Indonesia';
?>
<section class="sec page-kontak-sec">
  <!-- Page Header -->
  <div class="sec-header-ethereal kontak-hero-header">
    <div class="kicker-pill">
      <span class="kicker-dot"></span>
      <span>MARI BERKOLABORASI</span>
    </div>
    <h1 class="page-main-heading">Hubungi Saya &amp; Mulai Diskusi Proyek</h1>
    <p class="page-main-sub">
      Punya ide proyek, kebutuhan rekayasa perangkat lunak, sistem UI/UX, produksi fotografi, atau videografi sinematik? Saya siap mendengarkan dan mewujudkannya bersama Anda.
    </p>

    <div class="header-highlights-row">
      <div class="highlight-mini-pill">
        <span class="status-indicator-live"></span>
        <span><b>Terbuka</b> untuk Proyek Baru &amp; Konsultasi</span>
      </div>
      <div class="highlight-mini-pill">
        <span class="mini-pill-icon">⚡</span>
        <span>Respon Cepat <b>&le; 24 Jam Kerja</b></span>
      </div>
      <div class="highlight-mini-pill">
        <span class="mini-pill-icon">📍</span>
        <span><?= h($lokasi) ?></span>
      </div>
    </div>
  </div>

  <!-- Contact Layout Grid -->
  <div class="contact-layout-grid">
    <!-- Left Column: Direct Info & Communication Channels -->
    <div class="contact-info-card">
      <div class="contact-card-header">
        <span class="card-kicker-badge">💬 SALURAN RESMI</span>
        <h2 class="contact-card-title">Terhubung Secara Langsung</h2>
        <p class="contact-card-desc">
          Silakan hubungi saya melalui kanal email langsung di bawah ini atau gunakan formulir interaktif di samping.
        </p>
      </div>

      <div class="contact-meta-list">
        <!-- Email Item -->
        <div class="contact-meta-item">
          <div class="meta-item-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="2" y="4" width="20" height="16" rx="3"></rect>
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L1 7"></path>
            </svg>
          </div>
          <div class="meta-item-details">
            <span class="meta-item-label">Email Resmi</span>
            <div class="mail-action-group">
              <a class="contact-mail-link" href="mailto:<?= h($email) ?>" id="emailAddressLink"><?= h($email) ?></a>
              <button type="button" class="btn-copy-chip" id="copyEmailBtn" data-email="<?= h($email) ?>" title="Salin alamat email">
                <span class="copy-icon">📋</span>
                <span class="copy-label">Salin</span>
              </button>
            </div>
          </div>
        </div>

        <!-- Location Item -->
        <div class="contact-meta-item">
          <div class="meta-item-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 12 8 12s8-6.75 8-12a8 8 0 0 0-8-8z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
          </div>
          <div class="meta-item-details">
            <span class="meta-item-label">Lokasi &amp; Domisili</span>
            <strong class="meta-item-val"><?= h($lokasi) ?> (WIB / GMT+7)</strong>
          </div>
        </div>

        <!-- Working Hours Item -->
        <div class="contact-meta-item">
          <div class="meta-item-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"></circle>
              <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
          </div>
          <div class="meta-item-details">
            <span class="meta-item-label">Jam Aktif Diskusi</span>
            <strong class="meta-item-val">Senin – Sabtu, 08:00 – 19:00 WIB</strong>
          </div>
        </div>
      </div>

      <!-- Quick Collaboration Perks Tip Box -->
      <div class="collaboration-perks-box">
        <div class="perks-icon">💡</div>
        <div class="perks-text">
          <strong>Tips Memulai Kolaborasi</strong>
          <p>Sertakan ringkasan ide, perkiraan target waktu, dan skala proyek Anda agar kita dapat langsung mendiskusikan langkah teknis terbaik.</p>
        </div>
      </div>
    </div>

    <!-- Right Column: Interactive Contact Form -->
    <div class="contact-form-card">
      <div class="form-card-header">
        <h2 class="form-title">Kirim Pesan Langsung</h2>
        <p class="form-subtitle">Pilih topik cepat di bawah untuk mempermudah detail pesan Anda:</p>
      </div>

      <!-- Quick Topic Chips -->
      <div class="quick-topics-wrapper" id="quickTopicChips">
        <button type="button" class="quick-topic-chip" data-topic="Software Engineering" data-msg="Halo Putri, saya tertarik untuk mendiskusikan pembuatan aplikasi web/mobile dengan spesifikasi...">
          <span>💻 Software Engineering</span>
        </button>
        <button type="button" class="quick-topic-chip" data-topic="Desain Grafis" data-msg="Halo Putri, kami membutuhkan perancangan identitas brand visual / UI UX sistem untuk...">
          <span>🎨 Desain UI/UX</span>
        </button>
        <button type="button" class="quick-topic-chip" data-topic="Fotografi" data-msg="Halo Putri, saya ingin mengatur jadwal sesi fotografi studio/komersial/event untuk...">
          <span>📷 Fotografi</span>
        </button>
        <button type="button" class="quick-topic-chip" data-topic="Videografi" data-msg="Halo Putri, kami berencana memproduksi video profil sinematik/motion graphics untuk...">
          <span>🎬 Videografi</span>
        </button>
      </div>

      <!-- Form Submission -->
      <form class="contact-form-element" method="post" action="<?= BASE_URL ?>/kontak/kirim" novalidate id="contactForm">
        <!-- Anti-spam Honeypot -->
        <div class="hp" aria-hidden="true">
          <label>Website <input name="website" tabindex="-1" autocomplete="off"></label>
        </div>

        <!-- Nama Input -->
        <div class="form-group-item">
          <label for="inputNama" class="form-label">
            Nama Lengkap <span class="req-star">*</span>
          </label>
          <div class="input-field-wrap <?= isset($errors['nama']) ? 'has-error' : '' ?>">
            <span class="field-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </span>
            <input id="inputNama" name="nama" type="text" placeholder="Contoh: Budi Santoso" value="<?= h($old['nama'] ?? '') ?>" class="form-text-input" required>
          </div>
          <?php if (isset($errors['nama'])): ?>
            <span class="field-error-msg"><?= h($errors['nama']) ?></span>
          <?php endif; ?>
        </div>

        <!-- Email Input -->
        <div class="form-group-item">
          <label for="inputEmail" class="form-label">
            Alamat Email <span class="req-star">*</span>
          </label>
          <div class="input-field-wrap <?= isset($errors['email']) ? 'has-error' : '' ?>">
            <span class="field-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="2" y="4" width="20" height="16" rx="3"></rect>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L1 7"></path>
              </svg>
            </span>
            <input id="inputEmail" type="email" name="email" placeholder="nama@email.com" value="<?= h($old['email'] ?? '') ?>" class="form-text-input" required>
          </div>
          <?php if (isset($errors['email'])): ?>
            <span class="field-error-msg"><?= h($errors['email']) ?></span>
          <?php endif; ?>
        </div>

        <!-- Message Input -->
        <div class="form-group-item">
          <label for="isi" class="form-label">
            Detail Pesan atau Rencana Proyek <span class="req-star">*</span>
          </label>
          <div class="input-field-wrap textarea-wrap <?= isset($errors['isi']) ? 'has-error' : '' ?>">
            <textarea name="isi" id="isi" rows="5" maxlength="1000" placeholder="Ceritakan gambaran proyek, target waktu, atau ekspektasi yang Anda inginkan..." class="form-textarea-input" required><?= h($old['isi'] ?? '') ?></textarea>
          </div>
          
          <div class="textarea-counter-row">
            <div class="char-bar-track">
              <div class="char-bar-fill" id="charProgress"></div>
            </div>
            <span class="char-count-text"><span id="hitung">0</span>/1000 Karakter</span>
          </div>

          <?php if (isset($errors['isi'])): ?>
            <span class="field-error-msg"><?= h($errors['isi']) ?></span>
          <?php endif; ?>
        </div>

        <!-- Submit Button -->
        <button class="btn-submit-pill" type="submit" id="submitBtn">
          <span>Kirim Pesan Sekarang</span>
          <span class="submit-arrow-circle">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </span>
        </button>
      </form>
    </div>
  </div>
</section>
