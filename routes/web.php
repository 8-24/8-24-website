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

Route::get('/', function () {
    $homeSeo = "8-24 est un collectif web et digital neuchâtelois qui a pour objectifs la réalisation de projets digitaux allant du web, web design, processing et toute forme de travaille pouvant regrouper l'art et les technologies actuelles.";
    $keywordsSeo = "8-24 , agence , web , digitale, neuchâtel, art , technologie digitales, 824, processing , web design";
    return view('welcome', ['seo_description' => $homeSeo, 'seo_author' => '', 'seo_keywords' => $keywordsSeo]);
});


//Route::get('/home', );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'ContactController@index');
Route::get('/blog', 'BlogPostController@servIndex');
Route::get('/blog/{slug}', 'BlogPostController@servPostIndex');
Route::get('/works', 'WorksController@ServIndex');
Route::get('/works/{slug}', 'WorksController@ServItemIndex');
Route::get('/labs', 'LabsCategoriesController@servIndex');
//Route::get('/labs', )


/* Home */
Route::get('/admin/home', 'HomeController@adminIndex');
Route::get('/admin/home/edit/{id}', 'HomeController@show');
Route::post('updateHomeSection', ['as' => 'updateHomeSection', 'uses' => 'HomeController@update']);
Route::post('addHomeSection', ['as' => 'addHomeSection', 'uses' => 'HomeController@store']);
Route::post('deleteHomeSection', ['as' => 'deleteHomeSection', 'uses' => 'HomeController@destroy']);
/*BLOG*/
Route::get('/admin/blog', 'BlogPostController@adminIndex');
Route::get('/admin/blog/edit/{id}', 'BlogPostController@adminShow');
Route::get('/admin/blog/add', 'BlogPostController@adminAdd');
Route::post('updateBlogPost',  ['as' => 'updateBlogPost',  'uses' => 'BlogPostController@update']);
Route::post('addBlogPost', ['as' => 'addBlogPost',  'uses' => 'BlogPostController@store']);

/*Works*/
Route::get('/admin/works', 'WorksController@adminIndex');
Route::get('/admin/works/edit/{id}', 'WorksController@adminShow');
Route::get('/admin/works/add', 'WorksController@adminAdd');
Route::post('updateWorks',  ['as' => 'updateWorks',  'uses' => 'WorksController@update']);
Route::post('addWorks', ['as' => 'addWorks',  'uses' => 'WorksController@store']);

/*Home*/
//Route::get('/admin/home', '');

Route::get('/admin', 'AdminController@index');

/* SEO */
Route::get('/admin/seo-default-pages', 'SeoController@index');
Route::get('/admin/seo-default-pages/edit/{id}', 'SeoController@show');
Route::post('updateSeo', ['as' => 'updateSeo', 'uses' => 'SeoController@update']);

/* LAB */
Route::get('/admin/labs/categories', 'LabsCategoriesController@adminIndex');
Route::post('addLabsCategory', ['as' => 'addLabsCategory', 'uses' => 'LabsCategoriesController@store']);
Route::post('editLabsCategory', ['as' => 'editLabsCategory', 'uses' => 'LabsCategoriesController@update']);
Route::post('deleteLabsCategory', ['as' => 'deleteLabsCategory', 'uses' => 'LabsCategoriesController@destroy']);
Route::get('/admin/labs/categories/edit/{id}', 'LabsCategoriesController@adminShow');
Route::get('admin/labs/posts', 'LabsPostController@adminIndex');
Route::post('addLabPost', ['as' => 'addLabPost', 'uses' => 'LabsPostController@store']);

/* Contact message */
Route::get('/admin/contact', 'ContactController@adminIndex');
Route::post('deleteContactMessage', ['as' => 'deleteContactMessage', 'uses' => 'ContactController@destroy']);
