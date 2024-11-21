<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmpatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TigaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/satu', function () {
//     return view('satu');
// });
// Route::get('/dua/{dua}', function ($dua) {
//     return 'dua = '.$dua;
// });
// Route::get('/tiga', TigaController::class.'@index');
// Route::resource('empat', EmpatController::class);


// Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', function () {
    return view('home');
})->name('home.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/admin/home', function () {
    return view('admin.home');
})->name('admin.home');

Route::get('/admin/button', function () {
    return view('admin.button');
})->name('admin.button');

Route::get('/admin/table', function () {
    return view('admin.table');
})->name('admin.table');

Route::resource('/category', CategoryController::class);
Route::resource('/post', PostController::class);