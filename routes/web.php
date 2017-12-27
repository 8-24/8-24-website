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



//Route::get('/home', );

Auth::routes();
Route::get('/', 'HomeController@servIndex');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'ContactController@servIndex');
Route::get('/blog', 'BlogPostController@servIndex');
Route::get('/blog/{slug}', 'BlogPostController@servPostIndex');
Route::get('/works', 'WorksController@ServIndex');
Route::get('/works/{slug}', 'WorksController@ServItemIndex');
Route::get('/labs/{category}', 'LabsCategoriesController@servShow');
Route::get('/labs/{category}/{slug}', 'LabsPostController@servShow');
Route::get('/labs', 'LabsCategoriesController@servIndex');
Route::get('/iframe/{slug}', 'ProcessingFrameController@show');
Route::get('/error/404', 'ErrorController@index');

Route::group(['prefix' => '/admin',  'middleware' => 'auth'], function()
{
        /* Home */
        Route::get('/', 'AdminController@index');
        Route::get('/home', 'HomeController@adminIndex');
        Route::get('/home/edit/{id}', 'HomeController@show');
        Route::post('updateHomeSection', ['as' => 'updateHomeSection', 'uses' => 'HomeController@update']);
        Route::post('addHomeSection', ['as' => 'addHomeSection', 'uses' => 'HomeController@store']);
        Route::post('deleteHomeSection', ['as' => 'deleteHomeSection', 'uses' => 'HomeController@destroy']);
        /*BLOG*/
        Route::get('/blog', 'BlogPostController@adminIndex');
        Route::get('/blog/edit/{id}', 'BlogPostController@adminShow');
        Route::get('/blog/add', 'BlogPostController@adminAdd');
        Route::post('updateBlogPost',  ['as' => 'updateBlogPost',  'uses' => 'BlogPostController@update']);
        Route::post('addBlogPost', ['as' => 'addBlogPost',  'uses' => 'BlogPostController@store']);
        /*Works*/
        Route::get('/works', 'WorksController@adminIndex');
        Route::get('/works/edit/{id}', 'WorksController@adminShow');
        Route::get('/works/add', 'WorksController@adminAdd');
        Route::post('updateWorks',  ['as' => 'updateWorks',  'uses' => 'WorksController@update']);
        Route::post('addWorks', ['as' => 'addWorks',  'uses' => 'WorksController@store']);
        
        /* SEO */
        Route::get('/seo-default-pages', 'SeoController@index');
        Route::get('/seo-default-pages/edit/{id}', 'SeoController@show');
        Route::post('updateSeo', ['as' => 'updateSeo', 'uses' => 'SeoController@update']);
        
        /* LAB */
        Route::get('/labs/categories', 'LabsCategoriesController@adminIndex');
        Route::post('addLabsCategory', ['as' => 'addLabsCategory', 'uses' => 'LabsCategoriesController@store']);
        Route::post('editLabsCategory', ['as' => 'editLabsCategory', 'uses' => 'LabsCategoriesController@update']);
        Route::post('deleteLabsCategory', ['as' => 'deleteLabsCategory', 'uses' => 'LabsCategoriesController@destroy']);
        Route::get('/labs/categories/edit/{id}', 'LabsCategoriesController@adminShow');
        Route::get('/labs/posts', 'LabsPostController@adminIndex');
        Route::post('addLabPost', ['as' => 'addLabPost', 'uses' => 'LabsPostController@store']);
        
        /* Contact message */
        Route::get('/contact', 'ContactController@adminIndex');
        Route::post('deleteContactMessage', ['as' => 'deleteContactMessage', 'uses' => 'ContactController@destroy']);

        /* ProcessingFrame */
        Route::get('/processing-frame', 'ProcessingFrameController@adminIndex');
        Route::get('/processing-frame/edit/{id}', 'ProcessingFrameController@adminShow');
        Route::post('addProcessingPost', ['as' => 'addProcessingPost', 'uses' => 'ProcessingFrameController@store']);
        Route::post('updateProcessingPost', ['as' => 'updateProcessingPost', 'uses' => 'ProcessingFrameController@update']);
        Route::post('deleteProcessingPost', ['as' => 'deleteProcessingPost', 'uses' => 'ProcessingFrameController@destroy']);

});






