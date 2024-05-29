<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ElectionController;

Route::get('/', function () {
    $parties = \App\Models\Party::all();
    $candidates = \App\Models\Candidate::all();
    return view('welcome', compact('parties', 'candidates'));
})->name('welcome');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profiles', ProfileController::class);
});

Route::prefix('/')->group(function () {
    Route::resource('candidates', CandidateController::class);
    Route::resource('parties', PartyController::class);
    Route::resource('votes', VoteController::class)->except('show');
    Route::get('/votes/{category}', [VoteController::class, 'show'])->name('votes.show');

    // Route::POST('/candidates/filter', 'CandidateController@filter')->name('candidates.filter');
});


require __DIR__ . '/auth.php';
