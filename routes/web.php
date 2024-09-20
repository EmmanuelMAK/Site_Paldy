<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master');
});
// Dans le fichier routes/web.php
Route::get('/upload', [ImageController::class, 'showForm']);
Route::post('/upload', [ImageController::class, 'store']);
Route::get('/Accueil','AccueilController@Accueil');

