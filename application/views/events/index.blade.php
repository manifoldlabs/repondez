@layout('layouts.default')

@section('content')

@include('partials.errors')

	<h2>My events</h2>

		<ul id='userEvents' class='list-table'>
			<li class='container header hidden-phone'>
				<div class='item-wrap row'>
					<div class='span2'>Name</div>
					<div class='span3'>Date</div>
				</div>
			</li>
			@foreach ($events as $event)
				@include('events.partials.li')
			@endforeach
		</ul>

@endsection