<?php

namespace App\Repositories;

use App\Config\Database;

class PesanRepository
{
    public function create(array $d): int
    {
        $db = Database::getInstance();
        $s = $db->prepare('INSERT INTO pesan (nama, email, isi) VALUES (:nama, :email, :isi)');
        $s->execute($d);
        return (int) $db->lastInsertId();
    }
}
