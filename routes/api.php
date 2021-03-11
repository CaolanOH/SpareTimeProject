<?php
# @Date:   2021-02-21T15:24:02+00:00
# @Last modified time: 2021-02-25T17:29:00+00:00




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\EventController as APIEventController;
use App\Http\Controllers\API\TodoController as APITodoController;

use App\Http\Controllers\API\PassportController as APIPassportController;

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
Route::middleware('api')->group(function() {
  Route::post('register', [APIPassportController::class, 'register']);
  Route::post('login', [APIPassportController::class, 'login']);
});

Route::middleware('auth:api')->group(function () {

  Route::get('user', [APIPassportController::class, 'user']);
    Route::get('logout', [APIPassportController::class, 'logout']);

    Route::get('/events', [APIEventController::class, 'index']);
    Route::get('/events/{id}', [APIEventController::class, 'show']);
    Route::post('/events', [APIEventController::class, 'store']);
    Route::put('/events/{id}', [APIEventController::class, 'update']);
    Route::delete('/events/{id}', [APIEventController::class, 'destroy']);

    Route::get('/events/{id}/todos', [APITodoController::class, 'index']);
    Route::post('/events/{id}/todos', [APITodoController::class, 'store']);
    Route::put('/events/{eid}/todos/{tid}', [APITodoController::class, 'update']);
    Route::delete('/todos/{id}', [APITodoController::class, 'destroy']);
});
