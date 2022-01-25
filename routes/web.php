<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
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
/*Route::get('/course-detail', function () {
    return view('course-detail');
});
*/
Route::get('dashboard-admin', function () {
    return view('admin.dashboard-admin');
});

Route::resource('/dashboard-admin/category',CategoryController::class);
Route::resource('/dashboard-admin/instructors',InstructorController::class);
Route::resource('/dashboard-admin/courses',CourseController::class);
Route::get('/course-detail/{id}',[App\Http\Controllers\CourseController::class,'CourseDetail']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
