<li class='container'>
	<div class='item-wrap row'>
		<div class='span3'>
			<h3>{{ $event->name }}</h3>
			{{ DateFmt::Format(Config::get('application.date_formats.full_date'), strtotime($event->date)) }}<br/>
			<i class='icon-phone'></i>&nbsp;<span rel='tooltip' data-placement='right' title='Phone number'>{{ HTML::phone_number($event->access_number) }}</span><br/>
			<i class='icon-lock'></i>&nbsp;<span rel='tooltip' data-placement='right' title='Access code'>{{ $event->access_code }}</span>

		</div>

		<div class='span4 response'>
			<a class='btn btn-large' rel='tooltip' title='yes / no / no reply' href='/events/invitations/{{ $event->id }}'><span class='green'>0</span> / <span class='red'>0</span> / 0</a>
			<small><i class='icon-user'></i> Total Guests:&nbsp;<strong>0</strong></small> 
		</div>

		<div class='clearfix'>&nbsp;</div>
	</div>

	<div class='row'>
		<div class='span6 tools'>
			<a class='btn hidden-phone hidden-tablet' href='/events/edit/{{ $event->id }}'><i class='icon-pencil'></i> Settings</a>
			<a class='btn hidden-phone hidden-tablet'' href='/events/messages/{{ $event->id }}'><i class='icon-volume-up'></i> Messages</a>
		</div>
	</div>
</li>