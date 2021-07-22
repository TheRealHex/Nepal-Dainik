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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// NewsHome
// Route::view('/index','newshome.index');
Route::get('/', 'websiteController@index')->name('newshome.index');
Route::get('/post/{title}', 'websiteController@showPost')->name('newshome.showPost');
Route::get('/contact', 'websiteController@contact')->name('newshome.contact');

Route::get('/category/{name}', 'websiteController@catPost')->name('newshome.category');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sponsor','websiteController@sponsor')->name('sponsor');
Route::post('/sponsor','websiteController@sponsorStore')->name('sponsorStore');


Route::get("/search",'SearchController@index')->name('search');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/pending-posts','Admin\PostController@pending')->name('pendingPosts');
    Route::get('/approve-posts','Admin\PostController@approved')->name('approvedPosts');
    Route::get('/declined-posts','Admin\PostController@declined')->name('declinedPosts');
    Route::put('/manage-posts/status/{id}','Admin\PostController@status')->name('manage.postStatus');

    Route::get('/post','Admin\PostController@writerIndex')->name('post.index');
    Route::get('/create-post','Admin\PostController@create')->name('create.post');
    Route::get('/post-mgmt','Admin\PostController@writerIndex')->name('manage.post');
    Route::get('/preferences','Admin\PostController@writerPref')->name('writer.settings');
    Route::post('/post','Admin\PostController@store')->name('store.post');
    Route::get('/edit-post/{id}','Admin\PostController@edit')->name('edit.post');
    Route::put('/edit-post/{id}','Admin\PostController@update')->name('update.post');
    Route::delete('/post-delete/{id}','Admin\PostController@destroy')->name('delete.post');
});

// Admin
Route::group(['middleware' => ['auth','isAdmin']], function (){
    Route::get('/users','Admin\UsersController@getUsers')->name('getUsers');
    Route::get('/user/edit/{id}','Admin\UsersController@userEdit')->name('userEdit');
    Route::put('/user/role-update/{id}','Admin\UsersController@roleupdate')->name('userRoleUpdate');
    Route::delete('/user/{id}','Admin\UsersController@userdelete')->name('userDelete');

    Route::get('/sponsor-mgmt/pending','Admin\SponsorController@index')->name('pending.sponsor');
    Route::get('/sponsor-mgmt/approved','Admin\SponsorController@approved')->name('approved.sponsor');
    Route::get('/sponsor-mgmt/declined','Admin\SponsorController@declined')->name('declined.sponsor');
    Route::put('/sponsor-mgmt/status/{id}','Admin\SponsorController@status')->name('manage.sponsorStatus');

    Route::get('/categories','Admin\CategoryController@index')->name('categories.index');
    Route::get('/categories-create','Admin\CategoryController@create')->name('categories.create');
    Route::post('/categories','Admin\CategoryController@store')->name('categories.store');
    Route::get('/categories-edit/{id}','Admin\CategoryController@edit')->name('categories.edit');
    Route::put('/categories/{id}','Admin\CategoryController@update')->name('categories.update');
    Route::delete('/category-delete/{id}','Admin\CategoryController@destroy')->name('categories.delete');
});
