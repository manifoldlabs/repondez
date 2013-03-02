<?php
class Revent extends Eloquent  {

	// called Revent (Repondez Event) to avoid conflicting with Laravel Events clas


	public static $table = 'events';

  // relationships
  public function user() {
    return $this->belongs_to('User');
  }

  public function invitations() {
    return $this->has_many('Invitation');
  }

  ///// queries

  public static function mine() { 
  	// get logged in user's events
  	return static::where('user_id','=',Auth::user()->id);
  }
}