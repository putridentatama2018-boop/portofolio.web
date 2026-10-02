<?php

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $c = require __DIR__ . '/../../config/database.php';
            $dsn = "mysql:host={$c['host']};dbname={$c['dbname']};charset={$c['charset']}";
            try {
                self::$instance = new PDO($dsn, $c['username'], $c['password'], [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {
                throw new PDOException('Koneksi database gagal.');
            }
        }
        return self::$instance;
    }
}
