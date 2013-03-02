<?php

// landing page
Route::get('/', 'home@index');

// auth
Route::any('login', array('as'=>'login', 'uses'=>'auth@login'));
Route::any('logout', array('as'=>'logout', 'uses'=>'auth@logout'));
Route::any('signup', array('as'=>'register', 'uses'=>'auth@register'));

// secure routes
Route::group(array('before' => 'auth'), function() {

    Route::controller(array(
        'events',
        'users',
        'invitations'
    ));
});

// auth filter
Route::filter('auth', function() {
  if (!Auth::check()) {
    Session::put('login_redirect',URL::current());
    return Redirect::to('login');
  }
});

// boilerplate from Laravel install
Route::filter('csrf', function() {
  if (Request::forged()) return Response::error('500');
});

Event::listen('404', function() {
  return Response::error('404');
});

Event::listen('500', function() {
  return Response::error('500');
});