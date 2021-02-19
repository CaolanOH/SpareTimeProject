<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\EventController as APIEventController;
use App\Http\Controllers\API\TodoController as APITodoController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function() {

Route::get('/events', [APIEventController::class, 'index']);
Route::get('/events/{id}', [APIEventController::class, 'show']);
Route::post('/events', [APIEventController::class, 'store']);
Route::put('/events/{id}', [APIEventController::class, 'update']);
Route::delete('/events/{id}', [APIEventController::class, 'destroy']);

Route::get('/todos', [APITodoController::class, 'index']);
Route::post('/events/{id}/todos', [APITodoController::class, 'store']);
Route::delete('/todos/{id}', [APITodoController::class, 'destroy']);


});
