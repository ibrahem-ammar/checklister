<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'last_action'])->group(function () {


    Route::redirect('/', '/dashboard');

    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/welcome', [App\Http\Controllers\DashboardController::class, 'welcome'])->name('welcome');

    Route::get('/get-consultation', [App\Http\Controllers\DashboardController::class, 'consultation'])->name('consultation');

    Route::get('users/checklist/{checklist}', [App\Http\Controllers\User\ChecklistController::class, 'show'])->name('users.checklists.show');

    Route::middleware(['is_admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('/users', [App\Http\Controllers\DashboardController::class, 'users'])->name('users.index');
        Route::post('tasks/upload-image', [App\Http\Controllers\Admin\ImageController::class, 'upload'])->name('tasks.upload-image');

        Route::resource('pages', App\Http\Controllers\Admin\PageController::class)
            ->only(['edit', 'update']);

        Route::resource('checklist-groups', App\Http\Controllers\Admin\ChecklistGroupController::class);

        Route::resource('checklist-groups.checklists', App\Http\Controllers\Admin\ChecklistController::class);

        Route::resource('checklists.tasks', App\Http\Controllers\Admin\TaskController::class);
    });
});

Auth::routes();
