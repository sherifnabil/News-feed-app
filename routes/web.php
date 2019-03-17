<?php

// // Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// // Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');



Route::get('/', function () {
    return view('welcome')->withSubscriptions(\App\Subscription::all());
});    

Route::get('/app', function(){
    return view('');
});    

Auth::routes(['verify' => true]);

//home route
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group([ 'middleware' => 'verified' ,'namespace' =>  'Site'], function(){
    

    //category routes
    Route::get('category/{category}','CategoryController@show')->name('category.show');


    //post routes
    Route::get('add/post', 'UserPost@create')->name('add.post');
    Route::get('post/{post}', 'UserPost@show')->name('post.show');
    Route::get('post/edit/{post}', 'UserPost@edit')->name('post.edit');
    //tag routes
    Route::get('tag/{tag}','TagController@show')->name( 'tag.show');

    //user routes
    Route::get('user/profile/{id}', 'UserController@profile')->name('user.profile');

});    

