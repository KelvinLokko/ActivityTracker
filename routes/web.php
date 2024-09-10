<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return redirect()->route('activities.index');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Define the routes for activities
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');
    Route::get('/activities/report', [ActivityController::class, 'report'])->name('activities.report');
    Route::get('/activities/report', [ActivityController::class, 'reportForm'])->name('activities.report.form');
    Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::get('/activities/report/results', [ActivityController::class, 'report'])->name('activities.report');


});


require __DIR__.'/auth.php';
