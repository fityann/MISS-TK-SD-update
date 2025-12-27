<?php

use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('index');
});

// Leaderboard
Route::get('/leaderboard', function () {
    return view('leaderboard');
});

// =====================
// PAUD - ANGKA
// =====================
Route::get('/paud/angka', function () {
    return view('paud.angka.angka');
});

Route::get('/paud/angka/game', function () {
    return view('paud.angka.game_angka');
});

// =====================
// PAUD - HURUF
// =====================
Route::get('/paud/huruf', function () {
    return view('paud.huruf.huruf');
});

Route::get('/paud/huruf/game', function () {
    return view('paud.huruf.game_huruf');
});

// =====================
// PAUD - WARNA
// =====================
Route::get('/paud/warna', function () {
    return view('paud.warna.warna');
});

Route::get('/paud/warna/game', function () {
    return view('paud.warna.game_warna');
});
