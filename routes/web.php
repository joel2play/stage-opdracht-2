<?php

use App\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
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

Route::get('/home', function(){ return view('index')->with('projects', Project::all()->sortByDesc('created_at')); })
    ->name('home')
    ->middleware('auth');

Route::get('/admin', function (){
    return redirect(route('user.index'));
})  ->name('admin')
    ->middleware(['admin']);


// project routes
Route::get('/projects', 'ProjectController@index')
    ->name('project.index')
    ->middleware(['auth']);

Route::get('/projects/create', 'ProjectController@create')
    ->name('project.create')
    ->middleware(['admin']);

Route::post('/projects/store', 'ProjectController@store')
    ->name('project.store')
    ->middleware(['auth']);

Route::get('/projects/show/{project}', 'ProjectController@show')
    ->name('project.show')
    ->middleware(['auth']);

Route::get('/project/overview/{project}', 'ProjectController@overview')
    ->name('project.overview')
    ->middleware(['auth', 'can:edit,project']);

Route::get('/projects/edit/{project}', 'ProjectController@edit')
    ->name('project.edit')
    ->middleware(['auth']);

Route::put('/projects/update/{project}', 'ProjectController@update')
    ->name('project.update')
    ->middleware(['auth']);

Route::delete('/projects/delete/{project}', 'ProjectController@destroy')
    ->name('project.delete')
    ->middleware(['auth', 'can:delete,project']);

Route::post('/project/{project}/join', 'ProjectController@join')
    ->name('project.join')
    ->middleware(['auth']); 

Route::post('/project/{project}/leave', 'ProjectController@leave')
    ->name('project.leave')
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


// User routes
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


// Profile routes
Route::get('/profile', 'ProfileController@index')
    ->name('profile.index')
    ->middleware(['auth']);

Route::get('/profile/{user}', 'ProfileController@show')
    ->name('profile.show')
    ->middleware(['auth']);

Route::get('/profile/edit/{user}', 'ProfileController@edit')
    ->name('profile.edit')
    ->middleware(['auth', 'can:edit,user']);

Route::get('/profile/{user}/projects', 'ProfileController@projects')
    ->name('profile.projects')
    ->middleware(['auth']);

Route::get('/profile/project/create', 'ProfileController@createProject')
    ->name('profile.project.create')
    ->middleware(['auth']);

Route::get('/profile/project/edit/{project}', 'ProfileController@editProject')
    ->name('profile.project.edit')
    ->middleware(['auth', 'can:edit,project']);

Route::put('/profile/update/{user}', 'ProfileController@update')
    ->name('profile.update')
    ->middleware(['auth', 'can:update,user']);



// Comment routes
Route::post('/comment/store/{project}', 'CommentController@store')
    ->name('comment.store')
    ->middleware(['auth']);

Auth::routes();

