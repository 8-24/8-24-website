<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('seo_description')
    @yield('seo_author')
    @yield('seo_keywords')
    @yield('social')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="img/fav.png" width="27px" height="10px"/>
    <title>8-24 agence</title>
    <link href="{{ asset('css/skel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.0.0-9/collection/icon/svg/ios-checkmark.js"></script>
</body>
</html>
