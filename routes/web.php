<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\StudentController;

/*
|--------------------------------------------------------------------------
| STUDENT Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PagesController::class, 'index'])->name('homepage');

Route::group(['prefix'=>'/student'], function() {
    Route::get('/manage', [StudentController::class, 'index'])->name('student.manage');
    Route::get('/managetrash', [StudentController::class, 'managetrash'])->name('student.managetrash');
    Route::get('/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::post('/trash/{id}', [StudentController::class, 'trash'])->name('student.trash');
    Route::post('/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
});












/*
|--------------------------------------------------------------------------
| DEFAULT AFTER INSTALL LARAVEL Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
