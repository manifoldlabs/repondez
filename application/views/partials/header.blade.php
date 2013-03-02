<div class="navbar navbar-fixed-top">
  <div class="navbar-inner"><div class='container'>
    <a class="brand" href="/">Répondez</a>
        @if (Auth::check())
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </a>

          <div class='nav-collapse collapse'>
            <ul class='nav user-nav'>
                <li class='hidden-phone'><a>Logged in as {{ Auth::user()->email }}</a></li>
                <li><a href="/events">My events</a></li>
                <li><a class='' href='/logout'>Log out</a></li>
            <ul>  
          </div>
        @else
          <ul class='nav user-nav'>
            <li><a href='/login'>Log in</a></li>
          </ul>
          
        @endif
  
  </div></div>
</div>