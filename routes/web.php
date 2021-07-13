<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProdutoController;
use GuzzleHttp\Middleware;


Route::get('/produto/reserva/{id}', [ProdutoController::class, 'reservaProduto'])->middleware('auth');
Route::delete('/produtos/{id}', [ProdutoController::class, 'deletar'])->middleware('auth');
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::post('/produtos', [ProdutoController::class, 'stor']);
Route::get('/produto/cadastro', [ProdutoController::class, 'cadastro'])->middleware('auth');
Route::get('/produtos/editar/{id}', [ProdutoController::class, 'editProduto'])->middleware('auth');
Route::put('/produtos/update/{id}', [ProdutoController::class, 'updateProduto'])->middleware('auth');
Route::get('/dashboardProdutos', [ProdutoController::class, 'dashboardProdutos'])->middleware('auth');
Route::delete('/produtos/leave/{id}', [ProdutoController::class, 'leaveProduto'])->middleware('auth');

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');
Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');

