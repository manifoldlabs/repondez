@layout('layouts.default')

@section('content')
	<h2>New event</h2>

	<div class='row'>
		<div class='span4'>
			@include('events.partials.form')
		</div>
	</div>
	
@endsection