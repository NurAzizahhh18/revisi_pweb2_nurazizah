<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function ()
{
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard.dist.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::post('/logout', [LoginController::class, 'logout']);

route::get('/ruangan', [RuanganController::class,'index'])->middleware(['auth','verified']);
// route::get('/ruangan', [RuanganController::class,'home'])->middleware(['auth','verified']);
route::get('/ruangan/create', [RuanganController::class,'create'])->middleware(['auth','verified']);
route::post('/ruangan/store', [RuanganController::class,'store'])->middleware(['auth','verified']);

route::get('dashboard', [DashboardController::class,'tampil'])->middleware(['auth','verified']);

Route::get('/pengisian', function ()
{
    return view('dashboard.dist.ruangan');
});

// Route::get('/edit', function ()
// {
//     return view('dashboard.dist.edit');
// });

Route::get('/tabel', function ()
{
    return view('dashboard.dist.tabel_ruangan');
});

route::delete('/dashboard/{NO}', [DashboardController::class,'delete'])->middleware(['auth','verified']);
route::get('/dashboard//edit/{NO}', [DashboardController::class,'edit'])->middleware(['auth','verified']);
route::put('/dashboard/{NO}', [DashboardController::class,'update'])->middleware(['auth','verified']);

require __DIR__.'/auth.php';
