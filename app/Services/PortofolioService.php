<?php

namespace App\Services;

use App\Repositories\{ProfilRepository, ProyekRepository, KeahlianRepository, PengalamanRepository};
use App\Exceptions\ProyekTidakDitemukanException;

class PortofolioService
{
    private ProyekRepository $proyek;
    private ProfilRepository $profil;
    private KeahlianRepository $keahlian;
    private PengalamanRepository $pengalaman;

    public function __construct()
    {
        $this->proyek = new ProyekRepository();
        $this->profil = new ProfilRepository();
        $this->keahlian = new KeahlianRepository();
        $this->pengalaman = new PengalamanRepository();
    }

    public function dataBeranda(): array
    {
        $daftarProyek = $this->proyek->all();
        $keahlian = [];
        foreach ($this->keahlian->all() as $k) {
            $keahlian[$k['kategori']][] = $k;
        }

        return [
            'profil'         => $this->profil->get(),
            'totalProyek'    => count($daftarProyek),
            'proyekUnggulan' => array_values(array_filter($daftarProyek, fn($p) => !empty($p['unggulan']))),
            'keahlian'       => $keahlian,
            'pengalaman'     => $this->pengalaman->all(),
        ];
    }

    public function dataProyek(): array
    {
        $daftarProyek = $this->proyek->all();
        return [
            'profil'       => $this->profil->get(),
            'daftarProyek' => $daftarProyek,
            'kategori'     => array_values(array_unique(array_column($daftarProyek, 'kategori'))),
        ];
    }

    public function detailProyek(string $slug): array
    {
        $p = $this->proyek->findBySlug($slug);
        if (!$p) {
            throw new ProyekTidakDitemukanException();
        }
        return $p;
    }
}
