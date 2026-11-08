<?php

namespace App\Core;

class Router
{
    public function __construct(private array $routes) {}

    public function dispatch(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if (BASE_URL !== '' && str_starts_with($uri, BASE_URL)) {
            $uri = substr($uri, strlen(BASE_URL));
        } else {
            $baseWithoutPublic = preg_replace('#/public$#', '', BASE_URL);
            if ($baseWithoutPublic !== '' && str_starts_with($uri, $baseWithoutPublic)) {
                $uri = substr($uri, strlen($baseWithoutPublic));
            }
        }
        $uri = '/' . ltrim($uri, '/');
        if ($uri !== '/') {
            $uri = rtrim($uri, '/');
        }

        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        if ($method === 'HEAD') {
            $method = 'GET';
        }
        if (isset($this->routes[$method][$uri])) {
            [$class, $action] = $this->routes[$method][$uri];
            (new $class())->$action();
            return;
        }

        http_response_code(404);
        echo '404 - Halaman tidak ditemukan: ' . htmlspecialchars($uri);
    }
}
