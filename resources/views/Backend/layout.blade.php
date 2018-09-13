<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name'), 'System'}}</title>

    <!-- TinyMCE -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('/css/EntryCSS.css') }}" rel="stylesheet"> 
</head>
<body>
@yield('content')
</body>
</html>