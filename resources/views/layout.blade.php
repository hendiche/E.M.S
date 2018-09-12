<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

  </head>
  <body>
    <div class="container-fluid p-3 mw-100 mh-100">
        <div class="row align-items-end mh-100">
          <div class="col-10">
            @yield('contents')
          </div>
          <div class="col-2">
            @yield('menu')
          </div>
        </div>
    </div>
  </body>
</html>
