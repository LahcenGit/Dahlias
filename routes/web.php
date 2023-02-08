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
use App\Http\Controllers\LoadController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\EmailingController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\SalaryController;
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
Route::resource('/dashboard-admin/loads',LoadController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/vendors',VendorController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/workers',WorkerController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/salaries',SalaryController::class)->middleware('can:admin');
Route::resource('/dashboard-admin/export-email',EmailingController::class)->middleware('can:admin');
Route::get('dashboard-admin/report-payment' ,[App\Http\Controllers\PaymentController::class, 'reportView']);
Route::get('get-course-group-report/{id}' ,[App\Http\Controllers\PaymentController::class, 'getCourseGroup']);
Route::get('/dashboard-admin/report-student-payment/{group_id}/{user_id}' ,[App\Http\Controllers\PaymentController::class, 'generateReport']);
Route::get('dashboard-admin/export-email/{id}', [App\Http\Controllers\EmailingController::class, 'exportEmail']);
Route::get('dashboard-admin/export-all-email', [App\Http\Controllers\EmailingController::class, 'exportAllEmail']);
Route::get('dashboard-admin/export-email-pres-inscription', [App\Http\Controllers\EmailingController::class, 'exportEmailPresInscription']);
Route::get('dashboard-admin/presence-list/{id}', [App\Http\Controllers\GroupController::class, 'presenceList'])->middleware('can:admin');
Route::get('dashboard-admin/student-list/{id}', [App\Http\Controllers\GroupController::class, 'studentList'])->middleware('can:admin');
Route::resource('dashboard-admin/sessions', PresenceController::class)->middleware('can:admin');
Route::get('dashboard-admin/presences/{course_id}/{group_id}/{session}', [App\Http\Controllers\PresenceController::class, 'getPresences'])->middleware('can:admin');
Route::get('dashboard-admin/edit-presences/{course_id}/{group_id}/{session}', [App\Http\Controllers\PresenceController::class, 'edit'])->middleware('can:admin');
Route::post('dashboard-admin/update-presences', [App\Http\Controllers\PresenceController::class, 'update'])->middleware('can:admin');
Route::get('dashboard-admin/add-presence-step-one', [App\Http\Controllers\PresenceController::class, 'stepOne']);
Route::get('dashboard-admin/add-presence-step-two/{course_id}/{group_id}/{session}/{date}', [App\Http\Controllers\PresenceController::class, 'stepTwo']);
Route::resource('/dashboard-admin',AdminController::class)->middleware('can:admin');

Route::post('store-presence', [App\Http\Controllers\PresenceController::class, 'storPresence']);
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
Route::get('/get-session/{id}', [App\Http\Controllers\GroupController::class, 'getSession']);
Route::get('/get-student/{id}', [App\Http\Controllers\PaymentController::class, 'getStudent']);
Route::get('/get-rest-amount/{course_id}/{edition_id}/{student_id}/{amount}', [App\Http\Controllers\PaymentController::class, 'getRest']);
Route::get('/get-edition-course/{id}/{id_student}', [App\Http\Controllers\PaymentController::class, 'getEditionCourse']);

//search 
Route::get('/search',[App\Http\Controllers\SearchController::class,'globalSearch']);



Auth::routes([
    'register' => false,
    
]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
