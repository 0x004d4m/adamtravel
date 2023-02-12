<?php

use App\Http\Controllers\LandingPageController;
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

Route::get('/', [LandingPageController::class, 'welcome']);
Route::get('/about', [LandingPageController::class, 'about']);
Route::get('/services', [LandingPageController::class, 'services']);
Route::get('/sites', [LandingPageController::class, 'sites']);
Route::get('/contact', [LandingPageController::class, 'contact']);
Route::get('/blog', [LandingPageController::class, 'blogs']);
Route::get('/blog/{id}', [LandingPageController::class, 'blog']);

Route::get('/set-language/{locale}', [LandingPageController::class,'setLanguage'])->name('set-language');
