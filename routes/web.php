<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuratController;

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

Route::redirect('/', '/surat');

Route::resource('kategori', KategoriController::class)->middleware('web');
Route::resource('surat', SuratController::class)->middleware('web');
Route::get('surat/{surat}/download', [SuratController::class, 'download'])->name('surat.download');


Route::get('/about', function () {
    return view('about');
})->name('about');
