@layout('layouts.default')

@section('content')

	<div class='row'>
		<form class='span4 offset4' method='post'>
			<legend>Log in <small><a href='/users/register'>or sign up</a></small></legend>
			@include('partials.errors')
			<div class='control-group'>
				<input class='span4' type='email' name='username' placeholder='email address' value="{{ Input::old('email') }}" />
			</div>
			<div class='control-group'>
				<input class='span4' type='password' name='password' placeholder='password' />
			</div>
			<div class='input'>
				<input type='submit' class='btn btn-large' value='Log in'>
			</div>
		</form>
	</div>


@endsection