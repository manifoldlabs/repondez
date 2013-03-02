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
      @yield('content')
    </div>
    

    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>