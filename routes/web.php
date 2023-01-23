<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->middleware("auth");



Route::middleware(['auth'])->group(function(){
    Route::resource('student', App\Http\Controllers\StudentController::class);
    Route::resource('department', App\Http\Controllers\DepartmentController::class);
});

Auth::routes([
    "register"=>false,
    "reset"=>false,
    "verify"=>false
]);


