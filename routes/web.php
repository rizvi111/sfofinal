<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('web');
// });

Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index'])->name('home');
Route::post('/form-submit', [App\Http\Controllers\WebsiteController::class, 'form_submit'])->name('form_submit');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/form-list', [App\Http\Controllers\AdminController::class, 'index'])->name('form.list');
    Route::get('/form-view/{id}', [App\Http\Controllers\AdminController::class, 'form_view'])->name('form.view');
    Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [App\Http\Controllers\AdminController::class, 'profile_update'])->name('update.profile');
    Route::post('/password/update', [App\Http\Controllers\AdminController::class, 'update_password'])->name('update.password');
});
