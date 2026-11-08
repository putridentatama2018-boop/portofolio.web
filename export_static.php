<?php

$repoPrefix = '/portofolio.web';
$baseLocal = 'http://localhost/portofolio';

function copyRecursive($src, $dst) {
    @mkdir($dst, 0777, true);
    $dir = opendir($src);
    while (false !== ($file = readdir($dir))) {
        if ($file != '.' && $file != '..') {
            if (is_dir($src . '/' . $file)) {
                copyRecursive($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

echo "1. Salin aset ke root/assets dan docs/assets...\n";
copyRecursive(__DIR__ . '/public/assets', __DIR__ . '/assets');
copyRecursive(__DIR__ . '/public/assets', __DIR__ . '/docs/assets');

function formatHtmlForPages($html) {
    global $repoPrefix;
    // Ganti assets path
    $html = str_replace('/portofolio/public/assets/', $repoPrefix . '/assets/', $html);
    $html = str_replace('/portofolio/assets/', $repoPrefix . '/assets/', $html);
    
    // Ganti internal navigation links
    $html = str_replace('/portofolio/public/proyek/detail?slug=', $repoPrefix . '/proyek/detail/', $html);
    $html = str_replace('/portofolio/public/proyek', $repoPrefix . '/proyek/', $html);
    $html = str_replace('/portofolio/public/kontak', $repoPrefix . '/kontak/', $html);
    $html = str_replace('/portofolio/public/#', $repoPrefix . '/#', $html);
    $html = str_replace('/portofolio/public/', $repoPrefix . '/', $html);
    $html = str_replace('/portofolio/public', $repoPrefix . '/', $html);

    return $html;
}

echo "2. Export halaman Beranda (index.html)...\n";
$homeHtml = file_get_contents($baseLocal . '/');
$homeFormatted = formatHtmlForPages($homeHtml);
file_put_contents(__DIR__ . '/index.html', $homeFormatted);
@mkdir(__DIR__ . '/docs', 0777, true);
file_put_contents(__DIR__ . '/docs/index.html', $homeFormatted);

echo "3. Export halaman Proyek (proyek/index.html)...\n";
$proyekHtml = file_get_contents($baseLocal . '/proyek');
$proyekFormatted = formatHtmlForPages($proyekHtml);
@mkdir(__DIR__ . '/proyek', 0777, true);
file_put_contents(__DIR__ . '/proyek/index.html', $proyekFormatted);
@mkdir(__DIR__ . '/docs/proyek', 0777, true);
file_put_contents(__DIR__ . '/docs/proyek/index.html', $proyekFormatted);

echo "4. Export halaman Kontak (kontak/index.html)...\n";
$kontakHtml = file_get_contents($baseLocal . '/kontak');
$kontakFormatted = formatHtmlForPages($kontakHtml);
@mkdir(__DIR__ . '/kontak', 0777, true);
file_put_contents(__DIR__ . '/kontak/index.html', $kontakFormatted);
@mkdir(__DIR__ . '/docs/kontak', 0777, true);
file_put_contents(__DIR__ . '/docs/kontak/index.html', $kontakFormatted);

echo "5. Export detail proyek...\n";
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Config/Database.php';
$db = App\Config\Database::getInstance();
$slugs = $db->query("SELECT slug FROM proyek")->fetchAll(PDO::FETCH_COLUMN);

foreach ($slugs as $slug) {
    echo " - Exporting detail: {$slug}...\n";
    $detailHtml = file_get_contents($baseLocal . '/proyek/detail?slug=' . urlencode($slug));
    $detailFormatted = formatHtmlForPages($detailHtml);
    
    // Ganti form action atau detail WhatsApp
    @mkdir(__DIR__ . '/proyek/detail/' . $slug, 0777, true);
    file_put_contents(__DIR__ . '/proyek/detail/' . $slug . '/index.html', $detailFormatted);
    @mkdir(__DIR__ . '/docs/proyek/detail/' . $slug, 0777, true);
    file_put_contents(__DIR__ . '/docs/proyek/detail/' . $slug . '/index.html', $detailFormatted);
}

// Router fallback
$routerScript = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Mengalihkan ke Detail Proyek...</title>
<script>
  const urlParams = new URLSearchParams(window.location.search);
  const slug = urlParams.get('slug');
  if (slug) {
    window.location.replace(slug + '/');
  } else {
    window.location.replace('../');
  }
</script>
</head>
<body>
<p>Mengalihkan ke detail proyek...</p>
</body>
</html>
HTML;
file_put_contents(__DIR__ . '/proyek/detail/index.html', $routerScript);
file_put_contents(__DIR__ . '/docs/proyek/detail/index.html', $routerScript);

// Buat file .nojekyll agar GitHub Pages tidak mengabaikan aset dengan underscore
file_put_contents(__DIR__ . '/.nojekyll', '');
file_put_contents(__DIR__ . '/docs/.nojekyll', '');

echo "SELESAI! Seluruh file static GitHub Pages berhasil dibuat.\n";
