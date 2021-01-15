<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Front\HomeController@index');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile','Front\ProfileController@getProfile')->name('myaccount');
    Route::post('profile','Front\ProfileController@postProfile');

    Route::get('albums','Front\AlbumsController@index');
    Route::get('albums/create','Front\AlbumsController@create');
    Route::post('albums','Front\AlbumsController@store');
    Route::get('albums/{id}/delete','Front\AlbumsController@destroy');
    Route::get('albums/{id}/edit','Front\AlbumsController@edit');
    Route::post('albums/{id}','Front\AlbumsController@update');
    Route::post('img/{id}','Front\AlbumsController@deleteImg');

    Route::get('/home', 'HomeController@index')->name('dashboard')->middleware('admin');

    Route::group(['prefix' => '/admin','middleware'=>'admin','middleware'=>'auth','namespace' => 'dashboard'], function () {


        /*============= start  comments ============*/
        Route::group(['prefix' => 'albums','middleware' => ['permission:albums|show albums|delete albums']], function (){
            Route::get('/','AlbumsCont@index')->name('albums');
            Route::get('{id}/show','AlbumsCont@show')->name('albums-show')->middleware('permission:show albums');
            Route::post('deleteall','AlbumsCont@deleteall')->name('albums-delete')->middleware('permission:delete albums');
        });
        /*============= end  comments ============*/

        /*============= start  roles ============*/
        Route::group(['prefix' => 'roles','middleware' => ['permission:Roles|add Role|edit Role|delete Role|export Role']], function (){
            Route::get('/','RolesCont@index')->name('roles');
            Route::get('add','RolesCont@create')->name('roles-create')->middleware('permission:add Role');
            Route::post('store','RolesCont@store')->name('roles-store');
            Route::get('{id}/edit','RolesCont@edit')->name('roles-edit')->middleware('permission:edit Role');
            Route::post('update','RolesCont@update')->name('roles-update');
            Route::post('deleteall','RolesCont@deleteall')->name('roles-delete');
        });
        /*============= end  roles ============*/
        /*============= start  users ============*/
        Route::group(['prefix' => 'users','middleware' => ['permission:Users|add User|edit User|delete User|export User']], function (){
            Route::get('/','UsersCont@index')->name('users');
            Route::get('add','UsersCont@create')->name('users-create')->middleware('permission:add User');
            Route::post('store','UsersCont@store')->name('users-store');
            Route::get('{id}/edit','UsersCont@edit')->name('users-edit')->middleware('permission:edit User');
            Route::post('update','UsersCont@update')->name('users-update');
            Route::post('deleteall','UsersCont@deleteall')->name('users-delete');
        });
        /*============= end  users ============*/
    });


//    Route::get('logout','Auth\LoginController@logout');
});

