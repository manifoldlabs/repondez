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

  //// auth
  public function is_mine() {
    // does the object belong to the logged in user
    if (!$this->id || !Auth::check()) return false;

    $is_mine = ($this->user_id == Auth::user()->id);

    if (!$is_mine) 
      Log::auth('Attempt by user (User->id='.Auth::user()->id.') to access '.get_class($this).' ('.get_class($this).'->id='.$this->id.') of another user');

    return $is_mine;
  }

}