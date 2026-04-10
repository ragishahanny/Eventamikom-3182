<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::get('/tentang', function () {
    return '<h1> Ini adalah halaman tentng ang aplikasi Event hub ';

});

Route::get('/kontak', function () {
    return view('contact');

});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/bantuan', function () {
    return view('bantuan');
});