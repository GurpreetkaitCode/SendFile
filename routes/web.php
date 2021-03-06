<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
});

// Route::get('/users', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/create', function () {
    return view('create');
})->middleware(['auth'])->name('createuser');

Route::post('store',[UserController::class,'storeuser'])->name('storeuser');
Route::get('/users',[UserController::class,'show'])->name('dashboard');
require __DIR__.'/auth.php';
