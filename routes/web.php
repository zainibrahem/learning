<?php

use App\Http\Controllers\MiroController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PDFEditorController;
use App\Http\Controllers\Auth\RegisterController;

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
    Route::get('/board',[TeacherController::class,'board']);

    Route::get('/draw-pdf/{id}', [PDFEditorController::class,'edit'])->name('draw-pdf');



    Route::group(['prefix'=>"/files"],function(){
        Route::get('/', function () {
            return view('admin.files');
        })->name("files.index",);

    });
    Route::get('/home', function () {
        return view('admin.dashboard');
    })->name('home');
});


Route::group(['middleware' => ['role:admin','auth']], function () {

    Route::group(['prefix'=>"/stages"],function(){
        Route::get('/', function () {
            return view('admin.stages',["type"=>"view"]);
        })->name("stages.index");
        Route::get('/create',function (){
            return view('admin.stages',["type"=>"create"]);
        })->name("stages.create");

        Route::get('/edit/{id}',function ($id){
            return view('admin.stages',["type"=>"edit",'id'=>$id]);
        })->name("stages.edit");

    });
    Route::post('/add-questions',[\App\Http\Controllers\QuizController::class,'addQestions'])->name("question.add");



    Route::group(['prefix'=>"/files"],function(){
        Route::get('/', function () {
            return view('admin.files');
        })->name("files.index",);



    });

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
Route::group(['middleware' => ['role:teacher','auth']],function(){
    Route::get('choosestages',[TeacherController::class,'stages']);
    Route::get('/stage/{id}/subject',[TeacherController::class,'stagesSubjects']);
    Route::get('/subject/{id}/files',[TeacherController::class,'subjectFiles']);
    Route::get('/home',[TeacherController::class,'stages']);
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

    Route::group(['prefix'=>"/quiz"],function(){

        Route::get('/', function () {
            return view('admin.quiz');
        })->name("quiz.create",);

    });

    Route::group(['prefix'=>"/questions"],function(){
        Route::get('/', function () {
            return view('admin.questions',["type"=>"view"]);
        })->name('questions.index',);

        Route::get('/create', function () {
            return view('admin.questions',["type"=>"create"]);
        })->name('questions.create',);

        Route::get('/edit/{id}', function ($id) {
            return view('admin.questions',["type"=>"edit",'id'=>$id]);
        })->name('question.edit',);

    });




});
\Illuminate\Support\Facades\Auth::routes();
Route::get('/stages/{id}/subjects',[RegisterController::class,'getSubjects']);

