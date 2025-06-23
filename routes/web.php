<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/', [EventController::class, 'index'])->name('home'); // "index" mostra todos os registros
Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // "create" para mostrar um form de criar registro no banco
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show'); // "show" mostra um dado específico
Route::post('/events', [EventController::class, 'store'])->name('events.store'); // "store" para enviar os dados no banco

Route::get('/contact', function () {
    return view('contact');
});



