<?php

/**
 * Universal Static Exporter for GitHub Pages (Root & docs/ Dual Deployment)
 */

$baseUrl = 'http://127.0.0.1:8000';
$outputDirs = [__DIR__, __DIR__ . '/docs'];

echo "Starting Universal Static Export for GitHub Pages...\n";

// Helper function to copy recursively
function copyRecursive($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0777, true);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                copyRecursive($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

// 1. Copy images and production vite build assets
foreach ($outputDirs as $targetDir) {
    if (is_dir(__DIR__ . '/public/images')) {
        copyRecursive(__DIR__ . '/public/images', $targetDir . '/images');
    }
    if (is_dir(__DIR__ . '/public/build')) {
        copyRecursive(__DIR__ . '/public/build', $targetDir . '/build');
    }
    file_put_contents($targetDir . '/.nojekyll', "# Disable Jekyll on GitHub Pages\n");
}

// 2. Define routes to export
$routes = [
    '/' => 'index.html',
    '/articles' => 'articles.html',
    '/timeline' => 'timeline.html',
    '/maps' => 'maps.html',
    '/gallery' => 'gallery.html',
    '/resources' => 'resources.html',
    '/quiz' => 'quiz.html',
    '/news' => 'news.html',
    '/bookmarks' => 'bookmarks.html',
];

// Load articles dynamically for individual article detail pages
try {
    require __DIR__ . '/vendor/autoload.php';
    $app = require_once __DIR__ . '/bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    $articles = \App\Models\Article::all();
    foreach ($articles as $article) {
        $routes['/articles/' . $article->slug] = 'articles/' . $article->slug . '.html';
    }
} catch (\Exception $e) {
    echo "Notice: Could not load Laravel model: " . $e->getMessage() . "\n";
}

// 3. Find compiled production asset paths from manifest.json
$cssFile = 'build/assets/app-DWG7i-0u.css';
$jsFile = 'build/assets/app-BfpX1doZ.js';

if (file_exists(__DIR__ . '/public/build/manifest.json')) {
    $manifest = json_decode(file_get_contents(__DIR__ . '/public/build/manifest.json'), true);
    if (isset($manifest['resources/css/app.css']['file'])) {
        $cssFile = 'build/' . $manifest['resources/css/app.css']['file'];
    }
    if (isset($manifest['resources/js/app.js']['file'])) {
        $jsFile = 'build/' . $manifest['resources/js/app.js']['file'];
    }
}

// 4. Process each route
foreach ($routes as $route => $filename) {
    $url = $baseUrl . $route;
    echo "Fetching $url -> $filename...\n";

    $context = stream_context_create([
        'http' => ['timeout' => 10, 'ignore_errors' => true]
    ]);

    $html = @file_get_contents($url, false, $context);

    if ($html === false) {
        echo "Error fetching $url\n";
        continue;
    }

    // Strip Vite hot-reload script tags if present in HTML
    $html = preg_replace('/<script type="module" src="http:\/\/[^"]+"><\/script>/i', '', $html);
    $html = preg_replace('/<link rel="stylesheet" href="http:\/\/[^"]+\/app\.css" \/>/i', '', $html);
    $html = preg_replace('/<script type="module" src="http:\/\/[^"]+\/app\.js"><\/script>/i', '', $html);

    // Replace absolute localhost links with relative static links
    $html = str_replace('http://127.0.0.1:8000', '', $html);

    // Calculate relative path depth for nested files (e.g. articles/slug.html)
    $depth = substr_count(trim($filename, '/'), '/');
    $relPrefix = $depth > 0 ? str_repeat('../', $depth) : '';

    // Fix CSS and JS asset paths
    $productionHeadAssets = '<link rel="stylesheet" href="' . $relPrefix . $cssFile . '">' . "\n" .
                           '<script type="module" src="' . $relPrefix . $jsFile . '"></script>';
    
    $html = str_replace('</head>', $productionHeadAssets . "\n</head>", $html);

    // Client-side helper for static GitHub Pages filter & search
    $staticFilterScript = <<<'JS'
<script>
    // Static GitHub Pages interactive filter handler
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const cat = urlParams.get('category') || urlParams.get('era') || urlParams.get('type');
        const search = urlParams.get('search');

        if (cat) {
            const items = document.querySelectorAll('.grid > div, .columns-1 > div, article');
            items.forEach(item => {
                const text = item.textContent || '';
                if (!text.toLowerCase().includes(cat.toLowerCase())) {
                    item.style.display = 'none';
                }
            });
        }

        if (search) {
            const items = document.querySelectorAll('.grid > div, .columns-1 > div, article');
            items.forEach(item => {
                const text = item.textContent || '';
                if (!text.toLowerCase().includes(search.toLowerCase())) {
                    item.style.display = 'none';
                }
            });
        }
    });
