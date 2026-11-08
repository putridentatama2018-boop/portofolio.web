-- =========================================================================
-- Portofolio Database Schema & Seed Data
-- =========================================================================

-- Profil pemilik portofolio
CREATE TABLE profil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    peran VARCHAR(150) NOT NULL,
    kampus VARCHAR(150) NOT NULL,
    tagline VARCHAR(255) NOT NULL,
    bio TEXT NOT NULL,
    email VARCHAR(120) NOT NULL,
    lokasi VARCHAR(100) NOT NULL
);

-- Proyek yang ditampilkan dengan 4 pilar utama
CREATE TABLE proyek (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(80) NOT NULL UNIQUE,
    judul VARCHAR(150) NOT NULL,
    kategori ENUM('Software Engineering', 'Fotografi', 'Desain Grafis', 'Videografi') NOT NULL,
    ringkasan VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    teknologi VARCHAR(255) NOT NULL,
    tahun YEAR NOT NULL,
    unggulan TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Keahlian (level 0-100) dikelompokkan ke dalam 4 bidang keahlian
CREATE TABLE keahlian (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(80) NOT NULL,
    kategori ENUM('Software Engineering', 'Fotografi', 'Desain Grafis', 'Videografi') NOT NULL,
    level TINYINT UNSIGNED NOT NULL
);

-- Pengalaman & organisasi
CREATE TABLE pengalaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    peran VARCHAR(120) NOT NULL,
    organisasi VARCHAR(120) NOT NULL,
    periode VARCHAR(40) NOT NULL,
    deskripsi TEXT NOT NULL,
    urutan INT NOT NULL DEFAULT 0
);

-- Pesan dari formulir kontak
CREATE TABLE pesan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL,
    isi TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ==================== SEED DATA ====================

INSERT INTO profil (nama, peran, kampus, tagline, bio, email, lokasi) VALUES
('Putri', 
 'Software Engineer & Multi-Disciplinary Creator', 
 'Politeknik Negeri Jember',
 'Membangun arsitektur perangkat lunak yang tangguh, meracik desain visual memukau, dan mengabadikan cerita melalui lensa & video sinematik.',
 'Saya adalah Software Engineer sekaligus Multi-Disciplinary Creative yang bergerak di persimpangan logika kode dan estetika visual. Berpengalaman dalam pengembangan perangkat lunak (web architecture, backend & mobile), fotografi profesional, desain grafis & branding, serta editing videografi sinematik. Setiap karya saya prioritaskan pada struktur yang bersih, presisi fungsional, dan estetika visual tingkat tinggi.',
 'putri.devcreative@gmail.com', 
 'Jawa Timur, Indonesia');

INSERT INTO proyek (slug, judul, kategori, ringkasan, deskripsi, teknologi, tahun, unggulan) VALUES
-- Software Engineering
('educore-lms-platform', 
 'EduCore LMS - Cloud Architecture & API Platform', 
 'Software Engineering',
 'Platform pembelajaran terintegrasi dengan RESTful API, arsitektur modular MVC, dan caching performa tinggi.',
 'Sistem Learning Management System (LMS) berbasis Web dengan arsitektur MVC dan Service Layer. Memiliki fitur autentikasi multi-role (Admin, Instruktur, Mahasiswa), manajemen modul interaktif, sistem kuis & penilaian otomatis, serta dashboard analitik performa. Dirancang dengan prinsip Clean Code, PSR-12, dan optimasi query database untuk menangani konkurensi tinggi secara aman dan stabil.',
 'PHP 8.3, MySQL, Redis, RESTful API, Tailwind CSS, Docker', 
 2026, 1),

('nettyzen-pos-system', 
 'Nettyzen POS & Mobile Ordering System', 
 'Software Engineering',
 'Sistem kasir cerdas & aplikasi mobile pemesanan kafe dengan sinkronisasi inventaris real-time.',
 'Aplikasi POS (Point of Sale) modern terintegrasi dengan mobile app pemesanan kafe. Mengimplementasikan arsitektur modular, manajemen state Flutter, push notification status pesanan via WebSockets, serta dashboard analitik penjualan harian dan manajemen stok bahan baku secara otomatis.',
 'Flutter, Laravel 11, MySQL, WebSockets, REST API', 
 2026, 1),

