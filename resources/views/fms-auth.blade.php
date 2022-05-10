<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gateway | Login</title>
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('falcon/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('falcon/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('falcon/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('falcon/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('falcon/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('falcon/assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('falcon/assets/js/config.js') }}"></script>
    <script src="{{ asset('falcon/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('falcon/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('falcon/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('falcon/assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('falcon/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <style>
        .error {
            font-size: 10px; color: tomato;
        }
    </style>
    @livewireStyles
</head>

<body>
    <main class="main" id="top">@yield('content')</main>
    <script src="{{ asset('falcon/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('falcon/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('falcon/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('falcon/assets/js/theme.js') }}"></script>
    @livewireScripts
</body>

</html>
