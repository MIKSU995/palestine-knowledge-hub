<?php

/**
 * Static Exporter for GitHub Pages (docs/ directory)
 */

$baseUrl = 'http://127.0.0.1:8000';
$outputDir = __DIR__ . '/docs';
$githubRepo = 'palestine-knowledge-hub';

echo "Starting Static Export for GitHub Pages...\n";

// 1. Ensure docs/ directory exists
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0777, true);
}

// 2. Copy public assets (images, css, js) to docs/
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

if (is_dir(__DIR__ . '/public/images')) {
    copyRecursive(__DIR__ . '/public/images', $outputDir . '/images');
    echo "Copied public/images to docs/images\n";
}

if (is_dir(__DIR__ . '/public/build')) {
    copyRecursive(__DIR__ . '/public/build', $outputDir . '/build');
    echo "Copied public/build to docs/build\n";
}

// 3. Define routes to export
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

// Fetch articles dynamically to include individual article pages
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
    echo "Notice: Could not load Laravel model dynamically: " . $e->getMessage() . "\n";
}

// 4. Fetch HTML for each route and save to docs/
foreach ($routes as $route => $filename) {
    $url = $baseUrl . $route;
    echo "Fetching: $url -> docs/$filename\n";
    
    $context = stream_context_create([
        'http' => ['timeout' => 10, 'ignore_errors' => true]
    ]);
    
    $html = @file_get_contents($url, false, $context);
    
    if ($html === false) {
        echo "Error fetching $url\n";
        continue;
    }

    // Replace absolute localhost links and route URLs for GitHub Pages
    $html = str_replace('http://127.0.0.1:8000', '', $html);
    
    // Fix navigation hrefs to static .html files
    $replacements = [
        'href="/"' => 'href="index.html"',
        'href="/news"' => 'href="news.html"',
        'href="/timeline"' => 'href="timeline.html"',
        'href="/maps"' => 'href="maps.html"',
        'href="/articles"' => 'href="articles.html"',
        'href="/gallery"' => 'href="gallery.html"',
        'href="/resources"' => 'href="resources.html"',
        'href="/quiz"' => 'href="quiz.html"',
        'href="/bookmarks"' => 'href="bookmarks.html"',
        'src="/images/' => 'src="images/',
        'href="/images/' => 'href="images/',
    ];

    foreach ($replacements as $search => $replace) {
        $html = str_replace($search, $replace, $html);
    }

    // Save to target path
    $filePath = $outputDir . '/' . $filename;
    $fileSubDir = dirname($filePath);
    if (!is_dir($fileSubDir)) {
        mkdir($fileSubDir, 0777, true);
    }

    file_put_contents($filePath, $html);
    echo "Saved: docs/$filename (" . strlen($html) . " bytes)\n";
}

echo "Static Export Completed Successfully!\n";
