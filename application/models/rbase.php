<?php
class Rbase extends Eloquent  {
	// some common features for models across Repondez

	protected static $rules=array();
	public static $validation;


  //// validation
  public static function is_valid($input=null) {
    if (is_null($input)) {
      $input = Input::all();
    }

    static::$validation = Validator::make($input, static::$rules);
    return static::$validation->passes();
  }

}