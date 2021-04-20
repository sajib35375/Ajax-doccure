<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'App\Http\Controllers'],function (){
   Route::get('user','UserController@index')->name('user.index');
   Route::post('user/store','UserController@store')->name('user.store');
   Route::get('user/show','UserController@show')->name('user.show');
   Route::get('user/view/{id}','UserController@view')->name('user.view');









   Route::get('role','RoleController@index')->name('role.index');
   Route::post('role/store','RoleController@store')->name('role.store');
   Route::get('role/show','RoleController@show')->name('role.show');
   Route::get('status/update/{id}','RoleController@statusUpdate')->name('status.update');
   Route::get('Role/edit/{id}','RoleController@RoleEdit')->name('role.edit');
   Route::post('Role/update','RoleController@RoleUpdate')->name('role.update');
   Route::get('Role/delete/{id}','RoleController@RoleDelete')->name('role.delete');
});
