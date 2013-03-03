@layout('layouts.default')

@section('content')
	<h2>My events <a class='btn btn-primary float-right hidden-phone' href='{{ URL::to_action('events@add')}}'><i class='icon-plus'></i> Add Event</a> </h2>

		<ul id='userEvents' class='list-table'>
			@foreach ($events as $event)
				@include('events.partials.li')
			@endforeach
		</ul>

@endsection