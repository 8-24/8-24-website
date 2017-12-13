<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/home', ['uses' => 'HomeController@index']);

Route::get('/works', ['uses' => 'WorksController@index']);

Route::get('/blog/limit/{limit?}', ['uses' => 'BlogPostController@index']);

Route::get('/blog/{slug}', ['uses' => 'BlogPostController@show']);

Route::get('/works/{slug}', ['uses' => 'WorksController@show']);

Route::get('/works/limit/{limit?}', ['uses' => 'WorksController@index']);

Route::get('/labs/categories', ['uses' => 'LabsCategoriesController@index']);

Route::get('/creative-coding', ['uses' => 'LabsPostController@index']);

Route::get('/labs/{category}/{slug}', ['uses' => 'LabsPostController@show']);

Route::post('/add-contact-message', ['uses' => 'ContactController@store']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
