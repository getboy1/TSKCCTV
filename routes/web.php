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
//Frontend site ............................
Route::get('/','HomeController@index');

//show category wise product Here
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_menufacture/{menufacture_id}','HomeController@show_product_by_menufacture');
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');










//Backend site ............................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category related routes
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');

//Menufacture or brands routes are here
Route::get('/add-menufacture','MenufactureController@index');
Route::post('/save-menufacture','MenufactureController@save_menufacture');
Route::get('/all-menufacture','MenufactureController@all_menufacture');
Route::get('/delete-menufacture/{menufacture_id}','MenufactureController@delete_menufacture');
Route::get('/unactive_menufacture/{menufacture_id}','MenufactureController@unactive_menufacture');
Route::get('/active_menufacture/{menufacture_id}','MenufactureController@active_menufacture');
Route::get('/edit-menufacture/{menufacture_id}','MenufactureController@edit_menufacture');
Route::post('/update-menufacture/{menufacture_id}','MenufactureController@update_menufacture');

//Products routs are here
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

//Slider routs are Here
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');