('smart-library-system', 
 'Smart Campus Library Management', 
 'Software Engineering',
 'Sistem sirkulasi peminjaman buku kampus dengan validasi aturan bisnis ketat dan Repository Pattern.',
 'Aplikasi pengelolaan katalog buku dan sirkulasi peminjaman dengan aturan bisnis handal (stok otomatis, batas kuota pinjam, denda keterlambatan). Menggunakan arsitektur MVC bersih, Repository Pattern untuk abstraksi data, proteksi CSRF, pola Post-Redirect-Get, dan pencatatan audit log transaksi.',
 'PHP Native, MySQL, PDO, Bootstrap 5, Chart.js', 
 2025, 0),

-- Fotografi
('silent-horizons-landscape', 
 'Silent Horizons: Landscape & Nature Series', 
 'Fotografi',
 'Eksplorasi visual lanskap alam Jawa Timur dengan teknik long exposure dan pencahayaan golden hour.',
 'Seri fotografi editorial dan fine art yang memadukan kemegahan lanskap vulkanik Bromo - Ijen dan pesisir selatan Jawa Timur. Menerapkan teknik long exposure, natural color balancing, tone curve grading presisi di Adobe Lightroom, dan dynamic range optimization untuk menghasilkan visual yang dramatis dan emosional.',
 'Sony Alpha A7 IV, Sony FE 24-70mm f/2.8 GM, Adobe Lightroom Classic, Camera Raw', 
 2026, 1),

('urban-faces-portraiture', 
 'Urban Faces: Studio Lighting & Portraiture', 
 'Fotografi',
 'Koleksi foto potret editorial dengan teknik three-point lighting dan skin-tone retouching profesional.',
 'Proyek pemotretan potret model studio dan street photography dengan penataan cahaya strobo studio, diffuser, dan rim light. Proses pascaproduksi mencakup frequency separation untuk tekstur kulit natural, color grading sinematik, dan kurasi komposisi rasio emas (rule of thirds & golden ratio).',
 'Sony A7 III, 85mm f/1.4 Art, Godox AD200Pro Studio Strobe, Photoshop Retouching', 
 2026, 1),

('campus-cultural-moments', 
 'Campus Cultural & Stage Photography', 
 'Fotografi',
 'Dokumentasi fotografi panggung, ekspresi mahasiswa, dan dinamika kegiatan berskala nasional.',
 'Liputan fotografi resmi untuk gelaran festival teknologi dan seminar nasional. Menangkap momen spontan (candid), interaksi pembicara, antusiasme peserta, serta atmosfer panggung dengan kontrol low-light ISO tinggi dan kecepatan rana dinamis.',
 'Sony A7 III, 70-200mm f/2.8, Adobe Lightroom, Capture One', 
 2025, 0),

-- Desain Grafis
('aethel-brand-identity', 
 'Aethel Identity & Visual Design System', 
 'Desain Grafis',
 'Identitas visual komprehensif, logo system modular, panduan tipografi, dan packaging startup.',
 'Perancangan identitas brand holistik dari nol untuk brand digital. Mencakup logo modular geometris, hierarki tipografi kustom, panduan palet warna brand, mockup kemasan premium, desain aset media sosial, dan design system UI library yang konsisten.',
 'Adobe Illustrator, Photoshop, Figma, Brand Guidelines, Vector Art', 
 2026, 1),

('epim-creative-visuals', 
 'EPIM Creative Poster & Event Assets', 
 'Desain Grafis',
 'Desain poster promosi futuristik 3D, kartu identitas peserta, booklet acara, dan visual merchandise.',
 'Materi visual promosi acara teknologi tahunan mencakup master poster bertema cyber-futuristic, efek glassmorphism, manipulasi foto tingkat tinggi di Photoshop, serta tata letak editorial guidebook yang rapi, ergonomis, dan memikat.',
 'Adobe Photoshop, Adobe InDesign, Illustrator, 3D Mockup', 
 2026, 1),

('finwise-ui-ux-system', 
 'FinWise Mobile UI/UX Design System', 
 'Desain Grafis',
 'Desain antarmuka aplikasi finansial modern dengan micro-interactions dan komponen atomik.',
 'Rancangan antarmuka pengguna (UI) dan alur pengalaman pengguna (UX) untuk aplikasi dompet digital. Menghasilkan wireframe interaktif, user journey mapping, design token yang konsisten, dark mode system, dan prototipe animasi interaksi interaktif di Figma.',
 'Figma, Adobe XD, Design Systems, Wireframing, User Research', 
 2025, 0),

-- Videografi
('echoes-of-youth-film', 
 'Echoes of Youth - Cinematic Brand Film', 
 'Videografi',
 'Film pendek komersial bernuansa sinematik dengan color grading DaVinci Resolve dan sound design imersif.',
 'Produksi dan pascaproduksi video narasi visual berdurasi 3 menit. Mengintegrasikan teknik multi-cam cutting, sound design spatial multi-track (Foley, ambience, score), transisi seamless match cut, dan color grading berbasis film look emulation di DaVinci Resolve Studio.',
 'DaVinci Resolve Studio, Adobe Premiere Pro, Film LUTs, Adobe Audition', 
 2026, 1),

