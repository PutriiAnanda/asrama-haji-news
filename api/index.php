<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

try {
    // Buat direktori temporer yang diizinkan Vercel
    $storagePaths = [
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/plugins',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/cache',
        '/tmp/storage/bootstrap/cache',
        '/tmp/storage/logs',
    ];

    foreach ($storagePaths as $path) {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    // Alihkan environment path Laravel ke /tmp agar bisa menulis file/log
    putenv('APP_STORAGE=/tmp/storage');
    putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
    
    // Paksa jalur log agar masuk ke direktori /tmp yang bisa ditulis
    $_M = $_SERVER;
    $_ENV['LOG_CHANNEL'] = 'errorlog';

    require __DIR__ . '/../public/index.php';

} catch (\Throwable $e) {
    echo '<h1 style="color: red;">Terjadi Kesalahan Server (PHP Exception):</h1>';
    echo '<pre>' . htmlspecialchars($e->getMessage()) . '</pre>';
    echo '<h3>File:</h3> ' . $e->getFile() . ' pada baris ' . $e->getLine();
    echo '<h3>Trace:</h3><pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
}