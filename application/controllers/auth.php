<?php

class Auth_Controller extends Base_Controller  {

	public $restful = true;

	// login / logout
	public function get_login() {
		return View::make('users.login');
	}

	public function post_login() {
		$user_details = Input::all();
		$rules = array('username' => 'required|email', 'password' => 'required');

		// validate
		$validation = Validator::make($user_details, $rules);
		if($validation->fails()){
			return Redirect::to('login')->with_errors($validation)->with_input();
		}

		// attempt login
		if(Auth::attempt($user_details)) {
			if (Session::get('login_redirect')) {
				$redirect = Session::get('login_redirect');
				Session::forget('login_redirect');
			}	
			else 
				$redirect = 'events';

			return Redirect::to($redirect)->with('success_message','You are now logged in!');
		} else {
			return Redirect::to('login')->with('error','Username or password not correct');
		}
	}

	public function get_logout() {
		Auth::logout();
		return Redirect::to('/');
	}

	// register
	public function get_register() {
		return View::make('users.register');
	}

	public function post_register() {
		// sign up a user
		$user_details = Input::all();
		$rules = array('email' => 'required|email|unique:users', 'password' => 'required|min:6');

		// validate
		$validation = Validator::make($user_details, $rules);
		if($validation->fails()){
			return Redirect::to('users/register')->with_errors($validation)->with_input();
		}

		// create new user
		$user = new User;
		$user->email = $user_details['email'];
		$user->password = Hash::make($user_details['password']);
		$user->save();

		// login the new user
		Auth::login($user->id);

		return Redirect::to('events');
	}

}