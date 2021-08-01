<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laravel</title>
    <style>
        html, body{
            height: 100%;
        }
        body {
            background-color: #f4f6f8;
        }

    </style>
</head>

<body class="antialiased">
    <div id="adminApp" class="h-100">
        <account-setup></account-setup>
    </div>

    <script src="{{ mix('js/admin.js') }}"></script>
</body>

</html>
