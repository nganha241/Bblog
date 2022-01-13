<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('login', 'AuthController@submitLogin')->name('auth.login-submit');
Route::post('logout', 'AuthController@logout')->name('auth.logout');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin'
], function() {
    Route::get('/', function () {
        return view('layouts.admin');
    })->name('dashboard');
    
    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('admin.users');
        Route::get('/create', 'UserController@create')->name('admin.users.create');
        Route::post('/store', 'UserController@store')->name('admin.users.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('admin.users.edit');
        Route::post('/update/{id}', 'UserController@update')->name('admin.users.update');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('admin.users.delete');
        Route::get('/my-profile', 'UserController@profile')->name('profile');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index')->name('admin.categories');
        Route::get('/create', 'CategoryController@create')->name('admin.categories.create');
        Route::post('/store', 'CategoryController@store')->name('admin.categories.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('admin.categories.update');
        Route::get('/destroy/{id}', 'CategoryController@destroy')->name('admin.categories.delete');
    });
    
    Route::prefix('tags')->group(function () {
        Route::get('/', 'TagController@index')->name('admin.tags');
        Route::get('/create', 'TagController@create')->name('admin.tags.create');
        Route::post('/store', 'TagController@store')->name('admin.tags.store');
        Route::get('/edit/{id}', 'TagController@edit')->name('admin.tags.edit');
        Route::post('/update/{id}', 'TagController@update')->name('admin.tags.update');
        Route::get('/destroy/{id}', 'TagController@destroy')->name('admin.tags.delete');
    });
    
    Route::prefix('posts')->group(function () {
        Route::get('/', 'PostController@index')->name('admin.posts');
        Route::get('/create', 'PostController@create')->name('admin.posts.create');
        Route::post('/store', 'PostController@store')->name('admin.posts.store');
        Route::get('/edit/{id}', 'PostController@edit')->name('admin.posts.edit');
        Route::post('/update/{id}', 'PostController@update')->name('admin.posts.update');
        Route::get('/destroy/{id}', 'PostController@destroy')->name('admin.posts.delete');
    });
});

Route::get('/', 'PageController@home')->name('home');
Route::get('/search', 'PageController@search')->name('search');
Route::get('/category/{post}', 'PageController@category')->name('category');
Route::get('/{post}', 'PageController@detail')->name('post.detail');