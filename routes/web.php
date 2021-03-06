<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ServiceController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
//Route::resource('contact', 'ContactController')->middleware('auth');

/* Change language */
//if(file_exists(app_path('Http/Controllers/LocalizationController.php')))
    //Route::get('lang/{locale}', 'LocalizationController@lang');
/*Route::get('lang/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});*/


/* fontend Route */
Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index']);
Route::get('aboutus', [AboutusController::class, 'index']);
Route::get('doctor', [DoctorController::class, 'index']);
Route::get('doctor/{id}/{name}', [DoctorController::class, 'profile']);
Route::get('services', [ServiceController::class, 'index']);
Route::get('services/{id}/{name}', [ServiceController::class, 'detail']);
Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{id}/{name}', [ArticleController::class, 'detail']);
