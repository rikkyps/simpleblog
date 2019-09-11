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

Route::get('/', 'IndexController@index');
Route::get('/blog', 'IndexController@blog');
Route::get('/blog/{slug}', 'IndexController@show');
Route::post('/blog/{slug}/comment', 'IndexController@comment')->name('post.comment');
Route::get('/blog/category/{slug}', 'IndexController@blogCategory');
Route::get('/search', 'IndexController@blogSearch');

Auth::routes();



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('posts', 'PostsController');
    Route::resource('comments', 'CommentsController', ['except' => ['create', 'store']]);
    
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::post('settings', 'SettingsController@store')->name('settings.store');
});


Route::group(['middleware' => 'auth'], function(){
    
    //API Datatables
    Route::get('/api/datatable/users', 'UsersController@dataTable')->name('api.datatable.users');
    Route::get('/api/datatable/categories', 'CategoriesController@dataTable')->name('api.datatable.categories');
    Route::get('/api/datatable/posts', 'PostsController@dataTable')->name('api.datatable.posts');
    Route::get('/api/datatable/comments', 'CommentsController@dataTable')->name('api.datatable.comments');
});





