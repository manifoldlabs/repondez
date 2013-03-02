<?php

class Events_Controller extends Base_Controller  {

	public function action_index() {

		// show events for logged in user
		$view = View::make('events.index');
		$view->events=Revent::mine()->get();

		return $view;
	}
}