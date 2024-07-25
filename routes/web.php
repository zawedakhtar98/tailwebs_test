<?php


use App\Http\Controllers\TeacherController;
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

Route::get('/', [TeacherController::class,'index'])->name('index');
Route::post('/verify-login', [TeacherController::class,'login_verify'])->name('verify-login');
Route::get('/student-list', [TeacherController::class,'student_list'])->name('student-list');
Route::get('/logout', [TeacherController::class,'logout'])->name('logout');
Route::post('/add', [TeacherController::class,'add_student'])->name('add');



