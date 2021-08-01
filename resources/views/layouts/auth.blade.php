<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background: url("/images/background-images/login-bg.png") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .page-content {
            margin-top: 6em;
            margin-left: 11em;
            max-width: 32em;
            border-radius: 8px;
        }

        .custom-card {
            padding-top: 4rem;
            padding-right: 2rem;
            padding-bottom: 2rem;
            padding-left: 2rem;
        }

        .register-form input{
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .register-form label{
            padding-top: 10px;
            padding-bottom: 3px;
        }
    </style>
</head>

<body>
    <div class="page-main">
        <div class="page-content">
            <div class="card custom-card">
                <div class="pb-5">
                    <img src="https://shopify-assets.shopifycdn.com/accounts/production/oauth_provider/brand/logo/Shopify/logo.svg?v=1602255212"
                        alt="Shopify Logo" style="width: 7rem;">
                </div>

                <div>
                    @yield('content')
                </div>
`
                <div class="container mt-5">
                    <div class="float-end">
                        <a href="#" class="pe-3">Help</a>
                        <a href="#" class="pe-3">Privacy</a>
                        <a href="#">Terms</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>