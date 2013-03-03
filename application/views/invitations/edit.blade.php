@layout('layouts.default')

@section('content')
	<h2>{{ $invitation->name }}</h2>

	<div class='row'>
		<div class='span4'>
			@include('invitations.partials.form')
			<form method='post' action='{{ action('invitations@delete',array($invitation->id)) }}'>
				<legend>Delete invitation</legend>
				<p>Check the box below and click "Delete!" to remove this invite. This can't be undone!</p>
				<div class="control-group">
			    <div class="controls">
			      <label class="checkbox">
			        <input type="checkbox" name='confirmation' value='yes'> Yes, delete this invitation <button type="submit" class="btn btn-danger btn-mini">Delete!</button>
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