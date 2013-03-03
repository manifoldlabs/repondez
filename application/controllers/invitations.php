<?php

class Invitations_Controller extends Base_Controller  {
	public $restful = 'yes';

	public function get_event($id) {
		// show invitations for event

		// get event
		$event = Revent::find($id);
		if (is_null($event) || !$event->is_mine()) {
			return Redirect::to('events')->with('error','Invalid event!');
		}
		$event->count_guests();

		// get invitations
		$invitations = $event->invitations()->order_by('name','asc')->get();

		$view = View::make('invitations.index');
		$view->event = $event;
		$view->invitations = $invitations;

		return $view;
	}


}