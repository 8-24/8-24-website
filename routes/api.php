<?php

use Illuminate\Http\Request;

Route::get('/home', ['uses' => 'HomeController@index']);

Route::get('/blog/limit/{limit?}', ['uses' => 'BlogPostController@index']);

Route::get('/blog/{slug}', ['uses' => 'BlogPostController@show']);

Route::get('/works/{slug}', ['uses' => 'WorksController@show']);

Route::get('/works/limit/{limit?}', ['uses' => 'WorksController@index']);

Route::get('/labs/categories', ['uses' => 'LabsCategoriesController@index']);

Route::get('/labs/categories/{slug}', ['uses' => 'LabsCategoriesController@show']);
// to get all posts from one category
Route::get('/labs/{category}/posts', ['uses' => 'LabsPostController@showCat']); 

Route::get('/labs/posts/{slug}', ['uses' => 'LabsPostController@show']);

Route::post('/add-contact-message', ['uses' => 'ContactController@store']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
