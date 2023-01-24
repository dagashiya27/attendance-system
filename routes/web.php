<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceLogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterManagementController;
use App\Http\Controllers\ReservationController;
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

Route::get('/reserveLog', [HomeController::class, 'reserveLog'])->name('reserveLog');
Route::post('/reserveLog', [HomeController::class, 'reserveLog'])->name('reserveLog');


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




//----部屋予約------


Route::get('/management',                 [RegisterManagementController::class,'index']);
Route::post('/management/indexToMonthly', [RegisterManagementController::class,'indexToMonthly']);
Route::get('/management/create',          [RegisterManagementController::class,'create']);
Route::post('/management',                [RegisterManagementController::class,'store']);
Route::get('/management/edit/{id}',       [RegisterManagementController::class,'edit']);
Route::post('/management/update',         [RegisterManagementController::class,'update']);
Route::get('/management/{id}/conform',    [RegisterManagementController::class,'conform']);
Route::post('/management/delete',         [RegisterManagementController::class,'delete']);
Route::post('/management/lodging',        [RegisterManagementController::class,'lodging']);
Route::get('/management/schedule',        [RegisterManagementController::class,'schedule']);
Route::post('/management/schedule',       [RegisterManagementController::class,'scheduleToMonthly']);
Route::get('/management/total',           [RegisterManagementController::class,'total']);
Route::post('/management/total',          [RegisterManagementController::class,'totalToMonthly']);
Route::get('/management/total',           [RegisterManagementController::class,'totalToMonthly']);
Route::get('/management/checkout',        [RegisterManagementController::class,'checkout']);

Route::get('/room/index',       [RoomController::class, 'index'])->name('room.index');;
Route::get('/room/create',      [RoomController::class, 'create'])->name('room.create');
Route::post('/room/create',      [RoomController::class, 'create'])->name('room.create');
Route::get('/room/store',       [RoomController::class, 'store'])->name('room.store');
Route::post('/room/store',      [RoomController::class, 'store'])->name('room.store');
Route::get('/room/{id}/edit',   [RoomController::class, 'edit']);
Route::post('/room/update',     [RoomController::class, 'update']);
Route::get('/room/{id}/conform',[RoomController::class, 'conform']);
Route::post('/room/delete',     [RoomController::class, 'delete']);

Route::post('/api/rooms',       [ApiController::class, 'rooms']);
Route::post('/api/update',      [ApiController::class, 'update']);
Route::post('/api/delete',      [ApiController::class, 'delete']);
Route::post('/api/registers',   [ApiController::class, 'registers']);
Route::post('/api/timelist',    [ApiController::class, 'timelist']);
Route::post('/api/role',        [ApiController::class, 'role']);
Route::post('/api/users',       [ApiController::class, 'users']);
Route::post('/api/add',         [ApiController::class, 'add']);
Route::post('/api/check',       [ApiController::class, 'check']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
