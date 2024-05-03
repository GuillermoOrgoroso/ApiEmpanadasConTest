<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpanadaController;
use App\Http\Controllers\TestController;



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

Route::prefix('v1')->group(Function () {


    Route::get('/empanada', [EmpanadaController::class, 'List']);
    Route::get('/empanada/{d}',[EmpanadaController::class, 'Find']);
    Route::post('/empanada', [EmpanadaController::class, 'Create']);
    Route::put('/empanada/{d}',[EmpanadaController::class, 'Update']);
    Route::delete('/empanada/{d}', [EmpanadaController::class, 'Delete']);



});


Route::prefix('v2')->group(Function () {

    Route::get('/test', [TestController::class, 'index']);




});