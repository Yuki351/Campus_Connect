<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\TUController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SuratPengajuanController;
use Illuminate\Support\Facades\Route;

// Login-Regis
// Route::get('/regis', function () {
//     return view('layouts.register');
// });
Route::get('/login', function () {
    return view('layouts.login');
});
// Route::middleware('auth')->group(function () {

    // Dashboard - Pages
    Route::get('/', function () {
        return view('layouts.starter');
    });
    Route::get('/approval', function () {
        return view('layouts.approval');
    });
// });


// Dosen Routes
// Route::middleware('auth')->group(function () {
    Route::get('/dosen', [DosenController::class, 'index']) -> name('dosenList');
    Route::get('/dosen/create', [DosenController::class, 'create'])-> name('dosenCreate');
    Route::post('/dosen/create', [DosenController::class, 'store'])-> name('dosenStore');
    Route::get('/dosen/edit/{dosen}', [DosenController::class, 'edit'])->name('dosenEdit');
    Route::put('/dosen/edit/{dosen}', [DosenController::class, 'update'])->name('dosenUpdate');
    Route::delete('/dosen/delete/{dosen}]', [DosenController::class, 'destroy'])-> name('dosenDelete');
    Route::get('/dosen/edit/{dosen}', [DosenController::class, 'edit'])->name('dosenEdit');
    Route::put('/dosen/edit/{dosen}', [DosenController::class, 'update'])->name('dosenUpdate');
// });

// TU Routes
// Route::middleware('auth')->group(function () {
    Route::get('/tu', [TUController::class, 'index']) -> name('tuList');
    Route::get('/tu/create', [TUController::class, 'create'])-> name('tuCreate');
    Route::post('/tu/create', [TUController::class, 'store'])-> name('tuStore');
    Route::get('/tu/edit/{tu}', [TUController::class, 'edit'])-> name('tuEdit');
    Route::put('/tu/edit/{tu}', [TUController::class, 'update'])-> name('tuUpdate');
    Route::delete('/tu/delete/{tu}', [TUController::class, 'destroy'])-> name('tuDelete');
    Route::get('/tu/view', [TUController::class, 'view'])-> name('tuView');
    Route::post('/tu/upload', [TUController::class, 'upload'])-> name('tuUpload');
// });

// Mahasiswa Routes
// Route::middleware('auth')->group(function () {
    Route::get('/mhs', [MahasiswaController::class, 'index']) ->name ('mahasiswaList');
    Route::get('/mhs/create', [MahasiswaController::class, 'create'])-> name('mahasiswaCreate');
    Route::post('/mhs/create', [MahasiswaController::class, 'store'])-> name('mahasiswaStore');
    Route::get('/mhs/detail/{mahasiswa}', [MahasiswaController::class, 'show'])-> name('mahasiswaDetail');
    Route::get('/mhs/edit/{mahasiswa}', [MahasiswaController::class, 'edit'])-> name('mahasiswaEdit');
    Route::put('/mhs/edit/{mahasiswa}', [MahasiswaController::class, 'update'])-> name('mahasiswaUpdate');
    Route::delete('/mhs/delete/{mahasiswa}', [MahasiswaController::class, 'destroy'])-> name('mahasiswaDestroy');
    Route::post('/mhs/submit', [SuratPengajuanController::class, 'submitted'])-> name('mahasiswaFormView');
    Route::get('/mhs/form', [SuratPengajuanController::class, 'form'])-> name('mahasiswaForm');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name ('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name ('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name ('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name ('profile.destroy');
});

require __DIR__.'/auth.php';
