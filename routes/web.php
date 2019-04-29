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

//////////////////////////////////////////
// ----------[ main segemnt ]----------//
////////////////////////////////////////

Route::get('/', 'Products@index')->name('products.index');

Route::get('/products', 'Products@productsList')->name('products.products');

Route::get('/products/{id}','Products@showProduct')->where('id','[0-9]+')->name('products.showproduct');

Route::get('/about','Products@about')->name('about');

Route::get('/blog', 'Products@blog')->name('shop.blog');

// ---------[ feedback ]--------------

Route::get('/feedback','Products@showFeedbackAddForm')->name('feedback.addform');
Route::post('/feedback', 'Products@addFeedback')->name('feedback.add');

// ---------[ about us ]--------------

Route::get('/about','Products@about')->name('about');


// ---------[ reg/auth ]--------------

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/logout','Auth\LoginController@logout');

// -------[ shopping cart ]---------

Route::get('/cart', 'ShoppingCart@show')->name('cart.show');

Route::post('/cart/add', 'ShoppingCart@add')->name('cart.add');
Route::post('/cart/del', 'ShoppingCart@delete')->name('cart.delete');
Route::post('/cart/proceed', 'ShoppingCart@proceed')->name('cart.proceed');
Route::post('/cart/clear', 'ShoppingCart@clear')->name('cart.clear'); 

//-----------------------------------------------------------------




//////////////////////////////////////////
// ----------[ admin panel ]-----------//
////////////////////////////////////////

//----------[ products ]-------------

//Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::get('/admin/products','AdminPanel@productsConfig')->name('products.config');

Route::get('/admin/add_products','AdminPanel@showProductsAddForm')->name('products.addform');
Route::post('/admin/add_products', 'AdminPanel@addProducts')->name('products.add');

Route::get('/admin/del_products','AdminPanel@showProductsDeletePage')->name('products.deleteform');
Route::post('/admin/del_products', 'AdminPanel@deleteProducts')->name('products.delete');

//----------[ orders ]-------------

Route::get('/admin/orders','AdminPanel@ordersConfig')->name('orders.config');

Route::get('/admin/del_orders','AdminPanel@showOrdersDeletePage')->name('orders.deleteform');
Route::post('/admin/del_orders', 'AdminPanel@deleteOrders')->name('orders.delete');

//----------[ feedback ]-------------

Route::get('/admin/feedback','AdminPanel@feedbackConfig')->name('feedback.config');

Route::get('/admin/del_feedback','AdminPanel@showFeedbackDeletePage')->name('feedback.deleteform');
Route::post('/admin/del_feedback', 'AdminPanel@deleteFeedback')->name('feedback.delete');