<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');


Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

