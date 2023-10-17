<?php

use Illuminate\Routing\Controllers\Middleware;
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



Auth::routes();

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){


Route::resource('departments', App\Http\Controllers\DepartmentController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::resource('leaves', App\Http\Controllers\LeaveController::class);
Route::resource('notices', App\Http\Controllers\NoticeCOntroller::class);
Route::post('accept-reject-leave/{id}', [App\Http\Controllers\LeaveController::class, 'acceptReject'])->name('accept.reject');
Route::resource('notices', App\Http\Controllers\NoticeCOntroller::class);
Route::get('/mail','App\Http\Controllers\MailController@create');
Route::post('/mail','App\Http\Controllers\MailController@store')->name('store');


});


Auth::routes();