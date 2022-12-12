<?php

use App\Http\Controllers\NewsController;
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

Route::controller(NewsController::class)->group(function () {
   Route::get('/', 'index')->name('news.index');

   Route::get('/create', 'create')->name('news.create');
   Route::post('/create', 'store')->name('news.store');

   Route::get('/{news}', 'show')->name('news.show');

   Route::get('/{news}/edit', 'edit')->name('news.edit');

   Route::patch('/{news}', 'update')->name('news.update');

   Route::delete('/{news}', 'destroy')->name('news.delete');
});
