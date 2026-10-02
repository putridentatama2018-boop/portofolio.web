<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\PortofolioService;

class HomeController extends Controller
{
    public function index(): void
    {
        $data = (new PortofolioService())->dataBeranda();
        $data['title'] = 'Beranda';
        $this->view('home/index', $data);
        $this->clearForm();
    }
}
