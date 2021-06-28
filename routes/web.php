<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
