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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('/categories','CategoryController');

Route::prefix('users')->group(function () {  
    Route::get('/', function () {
      return view('welcome');
    })->name('user.home');
    Route::get('/categories','CategoryController@index')->middleware('auth')->name('user.categories.index');
    Route::get('/categories/create','CategoryController@create')->middleware('auth')->name('user.categories.create');
    Route::post('/categories/store','CategoryController@store')->middleware('auth')->name('user.categories.store');
    Route::get('/categories/{id}/edit','CategoryController@edit')->middleware('auth')->name('user.categories.edit');
    Route::put('/categories/{id}/edit','CategoryController@update')->middleware('auth')->name('user.categories.update');
    Route::delete('/categories/{id}/destroy','CategoryController@destroy')->middleware('auth')->name('user.categories.destroy');

    Route::get('items/index', 'ItemController@index')->name('items.index');
    Route::post('items/save', 'ItemController@store')->name('items.save');
    Route::get('items-list','ItemController@apiIndex')->name('items.list');
    Route::post('items/edit','ItemController@update')->name('items.edit');
    Route::delete('items/destroy','ItemController@destroy')->name('items.delete');

    Route::get('/found','FoundController@index')->name('users.found');
    Route::post('/founded','FoundController@found')->name('users.founded');

    Route::post('/lost','LostController@lost')->name('users.lost');

    Route::get('/base','NotificationController@checkNotifications')->name('users.checkNotifications');
    Route::get('/notifications-list','NotificationController@apiIndex')->name('users.Notificationslist');
    Route::get('/notifications','NotificationController@Index')->name('users.Notifications');

    Route::get('/user/{id}/about','UserController@about')->name('users.about');
    Route::get('user/register2','UserController@register2')->name('users.register2');
    Route::post('/user/complete','UserController@complete')->name('users.complete');
    Route::get('/user/tutorial','UserController@tutorial')->name('users.tutorial');
    });
