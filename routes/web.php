<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaysController;
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
Route::resource('contacts', ContactController::class);
Route::get('/contacts/{contact}/edit')->name("contacts.edit");
Route::get('/',[ContactController::class,'index']);
Route::get('/modifierContact',[ContactController::class,'edit']);
Route::get('/createContact',[ContactController::class,'create'])->name("contacts.create");
Route::post('/storecontact',[ContactController::class,'store']);
Route::get('/create',[PaysController::class,'index']);

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/welcome', function () {
//     return view('welcome');
// });
// Route::prefixcontroller(ContactController::class)->group(function () {
// Route::get('/','ContactController@welcame')->name('home');;
// Route::get('/', 'welcame')->name("welcame");
// Route::get('/createContact', 'create')->name("contacts.create");
// Route::get('/recuperpaysverscontact', 'recuperpaysverscontact')->name("contacts.create");
// Route::post('/storecontact', 'store');


// });
/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */
