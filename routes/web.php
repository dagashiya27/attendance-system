<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceLogController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReserveLogController;

use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminEditController;

use App\Http\Controllers\RegisterManagementController;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\editController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();
Route::get('/', [HomeController::class, 'index']);


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');





Auth::routes();

Route::get('/attendance', [HomeController::class, 'index'])->name('attendance');



Auth::routes();

Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'login'])->name('login.login');
Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');


Auth::routes();


//マスター管理者用

Route::view('/admin/login', 'admin/login'); 
Route::get('/admin/home', [App\Http\Controllers\admin\AdminHomeController::class, 'index'])->name('admin.home');
Route::post('/admin/login', [App\Http\Controllers\admin\AdminLoginController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [App\Http\Controllers\admin\AdminLoginController::class,'logout'])->name('admin.logout');
Route::view('/admin/register', 'admin/register');
Route::get('/admin/register', [App\Http\Controllers\admin\AdminRegisterController::class, 'register']);
Route::post('/admin/register', [App\Http\Controllers\admin\AdminRegisterController::class, 'register']);
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');


//マスター管理者用メール
Route::view('/Admin/password/reset', 'Admin/passwords/email');
Route::post('/Admin/password/email', [App\Http\Controllers\Admin\AdminForgotPasswordController::class, 'sendResetLinkEmail']);
Route::view('/Admin/password/reset/{token}', [App\Http\Controllers\Admin\AdminResetPasswordController::class,'showResetForm']);
Route::post('/Admin/password/reset', [App\Http\Controllers\Admin\AdminResetPasswordController::class, 'reset']);


Auth::routes();
Route::get('/Admin/AdminUser', [AdminUserController::class, 'AdminUser'])->name('/Admin/AdminUser');
Route::post('/Admin/AdminUser', [AdminUserController::class, 'AdminUser'])->name('/Admin/AdminUser');

Auth::routes();
Route::get('/Admin/AdminUserEdit', [AdminEditController::class, 'AdminEdit'])->name('AdminEdit');
Route::post('/Admin/AdminUserEdit', [AdminEditController::class, 'AdminEditConfirm'])->name('edit.confirm');

Auth::routes();
Route::get('/Admin/editConfirm', [AdminEAdminEditController::class, 'editConfirm'])->name('editPass');
Route::post('/Admin/editConfirm', [AdminEAdminEditController::class, 'update'])->name('update');
Auth::routes();
Route::get('/Admin/editComplete', [AdminEAdminEditController::class, 'update'])->name('userUpdate');
Route::post('/Admin/editComplete', [AdminEAdminEditController::class, 'update'])->name('update2');



//問合せ　ルート
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');;
Route::post('/contact', [HomeController::class, 'contact'])->name('contact');;


Route::get('/contact/confirm', [HomeController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/confirm', [HomeController::class, 'confirm'])->name('contact.confirm');

Route::get('/contact/complete', [HomeController::class, 'send'])->name('contact.complete');
Route::post('/contact/complete', [HomeController::class, 'send'])->name('contact.complete');



Route::get('/userMypage', [HomeController::class, 'userMypage'])->name('userMypage');

Route::get('/attendanceLog', [HomeController::class, 'attendanceLog'])->name('attendanceLog');
Route::post('/attendanceLog', [HomeController::class, 'attendanceLog'])->name('attendanceLog');

Route::get('/reserveLog', [ReserveLogController::class, 'reserveLog'])->name('reserveLog');
Route::post('/reserveLog', [ReserveLogController::class, 'reserveLog'])->name('reserveLog');


Route::get('/reserve', [HomeController::class, 'reserve'])->name('reserve');
Route::post('/reserve', [HomeController::class, 'reserve'])->name('reserve');






//ユーザ編集画面

Route::get('/userEdit', [editController::class, 'edit'])->name('editInfo');
Route::post('/userEdit', [editController::class, 'editConfirm'])->name('edit.confirm');

Route::get('/editConfirm', [editController::class, 'editConfirm'])->name('editPass');
Route::post('/editConfirm', [editController::class, 'update'])->name('update');

Route::get('/editComplete', [editController::class, 'update'])->name('userUpdate');
Route::post('/editComplete', [editController::class, 'update'])->name('update2');


Route::group(['middleware' => 'auth'], function() {
    Route::post('/attendance', [AttendanceController::class,'attendance'])->name('attendance/attendance');
    Route::post('/clockOut',[AttendanceController::class,'clockOut'])->name('attendance/clockOut');
});



Route::group(['middleware' => 'auth'], function() {
    Route::get('/attendanceLog', [AttendanceLogController::class,'attendanceLog'])->name('attendanceLog');
    Route::post('/attendanceLog',[AttendanceLogController::class,'attendanceLog'])->name('attendanceLog');

 });



Route::get('/room/{id}/reserve',[RoomController::class, 'reserve']);
Route::post('/room/{id}/reserve',     [RoomController::class, 'reserve']);


Route::get('/room/index',       [RoomController::class, 'index'])->name('room.index');
Route::get('/room', [HomeController::class, 'contact'])->name('contact');
Route::post('/room', [HomeController::class, 'contact'])->name('contact');


Route::get('/room/confirm', [ReservationController::class, 'confirm'])->name('room.confirm');
Route::post('/room/confirm', [ReservationController::class, 'confirm'])->name('room.confirm');

Route::get('/room/complete', [ReservationController::class, 'complete'])->name('room.complete');
Route::post('/room/complete', [ReservationController::class, 'complete'])->name('room.complete');




Route::get('/delete', [App\Http\Controllers\Admin\AdminDeleteController::class, 'delete']);