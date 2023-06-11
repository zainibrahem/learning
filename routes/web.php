<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => ['role:admin','auth']], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::get('/stages', function () {
        return view('admin.stages');
    })->name("stages.index");

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
\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
