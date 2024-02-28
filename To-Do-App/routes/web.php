<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskMasterController;
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

Route::get('/', [TaskMasterController::class, 'index']);

Route::post('/saveTaskRoute', [TaskMasterController::class, 'saveTask'])->name('saveTask');
Route::post('/markCompleteRoute/{id}', [TaskMasterController::class, 'markComplete'])->name('markComplete');
Route::post('/deleteTaskRoute/{id}', [TaskMasterController::class, 'deleteTask'])->name('deleteTask');
Route::post('/assignImportanceRoute/{id}', [TaskMasterController::class, 'assignImportance'])->name('assignImportance');
Route::get('/showCompletedRoute', [TaskMasterController::class, 'showCompleted'])->name('showCompleted');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
