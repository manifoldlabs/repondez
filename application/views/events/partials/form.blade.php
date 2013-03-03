<form class="" id='eventSettingsForm' method='post'>
	<legend>Event Info</legend>

  <div class="control-group">
    <label class="control-label" for="inputName">Name</label>
    <div class="controls">
      <input type="text" id="inputName" value='{{ Input::old('name') }}' name='name' placeholder="e.g. My Wedding">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="inputDate">Date</label>
    <div class="controls">
      <input type="text" id="inputDate" name='date' value='{{ Input::old('date') }}' placeholder="">
    </div>
  </div>

  <div class='control-group'>
    <button class='btn btn-primary' type='submit'>Save</button>
  </div>

</form>