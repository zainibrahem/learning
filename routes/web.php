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
  
    // Route for displaying the PDF upload form
    Route::get('/pdf/upload', [PDFEditorController::class, 'showUploadForm'])->name('pdf.upload');

    // Route for handling the PDF upload
    Route::post('/pdf/upload', [PDFEditorController::class, 'upload'])->name('pdf.upload');

    // Route for displaying the PDF editing form
    Route::get('/pdf/{id}/edit', [PDFEditorController::class, 'edit'])->name('pdf.edit');

    // Route for saving the edited PDF
    Route::post('/pdf/{id}/save', [PDFEditorController::class, 'save'])->name('pdf.save');

    // Route for downloading the edited PDF
    Route::get('/pdf/{id}/download', [PDFEditorController::class, 'download'])->name('pdf.download');
    Route::get('/home', function () {
        return view('admin.dashboard');
    })->name('home');
   
});


Route::group(['middleware' => ['role:admin','auth']], function () {
    Route::get('/stages', function () {
        return view('admin.stages');
    })->name("stages.index");

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
\Illuminate\Support\Facades\Auth::routes();
Route::get('/stages/{id}/subjects',[RegisterController::class,'getSubjects']);

