<?php

use App\Http\Controllers\StatesController;
use App\Http\Controllers\SubscriptionController;
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

Route::post('import', [StatesController::class, 'import']);
Route::get('imports', [StatesController::class, 'index']);

Route::post('subscription', [SubscriptionController::class, 'store']);
