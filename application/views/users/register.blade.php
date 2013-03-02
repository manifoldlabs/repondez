@layout('layouts.default')

@section('content')

	

	<div class='row'>
		<form class='span4 offset4' method='post'>

			<legend>Sign up <small><a href='/login'>or log in</a></small></legend>
			@include('partials.errors')
			<div class='input'>
				<label>Email address</label>
				<input class='span4' type='text' name='email' placeholder='email address' value="{{ Input::old('email') }}" />
			</div>
			<div class='input'>
				<label>Choose a password <small>6 character minimum</small></label>
				<input class='span4' type='password' name='password' placeholder='password' />
			</div>
			<div class='input'>
				<input type='submit' class='btn btn-large' value='Sign up!'>
			</div>
		</form>
	</div>

@endsection