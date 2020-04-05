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
    $example = resolve(App\Example::class);
    ddd($example);
});
Route::get('test', function () {
    return view('test', ['name' => request('name')]);
});
Route::get('posts/{slug}','PostController@show'); 
Route::get('contact', function(){
    return view('contact');
});
Route::get('about', function () {
    return view('about', ['articles' =>App\Article::take(2)->latest('updated_at')->get()]);
});

Route::get('articles/create', 'ArticleController@create');
Route::get('articles/{article}', 'ArticleController@show')->name('articles.show');
Route::get('articles', 'ArticleController@index')->name('articles.index');
Route::post('articles', 'ArticleController@store');
Route::get('articles/{articleObj}/edit', 'ArticleController@edit');
Route::put('articles/{articleObj}', 'ArticleController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
