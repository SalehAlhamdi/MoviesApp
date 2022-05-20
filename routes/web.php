<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\dashboard\MoviesViewController;
use App\Http\Controllers\dashboard\TvShowViewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\movie\MovieController;
use App\Http\Controllers\tvshow\EpisodesController;
use App\Http\Controllers\tvShow\TvShowController;
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

    //Dashboard Main Screen
    Route::get('/index',[MoviesViewController::class,'index'])->name('index');


    //    operations for movies section
    Route::post('/store',[MovieController::class,'store_movie'])->name('store_movie');
    Route::delete('/delete/{id}',[MovieController::class,'delete_movie'])->name('delete_movie');
    Route::post('/restore/{id}',[MovieController::class,'restore_trashed_movies'])->name('restore_movies');
    Route::post('/update/{id}',[MovieController::class,'update_movie'])->name('update_movie');



    //    Movies view section
    Route::get('/create/movie',[MoviesViewController::class,'create_movie'])->name('create');
    Route::get('/movies/trash',[MoviesViewController::class,'show_deleted_movies'])->name('trashed');
    Route::get('/show/movie',[MoviesViewController::class,'show_movies'])->name('show.movie');
    Route::get('/info/movie/{id}',[MoviesViewController::class,'movie_info'])->name('movie.info');
    Route::get('/update/movie/{id}',[MoviesViewController::class,'update_movie'])->name('movie.update');


    //      Tv Show view section
    Route::get('/create/Episode',[TvShowViewController::class,'create_episode'])->name('create.episode');
    Route::get('/create/TvShow',[TvShowViewController::class,'create_tvShow'])->name('create.tvShow');
    Route::get('/tvShow/Trash',[TvShowViewController::class,'show_deleted_tvShow'])->name('tvShow_trashed');
    Route::get('/show/TvShow',[TvShowViewController::class,'show_tvShow'])->name('show.tvShow');
    Route::get('/info/TvShow/{id}',[TvShowViewController::class,'tvShow_info'])->name('tvShow.info');
    Route::get('/Single/TvShow/{id}',[TvShowViewController::class,'update_tvShow'])->name('tvShow.update');

    //    operations for TvShow section
    Route::post('/store/TvShow',[TvShowController::class,'store_tvShow'])->name('store_movie');
    Route::delete('/delete/TvShow/{id}',[TvShowController::class,'delete_tvShow'])->name('delete_tvShow');
    Route::post('/restore/TvShow/{id}',[TvShowController::class,'restore_trashed_tvShow'])->name('restore_tvShow');
    Route::put('/update/TvShow/{id}',[TvShowController::class,'update_tvShow'])->name('edit_tvShow');

    // Episodes Functions
    Route::post('/add/Episode',[EpisodesController::class,'store_ep'])->name('add.episode');
    Route::delete('/delete/Episode/{id}',[EpisodesController::class,'delete_ep'])->name('delete.episode');


});
