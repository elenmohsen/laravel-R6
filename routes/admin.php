<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
Route::group([
    'prefix' => 'cars',
    'controller' => CarController::class,
    'as' => 'cars.',
    'middleware' => 'verified'
], function() {

    Route::get('','index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::put('/{id}','update')->name('update');
    Route::get('/{id}/show','show')->name('show');
    Route::get('/{id}/delete','destroy')->name('destroy');
    Route::get('/trashed','showDeleted')->name('showDeleted');
    Route::patch('/{id}','restore')->name('restore');
    Route::delete('/{id}/forcedelete','forcedelete')->name('forcedelete');
});

Auth::routes(['verify'=> true]);
});