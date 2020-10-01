<?php

use App\Http\Controllers\MatchController;
use App\Http\Controllers\TeamController;
use App\Models\Match;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

//Route::get('/match/create', [MatchController::class, 'create'])->middleware('auth');
//Route::get('/team/create', [MatchController::class, 'create'])->middleware('auth');

Route::resource('/matches', MatchController::class)->middleware(['auth', 'can:create,'. Match::class]);
Route::resource('/teams', TeamController::class)->middleware(['auth', 'can:create,'. Team::class]);
