<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/cliente/{id}', [ClienteController::class, 'show']);
Route::get('/consulta/final-placa/{numero}', [ClienteController::class, 'show_placa']);
Route::post('/clienteCadastro', [ClienteController::class, 'store']);
Route::put('/cliente/{id}', [ClienteController::class, 'update']);
Route::delete('/cliente/{id}', [ClienteController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
