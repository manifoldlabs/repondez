<div class="nine columns">

  <?php if($errors->messages) { //this is pass through: with_errors($validation) ?>
  <div class="alert-box alert">
  <a href="" class="close">&times;</a>
    <p><strong>Uh oh!</strong></p>
    @foreach($errors->messages as $e)
      <li> {{ $e[0] }} </li>
    @endforeach
    
  </div>
  <?php } ?>

  <?php 
    $error = Session::get('error'); //this is pass through: with('key', 'value') on form redirect
  ?> 
  <?php if(!empty($error)) { ?>
  <div class="alert-box alert">
    <li>{{ $error }}</li>
  </div>
  <?php } ?>
</div>