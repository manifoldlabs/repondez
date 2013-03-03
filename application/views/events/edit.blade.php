@layout('layouts.default')

@section('content')
	<h2>{{ $event->name }}</h2>

	<div class='row'>
		<div class='span4'>
			@include('events.partials.form')
			<form method='post' action='{{ action('events@delete',array($event->id)) }}'>
				<legend>Delete event</legend>
				<p>Check the box below and click "Delete!" to remove this event. This can't be undone!</p>
				<div class="control-group">
			    <div class="controls">
			      <label class="checkbox">
			        <input type="checkbox" name='confirmation' value='yes'> Yes, delete this event <button type="submit" class="btn btn-danger btn-mini">Delete!</button>
			      </label>
			    </div>
			  </div>
			</form>
		</div>
		<div class='span8'>
			<form>
				<legend>Access</legend>
				<p>Phone number/access code info, when that's ready</p>
			</form>
		</div>
	</div>
	
@endsection