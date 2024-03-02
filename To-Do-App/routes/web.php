<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

//Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

//tasks
Route::get('/createTaskRoute', [DashboardController::class, 'createTask'])->name('createTask');
Route::post('/saveTaskRoute', [DashboardController::class, 'saveTask'])->name('saveTask');
Route::post('/markCompleteRoute/{id}', [DashboardController::class, 'markComplete'])->name('markComplete');
Route::post('/markPendingRoute/{id}', [DashboardController::class, 'markPending'])->name('markPending');
Route::post('/deleteTaskRoute/{id}', [DashboardController::class, 'deleteTask'])->name('deleteTask');
Route::post('/assignImportanceRoute/{id}', [DashboardController::class, 'assignImportance'])->name('assignImportance');
Route::get('/showCompletedRoute', [DashboardController::class, 'showCompleted'])->name('showCompleted');

//projects
Route::get('/createProjectRoute', [ProyectoController::class, 'createProject'])->name('createProject');
Route::post('/saveProjectRoute', [ProyectoController::class, 'saveProject'])->name('saveProject');
Route::get('/showProjectsRoute', [ProyectoController::class, 'showProjects'])->name('showProjects');
Route::post('/deleteProjectRoute/{id}', [ProyectoController::class, 'deleteProject'])->name('deleteProject');
Route::post('/markProjectCompletedRoute/{id}', [ProyectoController::class, 'markProjectCompleted'])->name('markProjectCompleted');
Route::post('/markProjectPendingRoute/{id}', [ProyectoController::class, 'markProjectPending'])->name('markProjectPending');
Route::get('/completedProjectsRoute', [ProyectoController::class, 'completedProjects'])->name('completedProjects');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
