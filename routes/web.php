<?php


use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dbkmh', [App\Http\Controllers\DbkmhController::class, 'dbkmh'])->name('testkmh');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

/******** for testing  */


Route::get('/users/{user}', function (User $user) {
    return $user->email;
});

Route::fallback(function () {
    return 'not found';
});


