<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\PesanService;
use App\Repositories\ProfilRepository;
use App\Helpers\Logger;

class KontakController extends Controller
{
    public function index(): void
    {
        $profil = (new ProfilRepository())->get();
        $this->view('kontak/index', [
            'title'  => 'Kontak & Kolaborasi',
            'profil' => $profil,
        ]);
        $this->clearForm();
    }

    public function store(): void
    {
        // Honeypot anti-spam: kolom "website" harus kosong.
        if (!empty($_POST['website'])) {
            $this->redirect('/kontak');
        }

        $service = new PesanService();
        $errors  = $service->validate($_POST);

        if ($errors) {
            $this->setErrors($errors);
            $this->setOld($_POST);
            $this->flash('danger', 'Pesan belum terkirim. Periksa kolom yang ditandai.');
            $this->redirect('/kontak');
        }

        try {
            $service->kirim($_POST);
            $this->clearForm();
            $this->flash('success', 'Terima kasih, pesan Anda sudah terkirim.');
        } catch (\Throwable $e) {
            Logger::error('Gagal menyimpan pesan: ' . $e->getMessage());
            $this->flash('danger', 'Pesan gagal dikirim. Coba lagi nanti.');
        }
        $this->redirect('/kontak');
    }
}
