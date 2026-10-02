<?php

function h(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}

function getKatSlug(string $k): string
{
    return strtolower(str_replace(' ', '-', $k));
}

function getKatIcon(string $k): string
{
    $slug = getKatSlug($k);
    return match($slug) {
        'software-engineering' => '💻',
        'fotografi'            => '📷',
        'desain-grafis'        => '🎨',
        'videografi'           => '🎬',
        default                => '✨'
    };
}
