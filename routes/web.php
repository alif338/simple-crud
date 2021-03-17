<?php

use App\Http\Controllers\NotesController;
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

Route::get('/', [NotesController::class, 'view'])->name('notes.index');
Route::get('/note', [NotesController::class, 'get_notes_data'])->name('data');
Route::get('/addnote',[NotesController::class, 'view'])->name('notes.view');
Route::post('/addnote', [NotesController::class,'store'])->name('notes.store');
Route::delete('/addnote/{id}', [NotesController::class, 'destroy'])->name('notes.destroy');
Route::get('/addnote/{id}/edit',[NotesController::class, 'update'])->name('notes.update');

