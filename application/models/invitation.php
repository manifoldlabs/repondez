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

	public function access_number() {
		return $this->belongs_to('Number','access_number');
	}

	//// Some business logic

	// set RSVP info
	public function update_rsvp($rsvp) {
		if (!$this->id) return false;
		if (in_array($rsvp, array('yes','no'))) {
			$this->rsvp=$rsvp;
		} else {
			$this->rsvp=null;
		}

		// Maybe send notifications here? (this is why it's in the Model)

		return $this;
	}


  // use the Twilio API to purchase a number in given area code and
  // assign it to this models' access_number field
  public function provision_access_number($areacode=614) {
    if (!$this->id) return false;

    Log::twilio('Attempting to provision Invitation access phone number for area code '.$areacode.' for User->id='.Auth::user()->id.', Invitation->id='.$this->id);

    $number = new Number();
    if($number->provision($areacode)) {
    	$number->invitation_id=$this->id;
    	$number->save();
    	$this->access_number=$number->id;
    	return $this;
    } else  {
    	return false;
    }
  }

	// delete
	public function delete() {
		// we need to remove Twilio #s and references here!

		// do the actual delet eof this model
		parent::delete();
	}

}