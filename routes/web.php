<?php


use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/dbkmh', [App\Http\Controllers\DbkmhController::class, 'dbkmh'])->name('testkmh');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

/******** for survey start  */

Route::get('/', [SurveyController::class, 'home']);
Route::get('/home', [SurveyController::class, 'home']);

Route::get('/survey/new', [SurveyController::class, 'new_survey'])->name('new.survey');
Route::get('/survey/{survey}', [SurveyController::class, 'detail_survey'])->name('detail.survey');

Route::get('/survey/view/{survey}', [SurveyController::class, 'view_survey'])->name('view.survey');
Route::get('/survey/answers/{survey}', [SurveyController::class, 'view_survey_answers'])->name('view.survey.answers');
Route::get('/survey/{survey}/delete', [SurveyController::class, 'delete_survey'])->name('delete.survey');
 
Route::get('/survey/{survey}/edit', [SurveyController::class, 'edit'])->name('edit.survey');
Route::patch('/survey/{survey}/update', [SurveyController::class, 'update'])->name('update.survey');




Route::post('/survey/view/{survey}/completed', [AnswerController::class, 'store'])->name('complete.complete');
 Route::post('/survey/create', [SurveyController::class, 'create'])->name('create.survey');
//Route::get('/survey/answers/{survey}', 'SurveyController@view_survey_answers')->name('view.survey.answers');
// Questions related

 Route::post('/survey/{survey}/questions', [QuestionController::class, 'store'])->name('store.question');
 
 Route::get('/question/{question}/edit', [QuestionController::class, 'edit'])->name('edit.question');
 Route::patch('/question/{question}/update', [QuestionController::class, 'update'])->name('update.question');
Route::auth();
 

/******** for survey end  */



