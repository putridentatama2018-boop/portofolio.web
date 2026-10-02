# Portofolio Multi-Disciplinary Creator & Software Engineer

Website portofolio interaktif dan modern berbasis **PHP Native 8+** dengan arsitektur **MVC + Service Layer + Repository Pattern**. 

Portofolio ini mengintegrasikan 4 pilar kompetensi utama:
1. 💻 **Software Engineering** (Web App, RESTful API, Database Architecture, Mobile App)
2. 📷 **Fotografi** (Landscape, Studio Lighting Portrait, Event & Color Grading)
3. 🎨 **Desain Grafis** (Brand Identity, UI/UX Design System, Poster & Editorial Visuals)
4. 🎬 **Editing Videografi** (Cinematic Film, Commercial Video, Motion Graphics, Sound Design)

## Fitur Unggulan
- **Hero Ambient Modern**: Layout bersih dengan ambient glow visual, badge status aktif, dan tombol aksi langsung.
- **4 Pilar Showcase Card**: Navigasi dan ringkasan visual untuk keempat pilar disiplin.
- **Filter Kategori Dinamis & Live Search**: Pencarian instan dan filter chip kategori dengan tema warna unik per pilar.
- **Progress Bar & Dynamic Counter**: Bar level keahlian dan angka statistik yang beranimasi otomatis menggunakan `IntersectionObserver`.
- **Halaman Detail Proyek**: Tampilan lengkap dengan banner bertema kategori, tags teknologi/tools, dan deskripsi komprehensif.
- **Dual Theme (Dark / Light Mode)**: Tersimpan otomatis di `localStorage`.
- **Formulir Kontak Aman**: Validasi di Service Layer, anti-spam honeypot, pola Post-Redirect-Get (PRG), dan logging transaksi.
- **Database-Driven**: Seluruh konten (profil, proyek, keahlian, pengalaman) terhubung dengan database MySQL.

## Cara Menjalankan di XAMPP
1. Pastikan folder berada di `C:\xampp\htdocs\portofolio\`.
2. Nyalakan service **Apache** dan **MySQL** di XAMPP Control Panel.
3. Import database `database/portofolio.sql` melalui phpMyAdmin (`http://localhost/phpmyadmin/`) atau terminal MySQL.
4. Buka di browser: `http://localhost/portofolio/public/`.

## Struktur Kode
```
portofolio/
├── app/
│   ├── Config/          # Konfigurasi database PDO Singleton
│   ├── Controllers/     # HomeController, ProyekController, KontakController
│   ├── Core/            # Router, Controller base, View renderer
│   ├── Exceptions/      # Custom Exception handling
│   ├── Helpers/         # Helper functions (HTML escaping, sanitasi)
│   ├── Repositories/    # Database queries (Repository Pattern)
│   ├── Services/        # Business logic layer & validasi form
│   └── Views/           # Template PHP (Layouts, Home, Proyek, Kontak, Detail)
├── config/database.php  # Konfigurasi koneksi MySQL
├── database/portofolio.sql # Schema & Seed Data 4 Pilar
├── public/              # Document root (index.php, CSS, JS, .htaccess)
└── routes/web.php       # Definisi rute aplikasi (/ , /proyek, /kontak)
```
