<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\CategorieController;
use App\Models\Pays;
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
*/ //ContactController
Route::resource('contacts', ContactController::class);
Route::get('/',[ContactController::class,'index']);
Route::get('/modifierContact',[ContactController::class,'edit']);
Route::get('/createContact',[ContactController::class,'create'])->name("contacts.create");
Route::post('/storecontact',[ContactController::class,'store']);
Route::get('/create',[PaysController::class,'index']);

// paysController
Route::get('/createPays',[PaysController::class,'create'])->name("pays.create");
Route::post('/storePays',[PaysController::class,'store']);
// Categorie
Route::get('/createCategorie',[CategorieController::class,'create'])->name("categories.create");
Route::post('/storeCategorie',[CategorieController::class,'store']);

