<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
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

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index');
});

Route::controller(ProjectController::class)->group(function () {
    Route::get('/project', 'index')->name('project.show');
    Route::get('/projectshow/{id}' , 'show');
    Route::get('/search' , 'search');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('test', function(){
    return view('test');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/projectupload', [ProjectController::class, 'create'])->name('project.upload');
    Route::post('/projectupload', [ProjectController::class, 'store']);
    Route::get('/projectedit/{id}', [ProjectController::class, 'edit']);
    Route::put('/projectupdate/{id}', [ProjectController::class, 'update']);
    Route::delete('/projectdelete/{id}', [ProjectController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
