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
Route::get('/test', 'MainController@index');
Route::get('/areas', 'AreasController@index');
Route::get('/areas/save', 'AreasController@store');
Route::get('/competitions', 'CompetitionsController@index');
Route::get('/competitions/save', 'CompetitionsController@store');
Route::get('/teams', 'TeamsController@index');
Route::get('/games', 'GamesController@index');