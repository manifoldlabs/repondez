<form class="" id='eventSettingsForm' method='post'>
	<legend>Invitation info</legend>

  <div class="control-group">

    <label class='control-label' for='inputEvent'>Event</label>
    <div class='controls'>

      @if(count($events) <= 1)
        <strong>{{ $events[0]->name }} </strong>
        <input type='hidden' name='event_id' id='inputEvent' value='{{ $events[0]->id }}' ><br/><br/>
      @else
        <select id='inputEvent' name='event_id'>
          @if(isset($events))
            @foreach($events as $event)
              <option value='{{ $event->id }}'
              @if($event->id == Input::old('event_id'))
                selected='selected'
              @endif
              >{{ $event->name }}</option>
            @endforeach
          @endif
        </select>
      @endif
    </div>

    <label class="control-label" for="inputName">Family/group name</label>
    <div class="controls">
      <input type="text" id="inputName" value='{{ Input::old('name') }}' name='name' placeholder="e.g. Obama">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="inputCountExpected">Count Expected</label>
    <div class="controls">
      <input type="text" id="inputCountExpected" name='count_expected' value='{{ Input::old('count_expected') }}' placeholder="">
    </div>
  </div>

  <div class='control-group'>
    <button class='btn btn-primary' type='submit'>Save</button>
  </div>

</form>