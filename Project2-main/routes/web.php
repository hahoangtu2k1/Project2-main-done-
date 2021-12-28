<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentLookUpController;
use App\Http\Controllers\TuitionController;
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

//Home
Route::get('admin/tuition/list', function () {
    return view('admin.tuition.list');
});


//Admin
Route::get('/admin/tuition/list',[AdminController::class,'index'])->name('admin.tuition.list');
Route::get('admin/info/{id}',[AdminController::class,'infoAdmin'])->name('admin.auth.info');
Route::post('admin/info/{id}',[AdminController::class,'updateAdmin']);
Route::get('admin/login',[AdminLoginController::class,'showLoginForm'])->name('admin.login');
Route::post('admin/login',[AdminLoginController::class,'login']);
Route::get('admin/logout',[AdminLoginController::class,'logout'])->name('admin.logout');
Route::get('admin/list-account',[AdminController::class,'listAccount'])->name('admin.list-account');
Route::get('admin/destroyAccount/{id}',[AdminController::class,'destroyAccount']);
Route::get('admin/acceptAccount/{id}',[AdminController::class,'acceptAccount']);
Route::get('admin/create',[AdminController::class,'showFormStaff']);
Route::post('admin/create',[AdminController::class,'createStaff']);
Route::get('admin/changepw/{id}',[AdminController::class,'changePw'])->name('admin.auth.changepw');
Route::post('admin/changepw/{id}',[AdminController::class,'updatePw']);

//Major
Route::get('admin/major/create',function(){
    return view('admin.major.create');
});
Route::post('admin/major/create',[MajorController::class,'createMajor'])->name('admin.major.create');
Route::get('admin/major/list',[MajorController::class,'getAllMajor'])->name('admin.major.list');
Route::get('admin/major/create',[MajorController::class,'getMoneyMajor']);
Route::get('admin/major/edit/{id}',[MajorController::class,'editMajor']);
Route::post('admin/major/edit/{id}',[MajorController::class,'updateMajor']);
Route::get('admin/major/delete/{id}',[MajorController::class,'destroyMajor']);

//Class
Route::get('admin/class/create',function(){
    return view('admin.class.create');
});
Route::get('admin/class/create',[ClassController::class,'getMajorYear']);
Route::post('admin/class/create',[ClassController::class,'createClass'])->name('admin.class.create');
Route::get('admin/class/list',[ClassController::class,'getAllClass'])->name('admin.class.list');
Route::get('admin/class/edit/{id}',[ClassController::class,'editClass']);
Route::post('admin/class/edit/{id}',[ClassController::class,'updateClass']);
Route::get('admin/class/delete/{id}',[ClassController::class,'destroyClass']);
Route::get('admin/class/detail/{id}',[ClassController::class,'detailClass']);

//Student
Route::get('admin/student/create',function(){
    return view('admin.student.create');
});
Route::get('admin/student/create',[StudentController::class,'getMoneyClassScholarchip']);
Route::post('admin/student/create',[StudentController::class,'createStudent'])->name('admin.student.create');
Route::get('admin/student/list',[StudentController::class,'getAllStudent'])->name('admin.student.list');
Route::get('admin/student/edit/{id}',[StudentController::class,'editStudent']);
Route::post('admin/student/edit/{id}',[StudentController::class,'updateStudent']);
Route::get('admin/student/delete/{id}',[StudentController::class,'destroyStudent']);
Route::post('/export-csv',[StudentController::class,'export_excel']);
Route::post('/import-csv',[StudentController::class,'import_excel']);

Route::get('student/',[StudentLookUpController::class,'lookup']);
Route::post('student/',[StudentLookUpController::class,'listInvoice']);
Route::get('student/info-student',function(){
    return view('student/info-student');
});
Route::get('student/list-invoice/{id}',[StudentLookUpController::class,'listInvoiceStudent']);

//Tuition
Route::get('admin/tuition/list',[TuitionController::class,'getListTuition'])->name('admin.tuition.list');
Route::get('admin/tuition/collect-tuition/{id}',[TuitionController::class,'collectTuition']);
Route::post('admin/tuition/collect-tuition/{id}',[TuitionController::class,'createInvoice']);
Route::get('admin/tuition/invoice',[TuitionController::class,'getListStudent']);
Route::get('admin/tuition/statistical/{id}',[TuitionController::class,'getListStatistical']);
Route::get('admin/tuition/wave',[TuitionController::class,'wave']);
Route::get('admin/tuition/increaseWave/{id}',[TuitionController::class,'increaseWave']);
Route::get('admin/tuition/detail/{id}',[TuitionController::class,'invoiceDetail']);
Route::get('admin/tuition/list-invoice/{id}',[TuitionController::class,'listInvoice']);
Route::get('admin/tuition/receipt',function(){
    return view('admin/tuition/receipt');
});
Route::get('admin/tuition/list-class',[TuitionController::class,'getClass']);