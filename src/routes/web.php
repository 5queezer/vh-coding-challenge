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

Route::get('/', 'HomeController@index');
Route::get('/questions', function () {
  return redirect('/');
});
Route::post('/questions', 'QuestionsController@store');
Route::get('/questions/{question}', function ($id) {
  return redirect("/questions/{$id}/answers");
});
Route::get('/questions/{question}/answers', 'QuestionsController@show');
Route::post('/questions/{question}/answers', 'AnswersController@store');
