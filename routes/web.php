<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Models\Blog;

Route::get('/', function () {
    $parties = \App\Models\Party::all();
    $candidates = \App\Models\Candidate::all();
    return view('welcome', compact('parties', 'candidates'));
})->name('welcome');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('parties', PartyController::class);
    Route::resource('profiles', ProfileController::class);
    Route::resource('candidates', CandidateController::class);
    Route::resource('blogs', BlogController::class);
});

Route::prefix('/')->controller(PageController::class)->group(function () {
    Route::get('parties', 'parties')->name('parties');
    Route::get('parties/{party}', 'party')->name('party');
    Route::get('candidates', 'candidates')->name('candidates');
    Route::get('candidates/{candidate}', 'candidate')->name('candidate');
    // Route::POST('/candidates/filter', 'CandidateController@filter')->name('candidates.filter');
});
Route::prefix('/')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('votes', VoteController::class)->except('show');
    Route::resource('comments', CommentController::class);
    Route::get('votes/{category}', [VoteController::class, 'show'])->name('votes.show');
});


require __DIR__ . '/auth.php';
