<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
    @include('guest.partials.navigation')

    @yield('content')

    <div class="footer-bottom">
        <p>Copyright © 2022 PT Eterna Karya Sejahtera</p>
    </div>
</body>
</html>
