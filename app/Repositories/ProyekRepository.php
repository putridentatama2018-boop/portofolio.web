<?php

namespace App\Repositories;

use App\Config\Database;
use PDO;

class ProyekRepository
{
    private PDO $db;

    public function __construct() { $this->db = Database::getInstance(); }

    public function all(): array
    {
        return $this->db->query('SELECT * FROM proyek ORDER BY unggulan DESC, tahun DESC, id DESC')->fetchAll();
    }

    public function findBySlug(string $slug): ?array
    {
        $s = $this->db->prepare('SELECT * FROM proyek WHERE slug = :slug');
        $s->execute(['slug' => $slug]);
        return $s->fetch() ?: null;
    }
}
