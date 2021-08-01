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
    <div id="adminApp" class="h-100" style="background-color: #EDEEEF">
        @auth
            <admin-app store-name={{ $storeName }} roles={{ session('roles') }} user-id={{ auth()->user()->id }}>
            </admin-app>
        @endauth
        @guest
            <admin-app store-name={{ $storeName }} roles={{ session('roles') }}></admin-app>
        @endguest
    </div>

    <script src="{{ mix('js/admin.js') }}"></script>
</body>

</html>
