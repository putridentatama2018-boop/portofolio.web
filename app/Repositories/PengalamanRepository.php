<?php

namespace App\Repositories;

use App\Config\Database;

class PengalamanRepository
{
    public function all(): array
    {
        return Database::getInstance()->query('SELECT * FROM pengalaman ORDER BY urutan ASC')->fetchAll();
    }
}
