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

function getKatSvgIcon(string $k, int $size = 18): string
{
    $slug = getKatSlug($k);
    return match($slug) {
        'software-engineering' => <<<SVG
<svg width="{$size}" height="{$size}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <polyline points="16 18 22 12 16 6"/>
  <polyline points="8 6 2 12 8 18"/>
  <line x1="14" y1="4" x2="10" y2="20"/>
</svg>
SVG,
        'fotografi' => <<<SVG
<svg width="{$size}" height="{$size}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <circle cx="12" cy="12" r="10"/>
  <line x1="14.31" y1="8" x2="20.05" y2="17.94"/>
  <line x1="9.69" y1="8" x2="21.17" y2="8"/>
  <line x1="7.38" y1="12" x2="13.12" y2="2.06"/>
  <line x1="9.69" y1="16" x2="3.95" y2="6.06"/>
  <line x1="14.31" y1="16" x2="2.83" y2="16"/>
  <line x1="16.62" y1="12" x2="10.88" y2="21.94"/>
</svg>
SVG,
        'desain-grafis' => <<<SVG
<svg width="{$size}" height="{$size}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <polygon points="12 2 2 7 12 12 22 7 12 2"/>
  <polyline points="2 17 12 22 22 17"/>
  <polyline points="2 12 12 17 22 12"/>
</svg>
SVG,
        'videografi' => <<<SVG
<svg width="{$size}" height="{$size}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <polygon points="23 7 16 12 23 17 23 7"/>
  <rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>
</svg>
SVG,
        default => <<<SVG
<svg width="{$size}" height="{$size}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
</svg>
SVG
    };
}

function getProyekImage(string $slug): string
{
    return match($slug) {
        'nettyzen-pos-system'       => 'proj-nexora.png',
        'silent-horizons-landscape' => 'proj-travelease.png',
        'finwise-ui-ux-system'      => 'proj-fitlife.png',
        'educore-lms-platform'      => 'proj-taskflow.png',
        'smart-library-system'      => 'project-card-1.jpg',
        'urban-faces-portraiture', 'campus-cultural-moments' => 'project-card-2.jpg',
        'aethel-brand-identity', 'epim-creative-visuals'     => 'project-card-3.jpg',
        'echoes-of-youth-film', 'epim-teaser-motion', 'tech-summit-aftermovie' => 'proj-travelease.png',
        default                     => 'proj-nexora.png'
    };
}
