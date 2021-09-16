<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index');

Route::get('/admin', function (){
    return redirect(route('category.index'));
})  ->name('admin')
    ->middleware(['admin']);


// project routes
Route::get('/projects', 'ProjectController@index')
    ->name('project.index')
    ->middleware(['auth']);

Route::get('/projects/create', 'ProjectController@create')
    ->name('project.create')
    ->middleware(['auth']);

Route::post('/projects/store', 'ProjectController@store')
    ->name('project.store')
    ->middleware(['auth']);

Route::get('/projects/show/{project}', 'ProjectController@show')
    ->name('project.show')
    ->middleware(['auth']);

Route::get('/projects/edit/{project}', 'ProjectController@edit')
    ->name('project.edit')
    ->middleware(['auth']);

Route::put('/projects/update', 'ProjectController@update')
    ->name('project.update')
    ->middleware(['auth']);

Route::delete('/projects/delete/{project}', 'ProjectController@destroy')
    ->name('project.delete')
    ->middleware(['auth']);



// Category routes
Route::get('/categories', 'CategoryController@index')
    ->name('category.index')
    ->middleware(['admin']);

Route::get('/categories/create', 'CategoryController@create')
    ->name('category.create')
    ->middleware(['admin']);

Route::post('/categories/store', 'CategoryController@store')
    ->name('category.store')
    ->middleware(['auth']);

Route::get('/categories/show/{category}', 'CategoryController@show')
    ->name('category.show')
    ->middleware(['admin']);

Route::get('/categories/edit/{category}', 'CategoryController@edit')
    ->name('category.edit')
    ->middleware(['admin']);

Route::put('/categories/update/{category}', 'CategoryController@update')
    ->name('category.update')
    ->middleware(['admin']);

Route::delete('/categories/delete/{category}', 'CategoryController@destroy')
    ->name('category.delete')
    ->middleware(['admin']);



Route::get('/users', 'UserController@index')
    ->name('user.index')
    ->middleware(['admin']);

Route::get('/users/create', 'UserController@create')
    ->name('user.create')
    ->middleware(['admin']);

Route::post('/users/store', 'UserController@store')
    ->name('user.store')
    ->middleware(['auth']);

Route::get('/users/show/{user}', 'UserController@show')
    ->name('user.show')
    ->middleware(['admin']);

Route::get('/users/edit/{user}', 'UserController@edit')
    ->name('user.edit')
    ->middleware(['admin']);

Route::put('/users/update/{user}', 'UserController@update')
    ->name('user.update')
    ->middleware(['admin']);

Route::delete('/users/delete/{user}', 'UserController@destroy')
    ->name('user.delete')
    ->middleware(['admin']);

Auth::routes();

