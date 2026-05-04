<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // Memanggil controller yang baru kita buat

// Mengarahkan halaman utama ke fungsi index di dalam PageController
Route::get('/', [PageController::class, 'index']);