<?php

namespace App\Repositories;

use App\Config\Database;

class ProfilRepository
{
    public function get(): array
    {
        return Database::getInstance()->query('SELECT * FROM profil LIMIT 1')->fetch() ?: [];
    }
}
