<?php
class Rbase extends Eloquent  {
	// some common features for models across Repondez

	protected static $rules=array();
	public static $validation;
  protected $twilio;


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

  //// Twilio!

  //// Init
  // just call $this->twilio_init() before using $twilio as Twilio object
  public function twilio_init() {
    Log::twilio('twilio_init() from model '.get_class($this).' with account_sid '.Config::get('application.twilio.account_sid'));
    Bundle::start('twilio');
    $this->twilio = new Services_Twilio(Config::get('application.twilio.account_sid'),Config::get('application.twilio.account_token'));
  }

}