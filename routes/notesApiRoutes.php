<?php

use App\Http\Controllers\API\V1\APINoteController;
use Illuminate\Support\Facades\Route;

Route::controller(APINoteController::class)->prefix('notes')->group(function () {
    // localhost:8000/api/notes/
    Route::get('/', 'index')->name('notes.get-notes-list');

    // localhost:8000/api/notes/1
    // localhost:8000/api/notes/A094A6D8-9F02-4249-8A30-62D71B5034BA
    // localhost:8000/api/notes/my-test-title
    Route::get('/{note}', 'show')->name('notes.get-note-by-id');
    // localhost:8000/api/notes
    Route::post('/', 'store')->name('notes.create-new-note');
    // localhost:8000/api/notes/1/update
    Route::put('/{note}/update', 'update')->name('notes.update-note-by-id');
    // localhost:8000/api/notes/1/delete
    Route::delete('/{note}/delete', 'destroy')->name('notes.delete-note-by-id');
});
