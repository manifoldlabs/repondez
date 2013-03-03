<li class='container'>
	<div class='item-wrap row'>
		<div class='span12'>
			<h3>{{ $event->name }}</h3>
		</div>
		<div class='span3'>
				<strong>{{ DateFmt::Format(Config::get('application.date_formats.full_date'), strtotime($event->date)) }}</strong><br/>
				<i class='icon-phone'></i>&nbsp;<span rel='tooltip' data-placement='right' title='Phone number'>{{ HTML::phone_number($event->access_number) }}</span><br/>
				<i class='icon-lock'></i>&nbsp;<span rel='tooltip' data-placement='right' title='Access code'>{{ $event->access_code }}</span>
		</div>

		<div class='span4 response'>
			<a class='btn btn-large' rel='tooltip' title='Responses: yes / no / not replied' href='/events/invitations/{{ $event->id }}'><span class='green'>{{ (int)$event->count_yes }}</span> / <span class='red'>{{ (int)$event->count_no }}</span> / {{ (int)$event->count_noreply }}</a>
			<small><i class='icon-user'></i> Total Confirmed Guests:&nbsp;<strong>{{ (int)$event->count_totalguests }}</strong></small> 
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