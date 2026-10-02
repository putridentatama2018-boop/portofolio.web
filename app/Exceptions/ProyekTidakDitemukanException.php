<?php

namespace App\Exceptions;

use Exception;

class ProyekTidakDitemukanException extends Exception
{
    public function __construct(string $message = 'Proyek tidak ditemukan.')
    {
        parent::__construct($message);
    }
}
