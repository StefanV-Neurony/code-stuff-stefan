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



Auth::routes();
Route::get('/','AdvertisementsController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/myads','AdvertisementsController@show')->name('ads.myads');
Route::get('/home','AdvertisementsController@index')->name('home');
Auth::routes();
