<?php

use App\Http\Controllers\{ ProfileController, UserController, ProjectController };
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('homePage');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/users/{name}', 'profile_index')->name('profile.index');
    });

    Route::controller(ProjectController::class)->group(function() {
        Route::get('/project/create', 'index')->name('project.create.index');
        Route::post('/project/new', 'create')->name('project.create');
    });
});

require __DIR__.'/auth.php';
