<?php


Route::prefix('admin-dashboard')->name('dashboard.')->group(function () {
    config(['auth.defaults.guard' => 'admin']); // or use Config::set('auth.defines', 'admin')

    //login
    Route::get('/login', 'AdminController@login')->name('admin.login');
    Route::post('/login', 'AdminController@post_login')->name('admin.post_login');

    // forgoten passwords
    Route::get('/forgot/password', 'AdminController@password_forgot')->name('forgot_pass');
    Route::post('/forgot/password', 'AdminController@post_password_forgot')->name('post_forgot_pass');

    //reset passwords for admins

    //authenticated admins routes
    Route::middleware('admin:admin')->group(function () {
        //admin routes
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('/logout', 'AdminController@logout')->name('admin.logout');
        Route::resource('admin', 'AdminController')->except(['show']);

        //user routes
        Route::get('user/trashed', 'UserController@trashed')->name('user.trashed');
        Route::resource('user','UserController');
        Route::get('user/restore/{id}','UserController@restore')->name( 'user.restore');
        Route::get('user/perm-delete/{id}','UserController@forcedelete')->name('user.forcedelete');
        Route::get('user/pending','UserController@pending')->name( 'user.pending');
  
        //category routes
        Route::resource('category', 'CategoryController');

        //country routes
        Route::resource('country','CountryController');
        
        //city routes
        Route::resource('city', 'CityController')->except(['show']);

        //tag routes
        Route::resource('tag','TagController');

        //subscription routes
        Route::resource('subscription','SubscriptionController');

        //posts routes
        Route::resource('post', 'PostController');
        Route::get('trashed-posts', 'PostController@trashed')->name('post.trashed');
        Route::get('pending-posts','PostController@pending')->name('post.pending');
        Route::get('active-posts/{id}', 'PostController@activate')->name('post.activate');
        Route::get('refuse-posts/{id}', 'PostController@refuse')->name('post.refuse');
        Route::get('refused-posts', 'PostController@refused_posts')->name('post.refused');
        Route::get('post/restore/{id}','PostController@restore')->name('post.restore');
        Route::get('post/perm-delete/{id}','PostController@forcedelete')->name('post.forcedelete');
    });
});
