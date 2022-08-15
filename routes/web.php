<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['is_admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
        Route::resource('checklist-groups', App\Http\Controllers\Admin\ChecklistGroupController::class);
        Route::resource('checklist-groups.checklists', App\Http\Controllers\Admin\ChecklistController::class);
        Route::resource('checklists.tasks', App\Http\Controllers\Admin\TaskController::class);
    });
});
