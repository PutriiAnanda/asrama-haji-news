<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IspuController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [HomeController::class, 'beritaLokal'])->name('news.lokal'); // Route baru untuk Arsip Berita Resmi
Route::get('/rekomendasi-berita', [HomeController::class, 'rekomendasi'])->name('news.rekomendasi');
Route::get('/posts/{slug}', [HomeController::class, 'show'])->name('posts.show');
Route::get('/api/ispu-live', [IspuController::class, 'getLiveData']);