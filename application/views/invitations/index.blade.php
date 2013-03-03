@layout('layouts.default')

@section('content')
	<h2>Invitations <small>{{ $event->name }}</small><a href='{{ action('invitations@add') }}' class='btn btn-primary float-right hidden-phone'><i class='icon-plus'></i> Add Invitation</a> </h2>

	@if ($invitations)
		<div class='row'>
			<div class='well span5' id='invitationStatus'>
				<div>
					<div class='green status'><span class='num'>{{ (int)$event->count_yes }}</span><small class='green'>yes</small></div>
					<div class='red status'><span class='num'>{{ (int)$event->count_no }}</span><small class='red'>no</small></div>
					<div class='gray status'><span class='num'>{{ (int)$event->count_noreply }}</span><small>no reply</small></div>
				</div>

				<h4 class='gray'><i class='icon-group'> {{ (int)$event->count_totalguests }} total confirmed guests</i></h4>
			</div>

			</div>
		</div>

		<ul id='eventInvitations' class='list-table'>
			@foreach ($invitations as $invitation)
				@include('invitations.partials.li')
			@endforeach
		</ul>
	@else
		<div class='alert alert-info'>
			No invitations! Add some with the "Add Invitation" button
		</div>
	@endif

@endsection