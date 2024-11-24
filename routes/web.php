<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UsersController;

// Rute publik yang bisa diakses semua pengunjung
Route::get('/', [BlogController::class, 'index'])->name('index');

// Rute untuk autentikasi
Route::get('/register', [UsersController::class, 'create'])->name('register.create');
Route::post('/register', [UsersController::class, 'store'])->name('register.store');
Route::get('/login', [UsersController::class, 'viewlogin'])->name('login.view');
Route::post('/login', [UsersController::class, 'login'])->name('login');
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');

// Rute yang dilindungi (perlu login)
Route::middleware(['auth'])->group(function () {
    Route::get('/blogs', [BlogController::class, 'showBlogs'])->name('blogs.list');
    Route::get('/tambah', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/tambah', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/register', [UsersController::class, 'create'])->name('register.create');
// Route::post('/register', [UsersController::class, 'store'])->name('register.store');


// Route::get('/login', [UsersController::class, 'viewlogin'])->name('login.view');
// Route::post('/login', [UsersController::class, 'login'])->name('login');

// Route::get('/', [BlogController::class, 'index']);
// Route::get('/', [BlogController::class, 'showBlogs'])->name('blogs.list');

// Route::get('/blogs', [BlogController::class, 'showBlogs']);
// Route::get('/tambah', [BlogController::class, 'create']);
// Route::post('/tambah', [BlogController::class, 'store']);
// Route::get('/edit/{id}', [BlogController::class, 'edit']);
// Route::put('/update/{id}', [BlogController::class, 'update']);
// Route::delete('/delete/{id}', [BlogController::class, 'destroy']);













// Route::get('/welcome', [PageController::class, 'showPage']);
//     return view('page/welcome');

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/todos', [BlogController::class, 'showBlogs']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     echo "Hai semuanya";
// });

// Route::get('/hello', function () {
//     return view('hello');
// });

// Route::get('/hello', function () {
//     return view('world/hi');
// });