<!doctype html>
<html lang="en">
  <head>
    <title>Répondez @if (isset($title))  {{": ".$title}} @endif </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Styles -->
    <link href="/css/application.css" rel="stylesheet">

  </head>
  <body>
    @include('partials.header')

    <div class='container' id='main'>
      @include('partials.success')
      @include('partials.errors')
      @yield('content')
    </div>
    
    <script src='http://code.jquery.com/jquery-1.8.3.min.js'></script>
    <script type='text/javascript'>
      if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='/js/jquery-1.8.3.min.js' type='text/javascript'%3E%3C/script%3E"));
      }
    </script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>