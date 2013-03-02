<?php


Route::controller(Controller::detect());

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

Route::filter('before', function() {

	// check for auth against whitelist
	$location = URI::segment(1) . '/' . URI::segment(2);
	if (Auth::guest() && !in_array( $location, Config::get('application.safe')))
		return Redirect::to('login');
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});


// Log in routes here rather than users controller
Route::get('/login', function() { // view login page
	return View::make('users.login');
});

Route::post('/login', function() { // login attempted
	$user_details = Input::all();
	$rules = array('username' => 'required|email', 'password' => 'required');

	// validate
	$validation = Validator::make($user_details, $rules);
	if($validation->fails()){
		return Redirect::to('login')->with_errors($validation)->with_input();
	}

	// attempt login
	if(Auth::attempt($user_details)) {
		return Redirect::to('events')->with('success','You are now logged in!');
	} else {
		return Redirect::to('login')->with('error','Username or password not correct');
	}
});

Route::get('/logout', function() { // logout
	Auth::logout();
	return Redirect::to('/');
});