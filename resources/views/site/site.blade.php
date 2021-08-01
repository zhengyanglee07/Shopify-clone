<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shopify') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

    </style>
</head>

<body class="antialiased">
    <div id="app" class="h-100">
        @auth
            <site-app store-name={{ $storeName }} login='true' roles={{ session('roles') }}
                user-id={{ auth()->user()->id }}>
            </site-app>
        @endauth
        @guest
            <site-app store-name={{ $storeName }} login='false' roles={{ session('roles') }}>
            </site-app>
        @endguest
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
