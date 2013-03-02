<?php

class Users_Controller extends Base_Controller  {
	public $restful = true;

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