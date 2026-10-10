<?php

// Pastikan direktori storage darurat tersedia di lingkungan serverless
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