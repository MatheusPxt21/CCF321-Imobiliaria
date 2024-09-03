<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('imoveis', [ImovelController::class, "index"])->name('imoveis');

Route::get('/contato', function () {
    return view('contato');
});
Route::post('/contato', [ContactController::class, 'submit'])->name('contato.submit');

Route::get('/corretor', function () {
    return view('corretor');
});



Route::get('/admin/corretores', [AdminController::class, 'showCorretores'])->name('admin.corretores');
Route::get('/admin/corretores/create', [AdminController::class, 'createCorretor'])->name('admin.corretores.create');
    Route::post('/admin/corretores', [AdminController::class, 'storeCorretor'])->name('admin.corretores.store');
    Route::get('/admin/corretores/{id}', [AdminController::class, 'showCorretor'])->name('admin.corretores.show');
    Route::delete('/admin/corretores/{id}', [AdminController::class, 'deleteCorretor'])->name('admin.corretores.delete');

    Route::get('/admin/visitas', [AdminController::class, 'showVisitas'])->name('admin.visitas');
