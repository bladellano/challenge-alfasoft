<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [HomeController::class,'index']);

Route::get('contacts/show/{contact}', [ContactController::class, 'show'])->name('contacts.show');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
        Route::post('/store', [ContactController::class, 'store'])->name('contacts.store');
        Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');
        Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::put('/update/{contact}', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('/destroy/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });
});

Auth::routes();

