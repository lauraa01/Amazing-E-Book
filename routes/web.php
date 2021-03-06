<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LocalizationController;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('GuestMiddleware');

if (file_exists(app_path('Http/Controllers/LocalizationController.php')))
{
    Route::get('lang/{locale}', [LocalizationController::class , 'lang']);
}

Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('GuestMiddleware');
Route::post('/updateprofile', [HomeController::class, 'updateProfile'])->name('updateProfile')->middleware('GuestMiddleware');
Route::post('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('GuestMiddleware');
Route::get('/profile/submit', [HomeController::class, 'profile_submit'])->name('profile_submit')->middleware('GuestMiddleware');

Route::get('/saved', [HomeController::class, 'saved'])->name('saved')->middleware('GuestMiddleware');

Route::get('bookdetail/{title}', [HomeController::class, 'bookdetail'])->name('bookdetail')->middleware('GuestMiddleware');
Route::get('bookdetail/rent/{id}', [HomeController::class, 'rent'])->name('rent')->middleware('GuestMiddleware');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart')->middleware('GuestMiddleware');
Route::get('/cart/delete/{id}', [HomeController::class, 'cart_delete'])->name('cart_delete')->middleware('GuestMiddleware');
Route::get('/cart/submit', [HomeController::class, 'cart_submit'])->name('cart_submit')->middleware('GuestMiddleware');

Route::get('/maintenance', [HomeController::class, 'maintenance'])->name('maintenance')->middleware('GuestMiddleware', 'UserMiddleware');
Route::get('/deleteUser/{id}', [HomeController::class, 'deleteUser'])->name('deleteUser')->middleware('GuestMiddleware');

Route::get('/viewrole/{id}', [HomeController::class, 'viewRole'])->name('viewrole')->middleware('GuestMiddleware');
Route::get('/updaterole/{id}', [HomeController::class, 'updateRole'])->name('updaterole')->middleware('GuestMiddleware');

Route::post('/logout', [HomeController::class, 'logout'])->name('logout')->middleware('GuestMiddleware');
