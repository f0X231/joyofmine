<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;

/* Authentication */
use App\Http\Controllers\Authen\AuthenticationController as AuthenController;

/* CMS Controller */
use App\Http\Controllers\Cms\DashboardController;
use App\Http\Controllers\Cms\DoctorController as CMSDoctorController;
use App\Http\Controllers\Cms\ArticleController as CMSArticleController;
use App\Http\Controllers\Cms\ServiceController as CMSServiceController;
// use App\Http\Controllers\Cms\SeoController as CMSSeoController;
use App\Http\Controllers\Cms\UserController as CMSUserController;
use App\Http\Controllers\Cms\GroupController as CMSGroupController;
use App\Http\Controllers\Cms\PanoController as CMSPanoController;

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
Route::get('/',                                     [HomeController::class, 'index']);
Route::get('index',                                 [HomeController::class, 'index']);
Route::get('home',                                  [HomeController::class, 'index']);
Route::get('privacy-policy',                        [HomeController::class, 'policy']);
Route::get('aboutus',                               [AboutusController::class, 'index']);
Route::get('doctor',                                [DoctorController::class, 'index']);
Route::get('doctor/{id}/{name}',                    [DoctorController::class, 'profile']);
Route::get('psychologist',                          [DoctorController::class, 'indexPsychiatrist']);
Route::get('psychologist/{id}/{name}',              [DoctorController::class, 'profilePsychiatrist']);
Route::get('occupational-therapist',                [DoctorController::class, 'indexOccupational']);
Route::get('occupational-therapist/{id}/{name}',    [DoctorController::class, 'profileOccupational']);
Route::get('employee-program',                      [EmployeeController::class, 'index']);
Route::get('employee-program/{id}/{name}',          [EmployeeController::class, 'detail']);
Route::get('services',                              [ServiceController::class, 'index']);
Route::get('services/{id}/{name}',                  [ServiceController::class, 'detail']);
Route::get('pain-management',                       [ServiceController::class, 'indexPainManagement']);
Route::get('articles',                              [ArticleController::class, 'index']);
Route::get('articles/{id}/{name}',                  [ArticleController::class, 'detail']);


/* Authentication: Login to system. */
Route::get('/login',                [AuthenController::class, 'index']);
Route::post('/authentication',      [AuthenController::class, 'authenLogin']); 
Route::get('/forgot-password',      [AuthenController::class, 'forgotPassword']);
Route::post('/reset-password',      [AuthenController::class, 'resetPassword']);
Route::get('/new-password',         [AuthenController::class, 'setNewPassword']);
Route::post('/save-new-password',   [AuthenController::class, 'saveNesPassword']);
Route::get('/logout',               [AuthenController::class, 'logout']);


/* CMS */
Route::prefix('cms')->group(function() {
    Route::get('/',                 [DashboardController::class, 'index']);
    Route::post('/upload/{slug}',   [DashboardController::class,  'upload']);

    Route::group(['namespace' => '', 'prefix' => 'users'], function() {
        Route::get('/',                         [CMSUserController::class,  'index']);
        Route::get('/new',                      [CMSUserController::class,  'modify']);
        Route::get('/modify/{id}/{slug}',       [CMSUserController::class,  'modify']);
        Route::post('/process',                 [CMSUserController::class,  'process']);
        Route::get('/onoff/{slug}/{status}',    [CMSUserController::class,  'onoff']);
        Route::get('/delete/{id}',              [CMSUserController::class,  'delete']);
    });

    Route::group(['namespace' => '', 'prefix' => 'groups'], function() {
        Route::get('/',                         [CMSGroupController::class,  'index']);
        Route::get('/new',                      [CMSGroupController::class,  'modify']);
        Route::get('/modify/{id}/{slug}',       [CMSGroupController::class,  'modify']);
        Route::post('/process',                 [CMSGroupController::class,  'process']);
        Route::get('/onoff/{id}/{status}',      [CMSGroupController::class,  'onoff']);
        Route::get('/delete/{id}',              [CMSGroupController::class,  'delete']);
    });

    Route::group(['namespace' => '', 'prefix' => 'panorama'], function() {
        Route::get('/',                         [CMSPanoController::class,  'index']);
        Route::get('/new',                      [CMSPanoController::class,  'modify']);
        Route::get('/modify/{id}/{slug}',       [CMSPanoController::class,  'modify']);
        Route::post('/process',                 [CMSPanoController::class,  'process']);
        Route::get('/onoff/{id}/{status}',      [CMSPanoController::class,  'onoff']);
        Route::get('/delete/{id}',              [CMSPanoController::class,  'delete']);
    });

    Route::group(['namespace' => '', 'prefix' => 'doctor'], function() {
        Route::get('/',                         [CMSDoctorController::class,  'index']);
        Route::get('/new',                      [CMSDoctorController::class,  'modify']);
        Route::get('/modify/{id}/{slug}',       [CMSDoctorController::class,  'modify']);
        Route::post('/process',                 [CMSDoctorController::class,  'process']);
        Route::get('/onoff/{id}/{status}',      [CMSDoctorController::class,  'onoff']);
        Route::get('/delete/{id}',              [CMSDoctorController::class,  'delete']);
    });

    Route::group(['namespace' => '', 'prefix' => 'article'], function() {
        Route::get('/',                         [CMSArticleController::class,  'index']);
        Route::get('/new',                      [CMSArticleController::class,  'modify']);
        Route::get('/modify/{id}/{slug}',       [CMSArticleController::class,  'modify']);
        Route::post('/process',                 [CMSArticleController::class,  'process']);
        Route::get('/onoff/{id}/{status}',      [CMSArticleController::class,  'onoff']);
        Route::get('/delete/{id}',              [CMSArticleController::class,  'delete']);
    });

    Route::group(['namespace' => '', 'prefix' => 'service'], function() {
        Route::get('/',                         [CMSServiceController::class,  'index']);
        Route::get('/new',                      [CMSServiceController::class,  'modify']);
        Route::get('/modify/{id}/{slug}',       [CMSServiceController::class,  'modify']);
        Route::post('/process',                 [CMSServiceController::class,  'process']);
        Route::get('/onoff/{id}/{status}',      [CMSServiceController::class,  'onoff']);
        Route::get('/delete/{id}',              [CMSServiceController::class,  'delete']);
    });

    Route::group(['namespace' => '', 'prefix' => 'profile'], function() {
        Route::get('/',                         [CMSServiceController::class,  'index']);
        Route::get('/modify',                   [CMSServiceController::class,  'modify']);
        Route::post('/process',                 [CMSServiceController::class,  'process']);
        Route::get('/onoff/{id}/{status}',      [CMSServiceController::class,  'onoff']);
    });

});

