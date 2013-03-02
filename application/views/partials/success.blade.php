<?php 
$success_message = Session::get('success_message');
?>
<div class="row">
  <div class="nine columns">
    @if(!empty($success_message))
    <div class="alert-box success">
            {{ $success_message }}
      <a href="" class="close">&times;</a>
    </div>
    @endif
  </div>
</div>