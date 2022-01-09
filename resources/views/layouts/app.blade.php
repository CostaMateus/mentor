<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon site -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.1/bootstrap-table.css">

        <!-- Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
            .bg-mentor {
                background-color: #0C3448;
            }

            .navbar {
                min-height: 50px;
            }
            @media (min-width: 992px) {
                .navbar-brand {
                    position: absolute;
                }
            }

            .navbar-mentor {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }

            .navbar-mentor .navbar-brand,
            .navbar-mentor .navbar-nav .nav-link {
                color: #FFF;
            }
            .nav-link {
                padding: 13px 10px !important;
            }

            .navbar-mentor .navbar-brand:hover,
            .navbar-mentor .navbar-brand:focus {
                color: #FFF;
            }

            .navbar-mentor .navbar-nav .nav-link.disabled {
                color: rgba(255, 255, 255, 0.25);
            }

            .navbar-mentor .navbar-nav .show > .nav-link,
            .navbar-mentor .navbar-nav .active > .nav-link,
            .navbar-mentor .navbar-nav .nav-link.show,
            .navbar-mentor .navbar-nav .nav-link.active,
            .navbar-mentor .navbar-nav .nav-link:hover,
            .navbar-mentor .navbar-nav .nav-link:focus  {
                color:#6D6E71;
                background-color:#FFF;
            }
            .navbar-mentor .navbar-toggler {
                color: rgba(255, 255, 255, 0.5);
                border-color: rgba(255, 255, 255, 0.1);
            }
            .navbar-mentor .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }
            .navbar-mentor .navbar-text {
                color: rgba(255, 255, 255, 0.5);
            }
            .navbar-mentor .navbar-text a {
                color: #FFF;
            }
            .navbar-mentor .navbar-text a:hover, .navbar-mentor .navbar-text a:focus {
                color: #FFF;
            }
            .navbar-mentor .navbar-nav .dropdown-menu {
                padding: 0 !important;
                margin-top: .065rem;
                border: none !important;
                border-radius: 0 !important;
            }
			.navbar-mentor .navbar-nav .dropdown-item {
                color:#6D6E71;
                padding: .75rem 1rem;
            }
			.navbar-mentor .navbar-nav .dropdown-item:active,
			.navbar-mentor .navbar-nav .dropdown-item:hover,
			.navbar-mentor .navbar-nav .dropdown-item:focus {
                color: #FFF;
                background-color: #54707E;
            }
			.navbar-mentor .navbar-nav .dropdown-divider { margin: 0 !important; }

            .text-top { color: #F8C300 !important; }
            .text-jng { color: #A652BB !important; }
            .text-mid { color: #0099E1 !important; }
            .text-adc { color: #F93A2F !important; }
            .text-sup { color: #00C09A !important; }

        </style>
        @yield('css')

        {{-- Title --}}
        <title>
            @yield('title_prefix',  config('mentor.title_prefix',  ''))
            @yield('title',         config('mentor.title',         ''))
            @yield('title_postfix', config('mentor.title_postfix', ''))
        </title>
    </head>
    <body>
        @yield('content')

        {{-- Scripts --}}
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"                 ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/collection-util-js@1.5.9/dist/collection-min.js" ></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.1/bootstrap-table.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.1/locale/bootstrap-table-pt-BR.min.js"></script>

        <script src="{{ asset('js/common.js') }}"></script>

        @yield('scripts')
    </body>
</html>
