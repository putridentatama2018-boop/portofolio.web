<?php

$baseDir = __DIR__;
$sourceDir = $baseDir . DIRECTORY_SEPARATOR . 'salinan_siap_hosting';
$zipFile = $baseDir . DIRECTORY_SEPARATOR . 'portofolio-infinityfree-siap-upload.zip';

// Helper fungsi salin folder rekursif
function copyRecursive($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0777, true);
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

// Sinkronisasi file terbaru dari project utama
echo "1. Menyinkronkan file aplikasi terbaru ke salinan_siap_hosting...\n";
copyRecursive($baseDir . '/app', $sourceDir . '/app');
copyRecursive($baseDir . '/routes', $sourceDir . '/routes');
copyRecursive($baseDir . '/database', $sourceDir . '/database');
copyRecursive($baseDir . '/public/assets', $sourceDir . '/assets');

if (file_exists($zipFile)) {
    unlink($zipFile);
}

echo "2. Mengompresi paket hosting ke file ZIP...\n";
$zip = new ZipArchive();
if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
    die("Error: Gagal membuat file zip.\n");
}

$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($sourceDir, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

$count = 0;
foreach ($files as $file) {
    $filePath = $file->getRealPath();
    $relativePath = str_replace('\\', '/', substr($filePath, strlen($sourceDir) + 1));

    if ($file->isDir()) {
        $zip->addEmptyDir($relativePath);
    } else {
        $zip->addFile($filePath, $relativePath);
    }
    $count++;
}

$zip->close();
echo "BERHASIL: File ZIP '$zipFile' (" . round(filesize($zipFile)/1024, 2) . " KB) siap di-upload ke InfinityFree!\n";
