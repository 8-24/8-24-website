<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- SEO -->
    @yield('seo_description')
    @yield('seo_author')
    @yield('seo_keywords')
    @yield('social')
    <!-- Networks -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="img/fav.png" width="27px" height="10px"/>
    <title>8-24 agence</title>

    <!-- Styles -->
    <link href="{{ asset('css/skel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!--<canvas id="cnv" class="cnv-zero-layer"></canvas>-->
        <!--<div style="position: absolute; z-index: 1;width: 100%">-->
                @yield('content')
        <!--</div>-->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.16/p5.js"></script>
    <!--<script src="{{ asset('js/motion.js') }}"></script>-->
</body>
</html>
