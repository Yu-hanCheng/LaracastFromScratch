<?php

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
Route::get('test', function () {
    return view('test', ['name' => request('name')]);
});
Route::get('posts/{post}','PostController@show'); 
Route::get('contact', function(){
    return view('contact');
});
Route::get('about', function () {
    return view('about', ['articles' =>App\Article::take(2)->latest('updated_at')->get()]);
});

Route::get('articles/create', 'ArticleController@create');
Route::get('articles/{id}', 'ArticleController@show');
Route::get('articles', 'ArticleController@index');
Route::post('articles', 'ArticleController@store');
Route::get('articles/{id}/edit', 'ArticleController@edit');
Route::put('articles/{id}', 'ArticleController@update');