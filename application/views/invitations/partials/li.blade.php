<li class='container'>
	<div class='item-wrap row'>
		<div class='span2 name'>
			{{ $invitation->name }}
		</div>
		<div class='span1'>
			<div class="btn-group">
			  <a class="btn dropdown-toggle btn-small" data-toggle="dropdown" href="#">
		    	@if($invitation->rsvp)
						<span class='rsvp rsvp-{{ $invitation->rsvp }}'>
							<i class='icon-circle'></i> {{ ucfirst($invitation->rsvp) }}
						</span>
					@else
						<span class='rsvp rsvp-noreply'><i class='icon-circle-blank'></i> ???</span>
					@endif
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
		<div class='span1'>
			@if($invitation->rsvp)
				<i class='icon-group gray'></i> <strong>{{ $invitation->count }}</strong>&nbsp;/&nbsp;{{ $invitation->count_expected }}
			@endif
		</div>
		<div class='span2'>
			@if($invitation->access_number)
				<i class='icon-phone gray'></i>&nbsp;<span rel='tooltip' data-placement='right' title='RSVP phone number'>{{ HTML::phone_number($invitation->access_number) }}</span><br/>
			@else
				<i class='icon-lock gray'></i>&nbsp;<span rel='tooltip' data-placement='right' title='RSVP access code'>{{ $invitation->access_code }}</span>
			@endif
		</div>
		<div class='span3'>
			<a href='{{ action('invitations@edit',array($invitation->id)) }}' class='btn btn-small'><i class='icon-pencil'></i> Edit</a>
				


		</div>
	</div>
</li>