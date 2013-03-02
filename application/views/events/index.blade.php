@layout('layouts.default')

@section('content')

@include('partials.errors')

	<h2>My events</h2>

		<ul id='userEvents' class='list-table'>
			@foreach ($events as $event)
				@include('events.partials.li')
			@endforeach
		</ul>

@endsection