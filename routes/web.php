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

Route::get('/tk', function () {
    return view('tk.index');
});

Route::get('/paud', function () {
    return view('paud.index');
});

// MATEMATIKA PAUD
Route::get('/tk/matematika/mtk', function () {
    return view('tk.matematika.dashboard_materimtk');
});

Route::get('/tk/matematika/pilih', function () {
    return view('tk.matematika.pilih');
});

Route::get('/tk/matematika/gamemtk', function () {
    return view('tk.matematika.dashboard_gamemtk');
});

Route::get('/tk/matematika/materimtk', function () {
    return view('tk.matematika.dashboard_materimtk');
});




// TK MEMBACA
Route::get('/tk/membaca', function () {
    return view('tk.membaca.index');
});

Route::get('/tk/module', function () {
    return view('tk.membaca.module');
});
Route::get('/tk/membaca/huruf', function () {
    return view('tk.membaca.huruf');
});




