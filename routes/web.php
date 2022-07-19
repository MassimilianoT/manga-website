<?php

use App\Models\Manga;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\FavouritesController;

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
    return view('home', ['mangas' =>Manga::all()]);
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/manga/{manga:slug}/chapter/{chapter:slug}', [ChapterController::class, 'show']);

Route::get('/manga/{manga:slug}', [MangaController::class, 'show']);

Route::post('/manga/{manga:slug}', [CommentController::class, 'create']);

Route::get('/category/{category:slug}', [CategoryController::class, 'show']);

Route::get('/favourites', [FavouritesController::class, 'show'])->middleware('auth');
Route::post('/favourites/add', [FavouritesController::class, 'add'])->middleware('auth');
//Chiamata Ajax
Route::get('/checkRegisterData', [AjaxController::class, 'checkUsername']);


//Da aggiungere qui la logica di Admin: tutte le azioni di create richiedono di essere un amministratore
Route::get('create_manga', [MangaController::class, 'create']);

Route::get('/admin', [AdminController::class, 'create'])->middleware('auth');

Route::post('/admin', [AdminController::class, 'store'])->middleware('auth');