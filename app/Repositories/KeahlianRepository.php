<?php

namespace App\Repositories;

use App\Config\Database;

class KeahlianRepository
{
    public function all(): array
    {
        return Database::getInstance()->query('SELECT * FROM keahlian ORDER BY kategori, level DESC')->fetchAll();
    }
}
