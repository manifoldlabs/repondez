<?php

class Invitations_Controller extends Base_Controller  {
	public $restful = 'yes';

	public function get_event($id) {
		// show invitations for event $id

		// get event
		$event = Revent::find($id);
		if (is_null($event) || !$event->is_mine()) {
			return Redirect::to('events')->with('error','Invalid event!');
		}
		$event->count_guests();

		// save event to session for invitations/add form
		Session::put('current_eventid',$id);

		// get invitations
		$invitations = $event->invitations()->order_by('name','asc')->get();

		$view = View::make('invitations.index');
		$view->event = $event;
		$view->invitations = $invitations;
		return $view;
	}

	//// CRUD

	public function get_add() {
		// show add invitation form
		if (Session::get('current_eventid') && !Input::has('event_id')) {
			// set event select to the event we're working on
			Input::merge(array(
				'event_id'=>Session::get('current_eventid')
			));
			Input::flash();
		}

		$view = View::make('invitations.add');

		// get possible events
		$view->events = Revent::mine()->get();
		return $view;
	}

		public function post_add() {
			// add new invitation
			$invite_details = Input::all();

			if (Invitation::is_valid($invite_details)) {
				$invite = new Invitation();
				$invite->name=$invite_details['name'];
				$invite->event_id=$invite_details['event_id'];

				// ensure the event exists and is ours
				$event = $invite->event()->first();
				if (is_null($event) || !$event->is_mine()) {
					return Redirect::to_action('invitations@event',array(Session::get('current_eventid')))->with('error','Invalid event!');
				}

				// set more details
				$invite->count_expected=$invite_details['count_expected'];
				$invite->user_id=Auth::user()->id;
				$invite->save();

				return Redirect::to_action('invitations@event',array($invite->event_id))->with('success_message','Invitation created!');
			} else {
				Input::flash();
				return Redirect::to_action('invitations@add')->with_errors(Invitation::$validation)->with_input();
			}
		}

	public function get_edit($id) {
		// show edit form for an invitation

		// get invitation
		$invite = Invitation::find($id);
		if (is_null($invite) || !$invite->is_mine()) {
			return Redirect::to_action('invitations@event',array(Session::get('current_eventid')))->with('error','Invalid event!');
		}

		// only need to return the event we are using
		$event = $invite->event()->first();

		// populate form
		Input::replace(array(
			'name'=>$invite->name,
			'event_id'=>$invite->event_id,
			'count_expected'=>$invite->count_expected
		));	
		Input::flash();

		// view
		$view = View::make('invitations.edit');
		$view->invitation = $invite;
		$view->events = array($event); // view expects an array for <option>s
		return $view;
	}

		public function post_edit($id) {
			// save edits to invite

			$invite = Invitation::find($id);
			if (is_null($invite) || !$invite->is_mine()) {
				return Redirect::to_action('invitations@event',array(Session::get('current_eventid')))->with('error','Invalid event!');
			}

			// modify object
			$invite_details = Input::all();

			$invite->event_id = $invite_details['event_id'];

				// ensure the event exists and is ours
				$event = $invite->event()->first();
				if (is_null($event) || !$event->is_mine()) {
					return Redirect::to_action('invitations@event',array(Session::get('current_eventid')))->with('error','Invalid event!');
				}

			$invite->name = $invite_details['name'];
			$invite->count_expected = $invite_details['count_expected'];

			if (Invitation::is_valid($invite_details)) { // validate with static Revent method
				$invite->save();
				return Redirect::to_action('invitations@event',array(Session::get('current_eventid')))->with('success_message','Invite updated!');
			} else {
				Input::flash();
				return Redirect::to_action('invitations@edit',array($id))->with_errors(Invitation::$validation)->with_input();
			}
		}

	public function post_delete($id) {
		$invite = Invitation::find($id);
		if (is_null($invite) || !$invite->is_mine()) {
			return Redirect::to_action('invitations@event',array(Session::get('current_eventid')))->with('error','Invalid event!');
		}

		$form_details = Input::all();
		if (@$form_details['confirmation']=='yes') {
			$invite->delete();
			return Redirect::to_action('invitations@event',array(Session::get('current_eventid')))->with('success_message','Invitation deleted');
		} else {
			return Redirect::to_action('invitations@edit',array($id))->with('error','Be sure to check the checkbox, then click Delete to delete this invitation');
		}
	}

}