<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CorretorController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Imovel Routes
Route::get('imoveis', [ImovelController::class, 'index'])->name('imoveis.index');
Route::get('imoveis/create', [ImovelController::class, 'display'])->name('imoveis.display');
Route::post('imoveis/create', [ImovelController::class, 'store'])->name('imoveis.store');
Route::get('imoveis/{id}', [ImovelController::class, 'show'])->name('imovel.show');

// Contact Routes
Route::get('/contato', function () {
    return view('contato');
});
Route::post('/contato', [ContactController::class, 'submit'])->name('contato.submit');

// Corretor Routes
Route::get('/corretor', function () {
    return view('corretor');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Corretores Routes
    Route::get('/corretores', [AdminController::class, 'showCorretores'])->name('corretores');
    Route::get('/corretores/create', [AdminController::class, 'createCorretor'])->name('corretores.create');
    Route::post('/corretores', [AdminController::class, 'storeCorretor'])->name('corretores.store');
    Route::get('/corretores/{id}', [AdminController::class, 'showCorretor'])->name('corretores.show');
    Route::delete('/corretores/{id}', [AdminController::class, 'deleteCorretor'])->name('corretores.delete');

    // Admin Visitas Routes
    Route::get('/visitas', [AdminController::class, 'showVisitas'])->name('visitas');
});

Route::get('corretor/visitas', [CorretorController::class, 'showVisitas'])->name('corretor.visitas');
Route::get('/corretor/index', [CorretorController::class, 'index'])->name('corretor.index');
