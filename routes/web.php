<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\movie\MovieController;
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
//    if (auth()->user()){
//        auth()->user()->assignRole('superAdmin');
//    }

    return view('movie.home');
});

Auth::routes();
Route::name('dashboard.')->prefix('dashboard')->middleware('auth')->group(function (){

//    operations for movies section
    Route::post('/store',[MovieController::class,'store_movie'])->name('store_movie');
    Route::delete('/delete/{id}',[MovieController::class,'delete_movie'])->name('delete_movie');
    Route::post('/restore/{id}',[MovieController::class,'restore_trashed_movies'])->name('restore_movies');

//    dashboard view section
    Route::get('/index',[DashboardController::class,'index'])->name('index');
    Route::get('/create/movie',[DashboardController::class,'create_movie'])->name('create');
    Route::get('/movies/trash',[DashboardController::class,'show_deleted_movies'])->name('trashed');
    Route::get('/show/movie',[DashboardController::class,'show_movies'])->name('show.movie');
    Route::get('/show/movie/{id}',[DashboardController::class,'movie_info'])->name('movie.info');


});
