<?php

class Events_Controller extends Base_Controller  {

	public function action_index() {
		return View::make('events.index');
	}
}