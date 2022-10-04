<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MealsController;
use App\Http\Controllers\EndpointController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('meals', [MealsController::class, 'index']);

Route::post('meals', [MealsController::class, 'addData']);

Route::get('endpoint', [EndpointController::class, 'endpoint']);

Route::post('endpoint', [EndpointController::class, 'generateEndpointAnswer']);