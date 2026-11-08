<?php

namespace App\Core;

abstract class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);
        $file = __DIR__ . '/../Views/' . $view . '.php';
        if (!file_exists($file)) {
            throw new \RuntimeException("View '{$view}' tidak ditemukan.");
        }
        ob_start();
        require $file;
        $content = ob_get_clean();
        require __DIR__ . '/../Views/layouts/main.php';
    }

    protected function redirect(string $url): void
    {
        header('Location: ' . BASE_URL . $url);
        exit;
    }

    protected function flash(string $type, string $message): void
    {
        unset($_SESSION['flash']);
    }

    protected function setOld(array $d): void    { $_SESSION['old'] = $d; }
    protected function setErrors(array $e): void { $_SESSION['errors'] = $e; }
    protected function clearForm(): void         { unset($_SESSION['old'], $_SESSION['errors']); }
}
