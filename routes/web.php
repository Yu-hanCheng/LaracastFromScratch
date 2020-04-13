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
Route::get('notifications', 'UserNotificationsController@show')->middleware('auth');
Route::get('payments/create', 'PaymentController@create')->middleware('auth');
Route::post('payments', 'PaymentController@store')->middleware('auth')->name('payment.store');
Route::post('recvEmail', 'ContactController@store')->name('email.store');
Route::get('SetEmail', 'ContactController@home')->name('email.set');
Route::get('/', 'PageController@home');
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

Route::group(['middleware'=>['auth']], function(){
    Route::get('articles/create', 'ArticleController@create');
    Route::get('articles/{article}', 'ArticleController@show')->name('articles.show')->middleware('can:view,article');
    Route::get('articles', 'ArticleController@index')->name('articles.index');
    Route::post('articles', 'ArticleController@store');
    Route::get('articles/{articleObj}/edit', 'ArticleController@edit');
    Route::put('articles/{articleObj}', 'ArticleController@update');
    Route::post('bestReply/{replyObj}', 'ArticleController@bestReply')->name('bestReply.store');
    Route::get('timeline','ArticleController@timeline');
    Route::post('profiles/{user:name}/follow','FollowsController@store');
    Route::get('profiles/{user:name}','ProfilesController@show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
