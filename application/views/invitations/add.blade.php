@layout('layouts.default')

@section('content')
	<h2>Add invitation</h2>

	<div class='row'>
		<div class='span4'>
			@include('invitations.partials.form')
		</div>
	</div>
	
@endsection