<li class='container'>
	<div class='item-wrap row'>
		<div class='span2 name'>{{ $event->name }}</div>
		<div class='span3'>{{ DateFmt::Format(Config::get('application.date_formats.full_date'), strtotime($event->date)) }}</div>
		<div class='span2'>{{ $event->access_code }}</div>
		<div class='span2'>{{ HTML::phone_number($event->access_number) }}</div>

		<div class='clearfix'>&nbsp;</div>
	</div>
</li>