</script>
JS;

    $html = str_replace('</body>', $staticFilterScript . "\n</body>", $html);

    // Fix navigation hrefs, form actions, and image paths in HTML & JS strings
    $replacements = [
        'http://127.0.0.1:8000/images/' => $relPrefix . 'images/',
        'http://127.0.0.1:8000/build/' => $relPrefix . 'build/',
        'http://127.0.0.1:8000' => '',
        'href="/"' => 'href="' . $relPrefix . 'index.html"',
        'href="/news?refresh=1"' => 'href="javascript:location.reload()"',
        'href="/news?category=' => 'href="' . $relPrefix . 'news.html?category=',
        'href="/news"' => 'href="' . $relPrefix . 'news.html"',
        'href="/timeline?era=' => 'href="' . $relPrefix . 'timeline.html?era=',
        'href="/timeline"' => 'href="' . $relPrefix . 'timeline.html"',
        'href="/maps"' => 'href="' . $relPrefix . 'maps.html"',
        'href="/articles?category=' => 'href="' . $relPrefix . 'articles.html?category=',
        'href="/articles"' => 'href="' . $relPrefix . 'articles.html"',
        'href="/gallery?category=' => 'href="' . $relPrefix . 'gallery.html?category=',
        'href="/gallery"' => 'href="' . $relPrefix . 'gallery.html"',
        'href="/resources?type=' => 'href="' . $relPrefix . 'resources.html?type=',
        'href="/resources"' => 'href="' . $relPrefix . 'resources.html"',
        'href="/quiz"' => 'href="' . $relPrefix . 'quiz.html"',
        'href="/bookmarks"' => 'href="' . $relPrefix . 'bookmarks.html"',
        'href="/login"' => 'href="' . $relPrefix . 'index.html"',
        'action="/news"' => 'action="' . $relPrefix . 'news.html"',
        'action="/articles"' => 'action="' . $relPrefix . 'articles.html"',
        'action="/gallery"' => 'action="' . $relPrefix . 'gallery.html"',
        'action="/timeline"' => 'action="' . $relPrefix . 'timeline.html"',
        'action="/resources"' => 'action="' . $relPrefix . 'resources.html"',
        'src="/images/' => 'src="' . $relPrefix . 'images/',
        'href="/images/' => 'href="' . $relPrefix . 'images/',
        "'/images/" => "'" . $relPrefix . "images/",
        '"/images/' => '"' . $relPrefix . 'images/',
        'href="/articles/' => 'href="' . $relPrefix . 'articles/',
    ];

    foreach ($replacements as $search => $replace) {
        $html = str_replace($search, $replace, $html);
    }


    // Save to both root directory and docs/ directory
    foreach ($outputDirs as $targetDir) {
        $filePath = $targetDir . '/' . $filename;
        $fileSubDir = dirname($filePath);
        if (!is_dir($fileSubDir)) {
            mkdir($fileSubDir, 0777, true);
        }
        file_put_contents($filePath, $html);
    }
}

echo "Universal Static Export Completed Successfully!\n";
