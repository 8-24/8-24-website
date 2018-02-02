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
    <link rel="icon" type="image/png" href="img/fav-04.png" width="30px" height="30px"/>
    <title>aye communication</title>
    <link href="{{ asset('css/skel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.0.0-9/collection/icon/svg/ios-checkmark.js"></script>
    <script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="e46f57ab-96ed-4432-a541-d1044f314c38";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>
</body>
</html>
