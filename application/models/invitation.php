<?php

class Invitation extends Eloquent  {

	// relationships
	public function event() {
		return $this->belongs_to('Event');
	}

}