<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile2Controller;
use App\Http\Controllers\NonprofitController;
use App\Http\Controllers\VolunteerOpportunityController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('auth.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('auth.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('auth.profile.destroy');

    Route::get('/profiles/create', [Profile2Controller::class, 'create'])->name('profile.create');
    Route::post('/profiles', [Profile2Controller::class, 'store'])->name('profile.store');
    Route::get('/profiles/{id}/edit', [Profile2Controller::class, 'edit'])->name('profile.edit');
    Route::put('/profiles/{id}', [Profile2Controller::class, 'update'])->name('profile.update');
    Route::get('/profiles/{id}', [Profile2Controller::class, 'show'])->name('profile.show');


    // Nonprofit routes
    Route::get('/nonprofit/create', [NonprofitController::class, 'create'])->name('nonprofit.create');
    Route::post('/nonprofit', [NonprofitController::class, 'store'])->name('nonprofit.store');
    Route::get('/nonprofit/{id}/edit', [NonprofitController::class, 'edit'])->name('nonprofit.edit');
    Route::put('/nonprofit/{id}', [NonprofitController::class, 'update'])->name('nonprofit.update');
    Route::get('/nonprofit/{id}', [NonprofitController::class, 'show'])->name('nonprofit.show');

    // Volunteer Opportunities routes
    Route::get('/opportunity/create', [VolunteerOpportunityController::class, 'create'])->name('opportunity.create');
    Route::post('/opportunity', [VolunteerOpportunityController::class, 'store'])->name('opportunity.store');
    Route::post('/opportunity/delete', [VolunteerOpportunityController::class, 'destroy'])->name('opportunity.destroy');
    Route::get('/opportunity/{id}/edit', [VolunteerOpportunityController::class, 'edit'])->name('opportunity.edit');
    Route::put('/opportunity/{id}', [VolunteerOpportunityController::class, 'update'])->name('opportunity.update');
    Route::get('/opportunity/{id}', [VolunteerOpportunityController::class, 'show'])->name('opportunity.show');
    Route::get('/opportunities', [VolunteerOpportunityController::class, 'index'])->name('opportunity.index');

    // Application routes
    Route::post('/apply', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('application.index');
    Route::get('/application/{id}', [ApplicationController::class, 'show'])->name('application.show');


});

require __DIR__.'/auth.php';
