<?php

use App\Http\Controllers\MiroController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['middleware' => ['role:admin|teacher','auth']], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::get('/generate-new-code',[MiroController::class,'generateCode']);
    Route::get('/getMiroCode',[MiroController::class,'getMiroCode']);
});

Route::group(['middleware' => ['role:teacher','auth']], function () {
    Route::get('/board',[TeacherController::class,'board']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
