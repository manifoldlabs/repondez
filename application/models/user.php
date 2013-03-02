<?php

class User extends Eloquent  {

  // relationships
  public function events() {
    return $this->has_many('Revent','user_id');
  }
}