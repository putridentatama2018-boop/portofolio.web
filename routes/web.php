<?php

use App\Controllers\HomeController;
use App\Controllers\ProyekController;
use App\Controllers\KontakController;

return [
    'GET' => [
        '/'              => [HomeController::class, 'index'],
        '/proyek'        => [ProyekController::class, 'index'],
        '/proyek/detail' => [ProyekController::class, 'detail'],
        '/kontak'        => [KontakController::class, 'index'],
    ],
    'POST' => [
        '/kontak/kirim'  => [KontakController::class, 'store'],
    ],
];
