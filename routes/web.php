<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home')->middleware('verified');

Route::middleware('admin')->group(function () {

    Route::resource('role', 'RoleController', [
        'except' => 'show'
    ]);
});

Route::middleware('cuisinier')->group(function () {


});

Route::middleware('particulier')->group(function () {


});

Route::middleware ('auth', 'verified')->group (function () {
    Route::resource ('atelier', 'AtelierController', [
        'only' => ['create', 'store', 'destroy', 'update']
    ]);
});