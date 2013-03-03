<?php
class Revent extends Rbase  {
  // called Revent (Repondez Event) to avoid conflicting with Laravel Events clas

	public static $table = 'events';

  // store guest counts
  public $count_yes=null;
  public $count_no=null;
  public $count_noreply=null;
  public $count_totalguests=null;

  protected static $rules = array(
    'name' => 'required',
    'date' => 'required'
  );

  // relationships
  public function user() {
    return $this->belongs_to('User','user_id');
  }

  public function invitations() {
    return $this->has_many('Invitation','event_id');
  }

  //// populate counts
  public function count_guests() {
    if (!$this->is_mine()) return false;

    $this->count_yes = $this->invitations()->where('rsvp','=','yes')->count();
    $this->count_no = $this->invitations()->where('rsvp','=','no')->count();
    $this->count_noreply = $this->invitations()->where('rsvp','=','')->count();
    $this->count_totalguests = $this->invitations()->where('rsvp','=','yes')->sum('count');

    return $this;
  }

  //// booleans
  public function is_mine() {
    // does the event belong to the logged in user
    if (!$this->id || !Auth::check()) return false;

    $is_mine = ($this->user_id == Auth::user()->id);

    if (!$is_mine) 
      Log::auth('Attempt by user (User->id='.Auth::user()->id.') to access event (Event->id='.$this->id.') of another user');

    return $is_mine;
  }

  ///// queries
  public static function mine() { 
  	// get logged in user's events
  	return static::where('user_id','=',Auth::user()->id);
  }
}