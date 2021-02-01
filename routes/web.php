<?php
# @Date:   2020-11-06T15:46:38+00:00
# @Last modified time: 2020-11-30T12:02:39+00:00




use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\User\TodoController as UserTodoController;


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
    return view('welcome');
});

Auth::routes();

//home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');



//user routes for events

Route::get('user/home', [UserEventController::class, 'index'])->name('user.home');

Route::get('/user/events', [UserEventController::class, 'index'])->name('user.events.index');
Route::get('/user/events', [UserEventController::class, 'eventsTable'])->name('user.events.eventstable');
Route::get('/user/events/create', [UserEventController::class, 'create'])->name('user.events.create');
Route::get('/user/events/{id}', [UserEventController::class, 'show'])->name('user.events.show');
Route::post('/user/events/store', [UserEventController::class, 'store'])->name('user.events.store');
Route::get('/user/events/{id}/edit', [UserEventController::class, 'edit'])->name('user.events.edit');
Route::put('/user/events/{id}', [UserEventController::class, 'update'])->name('user.events.update');
Route::delete('/user/events/{id}', [UserEventController::class, 'destroy'])->name('user.events.destroy');

//user routes for Todos
Route::get('/user/todos/create', [UserTodoController::class, 'create'])->name('user.todos.create');
Route::get('/user/todos/{id}', [UserTodoController::class, 'show'])->name('user.todos.show');
Route::post('/user/todos/store', [UserTodoController::class, 'store'])->name('user.todos.store');
Route::get('/user/todos/{id}/edit', [UserTodoController::class, 'edit'])->name('user.todos.edit');
Route::put('/user/todos/{id}', [UserTodoController::class, 'update'])->name('user.todos.update');
Route::delete('/user/todos/{id}', [UserTodoController::class, 'destroy'])->name('user.todos.destroy');
