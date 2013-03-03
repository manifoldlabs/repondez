<?php

class Invitation extends Rbase  {

	// validation rules
	protected static $rules = array(
    'name' => 'required',
    'event_id' => 'required'
  );

	// relationships
	public function event() {
		return $this->belongs_to('Revent','event_id');
	}

	// delete
	public function delete() {
		// we need to remove Twilio #s and references here!

		// do the actual delet eof this model
		parent::delete();
	}

}