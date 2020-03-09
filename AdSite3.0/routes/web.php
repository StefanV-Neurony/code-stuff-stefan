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

Route::redirect('/','home');
Route::get('/home','AdvertisementsController@index')->name('home');
Route::get('/myads','AdvertisementsController@displaypersonal')->middleware('auth')->name('ads.myads');
Route::get('/myitems','ItemsController@displaybought')->middleware('auth')->name('ads.boughtitems');
//Route::get('ads/create','AdvertisementsController@create')->middleware('auth')->name('ads.create');
//Route::get('/ads/edit/{id}','AdvertisementsController@edit')->middleware('auth')->name('ads.edit');
Route::post('ads/update/{id}','AdvertisementsController@update')->middleware('auth')->name('ads.update');
Route::post('ads/store','AdvertisementsController@store')->middleware('auth')->name('ads.store');
Route::post('ads/buy/{id}','AdvertisementsController@buy')->middleware('auth')->name('ads.buy');
Route::delete('/delete/{id}','AdvertisementsController@destroy')->middleware('auth')->name('ads.destroy');
Auth::routes();
