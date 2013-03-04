@layout('layouts.default')

@section('content')
	<h2>{{ $invitation->name }}</h2>

	<div class='row'>
	<div class='well span6' id='invitationDetailStatus'>
			<small class='span6' style='margin-left:0;'><strong>RSVP STATUS</strong></small>
				<h3 class='rsvp rsvp-{{ $invitation->rsvp }} span3'>
				@if($invitation->rsvp)

						<i class='icon-circle'></i> {{ ucfirst($invitation->rsvp) }}
						@if($invitation->rsvp=='yes')
							<br/><span class='gray' style=''><i class='icon-group gray'></i>&nbsp;<strong class=''>{{ $invitation->count }}</strong>&nbsp;/&nbsp;{{ $invitation->count_expected }}</span>
						@endif
				@else
					<i class='icon-circle-blank'></i> No-reply</h2>
				@endif
				
			</h3><br/>
			<div class="btn-group">
			  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			    Update RSVP
			    <span class="caret"></span>
			  </a>
			  <ul class="dropdown-menu">
			   	<li><a href='{{ action('invitations@rsvp',array($invitation->id, 'yes')) }}'><span class='green'>Yes</span></a></li>
			   	<li><a href='{{ action('invitations@rsvp',array($invitation->id, 'no')) }}'><span class='red'>No</span></a></li>
			  	<li class='divider'></li>
			   	<li><a href='{{ action('invitations@rsvp',array($invitation->id, 'noreply')) }}'><span class='gray'>No reply</span></a></li>

			  </ul>
			</div>
	</div>
	</div>


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