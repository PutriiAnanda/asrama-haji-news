<?php

// Aktifkan pelaporan error agar terlihat di browser
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$storagePaths = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/plugins',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache',
    '/tmp/storage/bootstrap/cache',
];

foreach ($storagePaths as $path) {
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
}

putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

require __DIR__ . '/../public/index.php';