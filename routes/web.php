<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/', [EventController::class, 'index'])->name('home'); // "index" mostra todos os registros
Route::get('/events/create', [EventController::class, 'create'])->name('events.create')->middleware('auth'); // "create" para mostrar um form de criar registro no banco
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show'); // "show" mostra um dado específico
Route::post('/events', [EventController::class, 'store'])->name('events.store'); // "store" para enviar os dados no banco
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy'); // "destroy" deleta um evento do banco por meio dessa rota

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard')->middleware('auth');

