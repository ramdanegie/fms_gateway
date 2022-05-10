<!DOCTYPE html>
<html lang="en-US" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gateway | Dashboard</title>
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('falcon/assets/img/favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('falcon/assets/img/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('falcon/assets/img/favicons/favicon-16x16.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('falcon/assets/img/favicons/favicon.ico') }}">
        <link rel="manifest" href="{{ asset('falcon/assets/img/favicons/manifest.json') }}">
        <meta name="msapplication-TileImage" content="{{ asset('falcon/assets/img/favicons/mstile-150x150.png') }}">
        <meta name="theme-color" content="#ffffff">
        <script src="{{ asset('falcon/assets/js/config.js') }}"></script>
        <script src="{{ asset('falcon/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>
        <link href="{{ asset('falcon/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
        <link href="{{ asset('falcon/vendors/glightbox/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('falcon/vendors/plyr/plyr.css') }}" rel="stylesheet">
        <link href="{{ asset('falcon/vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
        <link href="{{ asset('falcon/vendors/leaflet/leaflet.css') }}" rel="stylesheet">
        <link href="{{ asset('falcon/vendors/leaflet.markercluster/MarkerCluster.css') }}" rel="stylesheet">
        <link href="{{ asset('falcon/vendors/leaflet.markercluster/MarkerCluster.Default.css') }}" rel="stylesheet">
        <link href="{{ asset('falcon/vendors/fullcalendar/main.min.css') }}" rel="stylesheet">
        <link href="{{ asset('falcon/vendors/choices/choices.min.css') }}" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
        <link href="{{ asset('falcon/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
        <link href="{{ asset('falcon/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
        <link href="{{ asset('falcon/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
        <link href="{{ asset('falcon/assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
        <link href="{{ asset('falcon/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
        <link href="{{ asset('falcon/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
        {{-- <script src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js"></script>
        <script>Turbolinks.start();</script> --}}
        <script>
            var isRTL = JSON.parse(localStorage.getItem('isRTL'));
            if (isRTL) {
                var linkDefault = document.getElementById('style-default');
                var userLinkDefault = document.getElementById('user-style-default');
                linkDefault.setAttribute('disabled', true);
                userLinkDefault.setAttribute('disabled', true);
                document.querySelector('html').setAttribute('dir', 'rtl');
            } else {
                var linkRTL = document.getElementById('style-rtl');
                var userLinkRTL = document.getElementById('user-style-rtl');
                linkRTL.setAttribute('disabled', true);
                userLinkRTL.setAttribute('disabled', true);
            }
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config("maps.map_api_key") }}"></script>
        <style>
#cover-spin {
    position:fixed;
    width:100%;
    left:0;right:0;top:0;bottom:0;
    background-color: rgba(255,255,255,0.7);
    z-index:9999;
}

@-webkit-keyframes spin {
	from {-webkit-transform:rotate(0deg);}
	to {-webkit-transform:rotate(360deg);}
}

@keyframes spin {
	from {transform:rotate(0deg);}
	to {transform:rotate(360deg);}
}

#cover-spin::after {
    content:'';
    display:block;
    position:absolute;
    left:48%;top:40%;
    width:40px;height:40px;
    border-style:solid;
    border-color:black;
    border-top-color:transparent;
    border-width: 4px;
    border-radius:50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
}

table, table tr, table td, table thead, table tbody {
    white-space: nowrap
}
        </style>
        @livewireStyles
    </head>

    <body>
        <main class="main" id="top">
            <div class="container" data-layout="container">
                @yield('content')
            </div>
        </main>

        <script src="{{ asset('falcon/vendors/lottie/lottie.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/validator/validator.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/prism/prism.js') }}"></script>

        <script src="{{ asset('falcon/vendors/popper/popper.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/anchorjs/anchor.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/is/is.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/glightbox/glightbox.min.js') }}"></script>
        <script src="{{ asset('falcon/assets/js/flatpickr.js') }}"></script>
        <script src="{{ asset('falcon/vendors/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('falcon/assets/data/world.js') }}"></script>
        <script src="{{ asset('falcon/vendors/plyr/plyr.polyfilled.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/countup/countUp.umd.js') }}"></script>
        <script src="{{ asset('falcon/vendors/chart/chart.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/dropzone/dropzone.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/leaflet/leaflet.js') }}"></script>
        <script src="{{ asset('falcon/vendors/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
        <script src="{{ asset('falcon/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/dayjs/dayjs.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/fullcalendar/main.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/fontawesome/all.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/lodash/lodash.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/choices/choices.min.js') }}"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
        <script src="{{ asset('falcon/vendors/list.js/list.min.js') }}"></script>
        <script src="{{ asset('falcon/vendors/typed.js/typed.js') }}"></script>
        <script src="{{ asset('falcon/assets/js/theme.js') }}"></script>
        <script src="{{ asset('falcon/vendors/swiper/swiper-bundle.min.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('falcon/vendors/jquery-mask/jquery.mask.min.js') }}"></script>
        @livewireScripts
        @stack('script')
    </body>

</html>