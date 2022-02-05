<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RegistrationAdminController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/welcome', function () {
    return view('welcome2');
});


Route::resource('/dashboard-admin/registrations',RegistrationAdminController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/category',CategoryController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/instructors',InstructorController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/courses',CourseController::class)->middleware('can:admin');
Route::resource('/dashboard-admin',AdminController::class)->middleware('can:admin');
Route::resource('/registration-course',RegistrationController::class);
Route::get('/register-course/{id}',[App\Http\Controllers\RegistrationController::class,'register']);
Route::get('/register-success/{id}/{name}',[App\Http\Controllers\RegistrationController::class,'registerSuccess']);
Route::get('/course-detail/{id}',[App\Http\Controllers\CourseController::class,'CourseDetail']);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
