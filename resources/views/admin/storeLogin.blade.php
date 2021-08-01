<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laravel</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background: url("/images/background-images/login-bg.png") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>
</head>

<body class="antialiased">
    <div id="adminApp" class="h-100">
        <create-store user-id={{ auth()->user()->id }}></create-store>
    </div>

    <script src="{{ mix('js/admin.js') }}"></script>
</body>

</html>
