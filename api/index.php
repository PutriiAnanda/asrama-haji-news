<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

try {
    $tmpStorage = '/tmp/storage';
    $storagePaths = [
        $tmpStorage . '/framework/views',
        $tmpStorage . '/framework/sessions',
        $tmpStorage . '/framework/cache',
        $tmpStorage . '/framework/testing',
        $tmpStorage . '/logs',
        $tmpStorage . '/bootstrap/cache',
    ];

    foreach ($storagePaths as $path) {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    putenv('APP_STORAGE=' . $tmpStorage);
    putenv('VIEW_COMPILED_PATH=' . $tmpStorage . '/framework/views');
    $_ENV['LOG_CHANNEL'] = 'errorlog';

    // Autoload Composer
    require __DIR__ . '/../vendor/autoload.php';

    // Inisialisasi Aplikasi Laravel
    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // Register provider inti yang dibutuhkan Laravel di serverless
    $app->register(\Illuminate\Filesystem\FilesystemServiceProvider::class);
    $app->register(\Illuminate\View\ViewServiceProvider::class);
    $app->register(\Illuminate\Events\EventServiceProvider::class);
    $app->register(\Illuminate\Routing\RoutingServiceProvider::class);

    // Jalankan Request melalui HTTP Kernel
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );

    $response->send();

    $kernel->terminate($request, $response);

} catch (\Throwable $e) {
    echo '<h1 style="color: red;">Terjadi Kesalahan Server (PHP Exception):</h1>';
    echo '<pre>' . htmlspecialchars($e->getMessage()) . '</pre>';
    echo '<h3>File:</h3> ' . $e->getFile() . ' pada baris ' . $e->getLine();
    echo '<h3>Trace:</h3><pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
}