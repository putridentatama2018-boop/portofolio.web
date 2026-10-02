<?php
$errors = $_SESSION['errors'] ?? [];
$old    = $_SESSION['old'] ?? [];
?>
<section class="sec page-kontak-sec">
  <div class="sec-header sec-header-center">
    <div class="section-tag-pill">
      <span>✉️ Let's Collaborate</span>
    </div>
    <h2>Mari Memulai Sesuatu yang Hebat</h2>
    <span class="sec-sub">Punya ide proyek, kebutuhan rekayasa perangkat lunak, produksi fotografi, identitas grafis, atau video editing? Saya siap berdiskusi.</span>
  </div>

  <div class="contact-layout-grid">
    <!-- Contact Info Column -->
    <div class="contact-info-card interactive-tilt">
      <div class="contact-card-glow" aria-hidden="true"></div>
      
      <div class="contact-header-content">
        <span class="contact-kicker-badge">💬 Diskusi Terbuka</span>
        <h3>Terhubung &amp; Konsultasi Proyek</h3>
        <p>Saya selalu terbuka untuk mendiskusikan peluang kolaborasi freelance, kontrak profesional, maupun ide-ide eksperimental lintas teknologi dan multimedia visual.</p>
      </div>

      <div class="contact-meta-cards">
        <div class="meta-item-box">
          <div class="meta-icon-box">📧</div>
          <div class="meta-info-box">
            <span class="meta-label">Email Resmi</span>
            <div class="mail-copy-row">
              <a class="contact-mail-link" href="mailto:<?= h($profil['email'] ?? '') ?>" id="emailAddressLink"><?= h($profil['email'] ?? 'putri.devcreative@gmail.com') ?></a>
              <button type="button" class="btn-copy-chip" id="copyEmailBtn" data-email="<?= h($profil['email'] ?? '') ?>" title="Salin alamat email">
                <span class="copy-icon">📋</span>
                <span class="copy-label">Salin</span>
              </button>
            </div>
          </div>
        </div>

        <div class="meta-item-box">
          <div class="meta-icon-box">📍</div>
          <div class="meta-info-box">
            <span class="meta-label">Lokasi &amp; Domisili</span>
            <strong class="meta-val-text"><?= h($profil['lokasi'] ?? 'Jawa Timur, Indonesia') ?></strong>
          </div>
        </div>

        <div class="meta-item-box">
          <div class="meta-icon-box">🟢</div>
          <div class="meta-info-box">
            <span class="meta-label">Status Ketersediaan</span>
            <strong class="meta-val-text text-green">Menerima Proyek Baru &amp; Konsultasi</strong>
          </div>
        </div>

        <div class="meta-item-box">
          <div class="meta-icon-box">⚡</div>
          <div class="meta-info-box">
            <span class="meta-label">Estimasi Waktu Respon</span>
            <strong class="meta-val-text">Biasanya &le; 24 Jam Kerja</strong>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact Form Column -->
    <div class="contact-form-card interactive-tilt">
      <div class="contact-card-glow" aria-hidden="true"></div>
      
      <div class="form-header-intro">
        <h3>Kirim Pesan Langsung</h3>
        <p>Pilih topik cepat di bawah untuk mempermudah detail pesan Anda:</p>
      </div>

      <!-- Quick Topic Chips -->
      <div class="quick-topics-row" id="quickTopicChips">
        <button type="button" class="quick-topic-chip" data-topic="Software Engineering" data-msg="Halo Putri, saya tertarik untuk mendiskusikan pengembangan web/aplikasi untuk kebutuhan...">💻 Software App</button>
        <button type="button" class="quick-topic-chip" data-topic="Fotografi" data-msg="Halo Putri, saya tertarik untuk sesi pemotretan potret/katalog/liputan event pada tanggal...">📷 Fotografi</button>
        <button type="button" class="quick-topic-chip" data-topic="Desain Grafis" data-msg="Halo Putri, kami membutuhkan perancangan identitas brand visual / UI UX system untuk...">🎨 Desain Grafis</button>
        <button type="button" class="quick-topic-chip" data-topic="Videografi" data-msg="Halo Putri, kami ingin membuat video promosi/sinematik dengan konsep...">🎬 Videografi</button>
      </div>

      <form class="contact-form" method="post" action="<?= BASE_URL ?>/kontak/kirim" novalidate id="contactForm">
        <div class="hp" aria-hidden="true"><label>Website <input name="website" tabindex="-1" autocomplete="off"></label></div>

        <div class="form-field-group">
          <label for="inputNama">Nama Lengkap <span class="req-star">*</span></label>
          <div class="input-wrap">
            <span class="input-icon">👤</span>
            <input id="inputNama" name="nama" placeholder="Contoh: Budi Santoso" value="<?= h($old['nama'] ?? '') ?>" class="form-input <?= isset($errors['nama']) ? 'err' : '' ?>" required>
          </div>
          <?php if (isset($errors['nama'])): ?><span class="msg-feedback"><?= h($errors['nama']) ?></span><?php endif; ?>
        </div>

        <div class="form-field-group">
          <label for="inputEmail">Alamat Email <span class="req-star">*</span></label>
          <div class="input-wrap">
            <span class="input-icon">✉️</span>
            <input id="inputEmail" type="email" name="email" placeholder="nama@email.com" value="<?= h($old['email'] ?? '') ?>" class="form-input <?= isset($errors['email']) ? 'err' : '' ?>" required>
          </div>
          <?php if (isset($errors['email'])): ?><span class="msg-feedback"><?= h($errors['email']) ?></span><?php endif; ?>
        </div>

        <div class="form-field-group">
          <label for="isi">Detail Pesan atau Rencana Proyek <span class="req-star">*</span></label>
          <div class="input-wrap">
            <textarea name="isi" id="isi" rows="6" maxlength="1000" placeholder="Ceritakan gambaran proyek, target waktu, atau ekspektasi yang Anda inginkan..." class="form-textarea <?= isset($errors['isi']) ? 'err' : '' ?>" required><?= h($old['isi'] ?? '') ?></textarea>
          </div>
          
          <div class="textarea-counter-bar">
            <div class="char-progress-track">
              <div class="char-progress-fill" id="charProgress"></div>
            </div>
            <span class="count"><span id="hitung">0</span>/1000 Karakter</span>
          </div>

          <?php if (isset($errors['isi'])): ?><span class="msg-feedback"><?= h($errors['isi']) ?></span><?php endif; ?>
        </div>

        <button class="btn btn-primary submit-btn" type="submit" id="submitBtn">
          <span>Kirim Pesan Sekarang</span>
          <svg class="submit-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
      </form>
    </div>
  </div>
</section>
