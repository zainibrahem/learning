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

// eyJtaXJvLm9yaWdpbiI6ImV1MDEifQ_lLbmMsNmBvjVAQF6nDfAp8-fMhc
Route::group(['middleware' => ['role:admin|teacher','auth']], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::get('/generate-new-code',[MiroController::class,'generateCode']);
    Route::get('/getMiroCode',[MiroController::class,'getMiroCode']);
    Route::group(['prefix'=>"/subjects"],function(){

        Route::get('/', function () {
            return view('admin.subjects',["type"=>"view"]);
        })->name("subjects.index",);
    
        Route::get('/create', function () {
    
            return view('admin.subjects',["type"=>"create"]);
        })->name("subject.create");
    
        Route::get('/show/{id}', function ($id) {
            return view('admin.subjects',["type"=>"view_one","id"=>$id]);
        })->name("subjects.show");
    
    });
});

Route::group(['middleware' => ['role:teacher','auth']], function () {
    Route::get('/board',[TeacherController::class,'board']);

    Route::get('/stages', function () {
        return view('admin.stages');
    })->name("stages.index");



});
\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
