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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            table tr, table th, table td {
                white-space: nowrap;
            }
        </style>
        @livewireStyles
    </head>

    <body>
        <main class="main" id="top">
            <div class="container" data-layout="container">
                <script>
                    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                    if (isFluid) {
                        var container = document.querySelector('[data-layout]');
                        container.classList.remove('container');
                        container.classList.add('container-fluid');
                    }
                </script>
                <nav class="navbar navbar-vertical navbar-expand-xl navbar-light navbar-vibrant">
                    <script>
                        var navbarStyle = localStorage.getItem("navbarStyle");
                        if (navbarStyle && navbarStyle !== 'transparent') {
                            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                        }
                    </script>
                    <div class="d-flex align-items-center">
                        <div class="toggle-icon-wrapper">
                            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
                                <span class="navbar-toggle-icon">
                                    <span class="toggle-line"></span>
                                </span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <div class="d-flex align-items-center py-3">
                                <img class="me-2" src="{{ asset('falcon/assets/img/logo.png') }}" alt="" width="130" />
                            </div>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                        <div class="navbar-vertical-content scrollbar">
                            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                                <li class="nav-item">
                                @foreach (Menus::getRoleForTeam(request()->user()->team) as $item)
                                    @if ($item['key'] == "MS01")
                                    </li>
                                    <li class="nav-item">
                                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                        <div class="col-auto navbar-vertical-label" style="color: #FFF02D; font-weight: bold; font-size: 14px">App
                                        </div>
                                        <div class="col ps-0">
                                            <hr class="mb-0 navbar-vertical-divider" style="border-top: 2px solid #FFF02D;"/>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($item['key'] == "OT01")
                                    </li>
                                    <li class="nav-item">
                                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                        <div class="col-auto navbar-vertical-label" style="color: #FFF02D; font-weight: bold; font-size: 14px">Help Center
                                        </div>
                                        <div class="col ps-0">
                                            <hr class="mb-0 navbar-vertical-divider" style="border-top: 2px solid #FFF02D;"/>
                                        </div>
                                    </div>
                                    @endif

                                    @if (isset($item['childs']) && !empty($item['childs']))
                                    <a class="nav-link dropdown-indicator" href="#{{ $item["key"] }}" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="data-master">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="{{ $item["icon"] }}"></span></span>
                                            <span class="nav-link-text ps-1">{{ $item["title"] }}</span>
                                        </div>
                                    </a>
                                    <ul class="nav collapse false" id="{{ $item["key"] }}">
                                    @foreach ($item['childs'] as $child)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ Route::has($child["route"]) ? route($child["route"]) : "" }}" aria-expanded="false">
                                                <div class="d-flex align-items-center">
                                                    <span class="nav-link-text ps-1">{{ $child["title"] }}</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                    @else
                                    <a class="nav-link" href="{{ Route::has($item["route"]) ? route($item["route"]) : "" }}" role="button" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="{{ $item["icon"] }}"></span></span>
                                            <span class="nav-link-text ps-1">{{ $item["title"] }}</span>
                                        </div>
                                    </a>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </nav>

                @yield('content')
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        @livewireScripts
        @stack('script')
    </body>

</html>