<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\PortofolioService;
use App\Exceptions\ProyekTidakDitemukanException;

class ProyekController extends Controller
{
    public function index(): void
    {
        $service = new PortofolioService();
        $data = $service->dataProyek();
        $data['title'] = 'Karya & Proyek';
        $this->view('proyek/index', $data);
    }

    public function detail(): void
    {
        $service = new PortofolioService();
        try {
            $p = $service->detailProyek((string) ($_GET['slug'] ?? ''));
            $profil = $service->dataBeranda()['profil'];
        } catch (ProyekTidakDitemukanException $e) {
            $this->flash('danger', $e->getMessage());
            $this->redirect('/proyek');
            return;
        }
        $this->view('proyek/detail', [
            'title'  => $p['judul'],
            'proyek' => $p,
            'profil' => $profil,
        ]);
    }
}
