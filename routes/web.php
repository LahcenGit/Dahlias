<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RegistrationAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FinalregistrationController;
use App\Http\Controllers\PaymentController;
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
Route::resource('/dashboard-admin/editions',GroupController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/students',StudentController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/final-registrations',FinalregistrationController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/payments',PaymentController::class)->middleware('can:admin');
Route::resource('/dashboard-admin',AdminController::class)->middleware('can:admin');

Route::resource('/registration-course',RegistrationController::class);
Route::get('/register-course/{id}',[App\Http\Controllers\RegistrationController::class,'register']);
Route::get('/register-success/{id}/{name}',[App\Http\Controllers\RegistrationController::class,'registerSuccess']);
Route::get('/add-final-registration/{id}',[App\Http\Controllers\FinalregistrationController::class,'addFinalRegistration']);
Route::post('/final-registration',[App\Http\Controllers\FinalregistrationController::class,'storeFinlRegistration']);
Route::get('/course-detail/{id}',[App\Http\Controllers\CourseController::class,'CourseDetail']);
Route::resource('/contact',ContactController::class);

Route::get('/category-courses/{id}',[App\Http\Controllers\CourseController::class,'categoryCourses']);
Route::get('add-registration', [App\Http\Controllers\RegistrationController::class, 'modalRegistration']);
Route::post('registration', [App\Http\Controllers\RegistrationController::class, 'addRegistration']);
Route::get('/get-instructor/{id}', [App\Http\Controllers\GroupController::class, 'getInstructor']);
Route::get('/get-edition/{id}', [App\Http\Controllers\FinalregistrationController::class, 'getEdition']);
Route::get('/get-student/{id}', [App\Http\Controllers\PaymentController::class, 'getStudent']);
Route::get('/get-price-course/{id}', [App\Http\Controllers\PaymentController::class, 'getPrice']);
Route::get('/get-edition-course/{id}/{id_student}', [App\Http\Controllers\PaymentController::class, 'getEditionCourse']);

//search 
Route::get('/search',[App\Http\Controllers\SearchController::class,'globalSearch']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
