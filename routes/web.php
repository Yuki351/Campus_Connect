<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\TUController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

// Login-Regis
// Route::get('/regis', function () {
//     return view('layouts.register');
// });
Route::get('/login', function () {
    return view('layouts.login');
});

// Dashboard - Pages
Route::get('/', function () {
    return view('layouts.starter');
});
Route::get('/1', function () {
    return view('demo.file1');
});
Route::get('/2', [DemoController::class, 'index']);
Route::get('/forms', function() {
    return view('/layouts.forms');
});

// Dosen Routes
Route::get('/dosen', [DosenController::class, 'index']) -> name('dosenList');
Route::get('/dosen/create', [DosenController::class, 'create'])-> name('dosenCreate');
Route::post('/dosen/create', [DosenController::class, 'store'])-> name('dosenStore');
Route::get('/dosen/edit/{dosen}', [DosenController::class, 'edit'])->name('dosenEdit');
Route::put('/dosen/edit/{dosen}', [DosenController::class, 'update'])->name('dosenUpdate');
Route::delete('/dosen/delete/{dosen}]', [DosenController::class, 'destroy'])-> name('dosenDelete');

// TU Routes
Route::get('/tu', [TUController::class, 'index']) -> name('tuList');
Route::get('/tu/create', [TUController::class, 'create'])-> name('tuCreate');
Route::post('/tu/create', [TUController::class, 'store'])-> name('tuStore');

// Mahasiswa Routes
Route::get('/mhs', [MahasiswaController::class, 'index']) ->name ('mahasiswaList');
Route::get('/mhs/create', [MahasiswaController::class, 'create'])-> name('mahasiswaCreate');
Route::post('/mhs/create', [MahasiswaController::class, 'store'])-> name('mahasiswaStore');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name ('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name ('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name ('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name ('profile.destroy');
});

require __DIR__.'/auth.php';
