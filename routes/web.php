<?php

use App\Http\Controllers\UsuarioController;
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

Route::get('usuarios',[UsuarioController::class,'index']);
Route::get('usuarios/create',[UsuarioController::class,'create']);
Route::post('usuarios/create', [UsuarioController::class,'store']);
Route::get('usuarios/{id}/edit', [UsuarioController::class, 'edit']);
Route::put('usuarios/{id}/edit', [UsuarioController::class, 'update']);
Route::get('usuarios/{id}/delete', [UsuarioController::class,'destroy']);
Route::get('usuarios/export',[UsuarioController::class,'export']);

Route::get('/', function () {
    return view('welcome');
});
