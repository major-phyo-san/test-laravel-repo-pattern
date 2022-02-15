<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Car\CarCrudController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cars', [CarCrudController::class, 'index']);
Route::post('cars', [CarCrudController::class, 'store']);
Route::put('cars/{id}', [CarCrudController::class, 'update']);
Route::delete('cars/{id}', [CarCrudController::class, 'destroy']);
