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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Categories

Route::get('/create-category', 'CategoryController@create')->name('category.create');
Route::post('/category/save', 'CategoryController@save')->name('category.save');


//Operations

Route::get('/create-operation/{operation?}', 'OperationController@create')->name('operation.create');
Route::get('/lists-operation', 'OperationController@lists')->name('operation.lists');
Route::get('/edit/{id}', 'OperationController@edit')->name('operation.edit');
Route::get('/delete/{id}', 'OperationController@delete')->name('operation.delete');
Route::post('/operation/save', 'OperationController@save')->name('operation.save');
Route::post('/operation/update', 'OperationController@update')->name('operation.update');
