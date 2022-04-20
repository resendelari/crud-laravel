<?php

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


Route::group(['middleware'=>'web'], function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Route::get('/contacts',[\App\Http\Controllers\ContactController::class, 'getContacts']);
Route::get('/contacts/new',[\App\Http\Controllers\ContactController::class, 'getNewContacts']);
Route::post('/contacts/add',[\App\Http\Controllers\ContactController::class, 'addContacts']);
Route::get('/contact/{id}/edit',[\App\Http\Controllers\ContactController::class, 'editContacts']);
Route::post('/contacts/update/{id}',[\App\Http\Controllers\ContactController::class, 'updateContact']);
Route::delete('/contacts/delete/{id}',[\App\Http\Controllers\ContactController::class, 'deleteContact']);