('epim-teaser-motion', 
 'EPIM 2026 Official Teaser & Motion Graphics', 
 'Videografi',
 'Video promosi dinamis berkecepatan tinggi dengan kinetic typography 3D dan animasi bumper.',
 'Video teaser berdurasi 60 detik untuk media sosial dan layar panggung utama. Menampilkan tipografi kinetik yang sinkron dengan ketukan musik, efek 3D camera tracking, glitch visual yang presisi, dan animasi logo bumper 3D futuristik.',
 'Adobe After Effects, Premiere Pro, Blender 3D, Sound Design', 
 2026, 1),

('tech-summit-aftermovie', 
 'Tech Summit Highlights & Aftermovie', 
 'Videografi',
 'Dokumentasi ritme cepat (fast-paced) festival teknologi dengan transisi dinamis dan audio balance.',
 'Penyuntingan video recap acara 2 hari yang memadukan footage 4K 60fps, speed ramping, transisi zoom & whip pan, sinkronisasi audio wawancara naratif, dan koreksi warna seimbang untuk kebutuhan dokumentasi resmi.',
 'Adobe Premiere Pro, After Effects, DaVinci Resolve', 
 2025, 0);

-- Keahlian dikelompokkan dalam 4 pilar
INSERT INTO keahlian (nama, kategori, level) VALUES
-- Software Engineering
('PHP & Modern Frameworks (Laravel, MVC)', 'Software Engineering', 90),
('JavaScript, TypeScript & React / Vue', 'Software Engineering', 86),
('Database Architecture (MySQL, Redis)', 'Software Engineering', 85),
('RESTful API, WebSockets & Security', 'Software Engineering', 88),
('Git, Docker & Deployment Workflows', 'Software Engineering', 82),

-- Fotografi
('Portrait & Studio Lighting (Strobe, Diffuser)', 'Fotografi', 92),
('Landscape & Architectural Photography', 'Fotografi', 88),
('Adobe Lightroom Classic & Color Science', 'Fotografi', 94),
('Adobe Camera Raw & High-End Retouching', 'Fotografi', 87),
('Composition & Visual Art Direction', 'Fotografi', 90),

-- Desain Grafis
('Adobe Illustrator (Vector & Brand Identity)', 'Desain Grafis', 94),
('Adobe Photoshop (Photo Manipulation & Poster)', 'Desain Grafis', 92),
('Figma & UI/UX Design Systems', 'Desain Grafis', 88),
('Typography & Editorial Layout Design', 'Desain Grafis', 86),
('Social Media & Commercial Visual Assets', 'Desain Grafis', 90),

-- Videografi
('Adobe Premiere Pro (Narrative & Commercial Editing)', 'Videografi', 94),
('DaVinci Resolve Studio (Color Grading & Science)', 'Videografi', 90),
('Adobe After Effects (Motion Graphics & VFX)', 'Videografi', 85),
('Sound Design, Foley & Audio Mixing', 'Videografi', 88),
('Cinematic Storytelling & Rhythm Pacing', 'Videografi', 92);

-- Pengalaman
INSERT INTO pengalaman (peran, organisasi, periode, deskripsi, urutan) VALUES
('Lead Developer & Creative Media Director', 'HMJTI / Lab Informatika', '2025 - Sekarang',
 'Mengembangkan sistem informasi berbasis web, memimpin tim multimedia untuk produksi dokumentasi video sinematik, desain identitas grafis acara, dan fotografi resmi.', 1),
('Full Stack Software Engineer & Multi-Disciplinary Freelancer', 'Creative Studio & Freelance', '2024 - Sekarang',
 'Mengerjakan web aplikasi kustom, rancangan UI/UX, proyek fotografi komersial, identitas brand perusahaan, dan video editing kreatif untuk berbagai klien.', 2),
('Divisi Multimedia, Videografi & Branding', 'EPIM (Ekspresi Pemuda Informatika)', '2025 - 2026',
 'Bertanggung jawab atas perancangan guidebook visual, video teaser promosi nasional, bumper animasi, dan liputan fotografi panggung utama.', 3),
('Mahasiswa D4 Teknik Informatika', 'Politeknik Negeri Jember', '2023 - Sekarang',
 'Fokus mendalami rekayasa perangkat lunak, arsitektur basis data, algoritma, serta komunikasi seni visual digital.', 4);
