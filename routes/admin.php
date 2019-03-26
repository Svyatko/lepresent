<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

Route::resource('designers', 'Admin\DesignerController')->except('show');
Route::post('designers/search', 'Admin\DesignerController@search')->name('designers.search');
Route::post('designers/{id}/switch', 'Admin\DesignerController@switchDesigner')->name('designers.switch');

Route::resource('brands', 'Admin\BrandsController');
Route::post('brands/search', 'Admin\BrandsController@search')->name('brands.search');

Route::resource('items', 'Admin\ItemsController');
Route::delete('items/image-destroy/{id}', 'Admin\ItemsController@imageDestroy')->name('images.destroy');
Route::post('items/search', 'Admin\ItemsController@search')->name('items.search');

Route::resource('collections', 'Admin\CollectionController');

Route::get('users', 'Admin\UserController@index')->name('users.index');

Route::prefix('pages')->group(function () {
    Route::get('contacts', 'Admin\Pages\IndexController@contacts')->name('pages.contacts');
    Route::post('contacts', 'Admin\Pages\IndexController@contactStore')->name('pages.contacts.store');
});
Route::prefix('settings')->group(function () {
    Route::get('/', 'Admin\Settings\HomepageController@index')->name('settings.homepage');
    Route::delete('{id}', 'Admin\Settings\IndexController@destroy')->name('settings.destroy');
    Route::resource('sizes', 'Admin\Settings\SizeController')->except('show');
    Route::resource('colors', 'Admin\Settings\ColorController')->except('show');
    Route::resource('categories', 'Admin\Settings\CategoryController')->except('show');
});