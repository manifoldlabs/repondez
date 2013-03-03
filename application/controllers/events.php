<?php

class Events_Controller extends Base_Controller  {
	public $restful = true;

	public function get_index() { // show events for logged in user
		$view = View::make('events.index');
		$events = Revent::mine()->get();

		// count guests!
		foreach($events as $event) { $event->count_guests(); }

		$view->events=$events;

		return $view;
	}

	// CRUD!

	public function get_add() {
		Input::clear();
		return View::make('events.add');
	}

		public function post_add() {
			$event_details = Input::all();

			if (Revent::is_valid($event_details)) {
				$event = new Revent();
				$event->name=$event_details['name'];
				$event->date=$event_details['date'];
				$event->user_id=Auth::user()->id;
				$event->save();

				return Redirect::to_action('invitations@event',array($event->id))->with('success_message','Event created!');
			} else {
				Input::flash();
				return Redirect::to_action('events@add')->with_errors(Revent::$validation)->with_input();
			}
		}

	public function get_edit($id) {
		// show edit form for an event

		// get event
		$event = Revent::find($id);
		if (is_null($event) || !$event->is_mine()) {
			return Redirect::to('events')->with('error','Invalid event!');
		}

		Input::replace(array(
			'name'=>$event->name,
			'date'=>$event->date
		));	
		Input::flash();

		// view
		$view = View::make('events.edit');
		$view->event = $event;
		return $view;
	}

		public function post_edit($id) {
			// save changes to event

			// get event
			$event = Revent::find($id);
			if (is_null($event) || !$event->is_mine()) {
				return Redirect::to('events')->with('error','Invalid event!');
			}

			// modify object
			$event_details = Input::all();
			$event->name = $event_details['name'];
			$event->date = $event_details['date'];

			if (Revent::is_valid($event_details)) { // validate with static Revent method
				$event->save();
				return Redirect::to_action('events@index')->with('success','Event updated');
			} else {
				Input::flash();
				return Redirect::to_action('events@edit',array($id))->with_errors(Revent::$validation)->with_input();
			}
		}

	public function post_delete($id) {
		$event = Revent::find($id);
		if (is_null($event) || !$event->is_mine()) {
			return Redirect::to('events')->with('error','Invalid event!');
		}

		$form_details = Input::all();
		if (@$form_details['confirmation']=='yes') {
			$event->delete();
			return Redirect::to_action('events@index')->with('success_message','Event deleted');
		} else {
			return Redirect::to_action('events@edit',array($id))->with('error','Be sure to check the checkbox, then click Delete to delete this event');
		}
	}

}