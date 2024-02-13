<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimestampsController;
use App\Http\Controllers\HomeController;
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
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});

Auth::routes(['verify' => true]);

Route::get('/attendance', [AuthController::class, 'attendance'])->middleware('verified');

// Route::group(['middleware' => ['auth', 'can:admin']], function() {
//     Route::get('admin/user/index', 'AuthController@index')->name('admin/user/index');
//     Route::get('admin/user/show/{id}', 'AuthController@show')->name('admin/user/show');
// });
// Route::middleware('auth')->group(function () {
//     Route::post('timestamp/punchIn', 'App\Http\Controllers\AuthController@punchIn')->name('timestamp.punchIn');
//     Route::post('timestamp/punchOut', 'App\Http\Controllers\AuthController@punchOut')->name('timestamp.punchOut');
// });
// Route::middleware('auth')->group(function () {
//     Route::post('timestamp/breakBegin', 'App\Http\Controllers\AuthController@breakBegin')->name('timestamp.breakBegin');
//     Route::post('timestamp/breakEnd', 'App\Http\Controllers\AuthController@breakEnd')->name('timestamp.breakEnd');
// });
Route::middleware('auth')->group(function () {
    Route::post('timestamp/punchIn', 'App\Http\Controllers\TimestampsController@punchIn')->name('timestamp.punchIn');
    Route::post('timestamp/punchOut', 'App\Http\Controllers\TimestampsController@punchOut')->name('timestamp.punchOut');
});
Route::middleware('auth')->group(function () {
    Route::post('timestamp/breakBegin', 'App\Http\Controllers\TimestampsController@breakBegin')->name('timestamp.breakBegin');
    Route::post('timestamp/breakEnd', 'App\Http\Controllers\TimestampsController@breakEnd')->name('timestamp.breakEnd');
});
// Route::middleware('auth')->group(function () {
//     Route::post('timestamp/punchIn', [TimestampsController::class, 'timestamp.punchIn']);
//     Route::post('timestamp/punchOut', [TimestampsController::class, 'timestamp.punchOut']);
// });
// Route::middleware('auth')->group(function () {
//     Route::post('timestamp/breakBegin', [TimestampsController::class, 'timestamp.breakBegin']);
//     Route::post('timestamp/breakEnd', [TimestampsController::class, 'timestamp.breakEnd']);
// });
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'home'])->middleware('verified');
