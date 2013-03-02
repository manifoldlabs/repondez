<!doctype html>
<html lang="en">
  <head>
    <title>Répondez @if (isset($title))  {{": ".$title}} @endif
    </title>

    <!-- Styles -->
    <link href="/css/application.css" rel="stylesheet">
  </head>
  <body>
    @include('partials.header')

    <div class='container' id='main'>
      @include('partials.success')
      @yield('content')
    </div>
    

    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>