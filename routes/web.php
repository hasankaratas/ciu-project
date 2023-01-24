<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('student', App\Http\Controllers\StudentController::class);
    Route::resource('department', App\Http\Controllers\DepartmentController::class);
    Route::post ('student/update/{id}', [StudentController::class, 'update'])->name('updateStudent');
    Route::delete ('student/delete/{id}', [StudentController::class, 'destroy'])->name('deleteStudent');
    Route::post ('department/update/{id}', [DepartmentController::class, 'update'])->name('updateDepartment');
    Route::delete ('department/delete/{id}', [DepartmentController::class, 'destroy'])->name('deleteDepartment');
});

Auth::routes([
    "register" => false,
    "reset" => false,
    "verify" => false
]);
