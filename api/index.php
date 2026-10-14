<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Handle maintenance mode
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Vercel serverless: filesystem is read-only except /tmp
// Create all required writable directories in /tmp
$tmpDirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/testing',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
    '/tmp/views',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Force IPv4 for database connections on Vercel
// Vercel Singapore resolves Supabase to IPv6 which is not supported
$dbHost = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?? null;
if ($dbHost && strpos($dbHost, ':') === false) { // not already an IPv6/IPv4 literal
    $resolved = gethostbynamel($dbHost);
    if ($resolved) {
        // Find first IPv4 address (not IPv6)
        foreach ($resolved as $ip) {
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                $_ENV['DB_HOST'] = $ip;
                putenv("DB_HOST=$ip");
                // Also update DB_URL if present
                $dbUrl = $_ENV['DB_URL'] ?? getenv('DB_URL') ?? null;
                if ($dbUrl) {
                    $newUrl = str_replace($dbHost, $ip, $dbUrl);
                    $_ENV['DB_URL'] = $newUrl;
                    putenv("DB_URL=$newUrl");
                }
                break;
            }
        }
    }
}

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Override storage path to /tmp for Vercel
$app->useStoragePath('/tmp/storage');

$app->handleRequest(Request::capture());