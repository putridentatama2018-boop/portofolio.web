<?php

namespace App\Services;

use App\Repositories\PesanRepository;
use App\Helpers\Logger;

class PesanService
{
    public function validate(array $in): array
    {
        $e = [];
        if (trim($in['nama'] ?? '') === '') {
            $e['nama'] = 'Nama wajib diisi.';
        }
        if (!filter_var(trim($in['email'] ?? ''), FILTER_VALIDATE_EMAIL)) {
            $e['email'] = 'Format email tidak valid.';
        }
        $len = mb_strlen(trim($in['isi'] ?? ''));
        if ($len < 10) {
            $e['isi'] = 'Pesan minimal 10 karakter.';
        } elseif ($len > 1000) {
            $e['isi'] = 'Pesan maksimal 1000 karakter.';
        }
        return $e;
    }

    public function kirim(array $in): void
    {
        $id = (new PesanRepository())->create([
            'nama'  => mb_substr(trim($in['nama']), 0, 100),
            'email' => trim($in['email']),
            'isi'   => trim($in['isi']),
        ]);
        Logger::info("Pesan masuk: ID={$id}");
    }
}
