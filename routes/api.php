<?php

use Illuminate\Http\Request;

Route::get('/home', ['uses' => 'HomeController@index']);

Route::get('/works', ['uses' => 'WorksController@index']);

Route::get('/blog/limit/{limit?}', ['uses' => 'BlogPostController@index']);

Route::get('/blog/{slug}', ['uses' => 'BlogPostController@show']);

Route::get('/works/{slug}', ['uses' => 'WorksController@show']);

Route::get('/works/limit/{limit?}', ['uses' => 'WorksController@index']);

Route::get('/labs/categories', ['uses' => 'LabsCategoriesController@index']); // ok
Route::get('/labs/categories/{slug}', ['uses' => 'LabsCategoriesController@show']);
Route::get('/labs/{category}/posts', ['uses' => 'LabsPostController@showCat']);
Route::get('/labs/posts/{slug}', ['uses' => 'LabsPostController@show']);
//Route::get('/labs/posts/{slug}', ['uses' => 'LabsPostController@index']);


Route::post('/add-contact-message', ['uses' => 'ContactController@store']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
