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
Route::group(['prefix'=>'ads', 'middleware'=>'auth'], function() {
    Route::get('mine','AdvertisementsController@displayPersonal')->name('ads.myads');
    Route::get('/mine/items','ItemsController@displaybought')->name('ads.boughtitems');
    Route::post('/update/{advertisement}','AdvertisementsController@update')->name('ads.update');
    Route::post('/store','AdvertisementsController@store')->name('ads.store');
    Route::post('/buy/{advertisement}','AdvertisementsController@buyItem')->name('ads.buy');
    Route::delete('/delete/{advertisement}','AdvertisementsController@destroy')->name('ads.destroy');
});
Auth::routes();
