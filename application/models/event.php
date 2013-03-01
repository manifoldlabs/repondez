<?php

class Event extends Eloquent  {

  // relationships
  public function user() {
    return $this->belongs_to('User');
  }

  public function invitations() {
    return $this->has_many('Invitation');
  }

}