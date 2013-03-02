<div class="navbar navbar-fixed-top">
  <div class="navbar-inner"><div class='container'>
    <a class="brand" href="/">Répondez</a>
    <ul class="nav">
      @section('navigation')
        <li><a href="/events">Events</a></li>
      @yield_section
    </ul>
    <ul class='nav user-nav'>
      @if (Auth::check())
        <li class='hidden-phone'><a>Logged in as {{ Auth::user()->email }}</a></li>
        <li><a href='/logout'>Log out</a></li>
      @else
        <li><a href='/login'>Log in</a></li>
      @endif
    <ul>  
  </div></div>
</div>