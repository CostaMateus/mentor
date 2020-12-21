<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon site -->
        <link rel="shortcut icon" href="{{ asset('images/login/circle.ico') }}" type="image/x-icon" />

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

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

        </style>
        @yield('css')

        <title>@yield('title') | {{ config('app.name', 'Mentor') }}</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-mentor bg-mentor fixed-top">
            <a class="navbar-brand" href="/home"  height="30" >
                {{-- <img class="" src="images/logo/logo_b.png" width="" height="24" alt="TheCoach!" > --}}
                Mentor
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarMain">
                <ul class="nav navbar-nav mx-auto ml-md-auto">
                    {{-- home --}}
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">Home</a>
                    </li>

                    {{-- options --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="optionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </a>
                        <div class="dropdown-menu" aria-labelledby="optionsDropdown">
                            <a class="dropdown-item" href=""                                            >Meu perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href=""                                            >Menu principal</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Preferências</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Pedir demissão</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Sobre o jogo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Logout</a>
                        </div>
                    </li>

                    {{-- calendar --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="calendarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Canlendário
                        </a>
                        <div class="dropdown-menu" aria-labelledby="calendarDropdown">
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" title="" >Jogos do time</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" title="" >Tabela jogos CBLOL</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" title="" >Tabela outras Ligas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" title="" >Tabela jogos da RR</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" title="" >Tabela jogos da MSI</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" title="" >Tabela jogos WC</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#deafult" title="" >Amistosos</a>
                        </div>
                    </li>

                    {{-- finances --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="financesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Finanças
                        </a>
                        <div class="dropdown-menu" aria-labelledby="financesDropdown">
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Finanças do time</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Empréstimo bancário</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Patrocinadores</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Loja</a>
                        </div>
                    </li>

                    {{-- ranking --}}
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#default" >Classificação</a>
                    </li>

                    {{-- trainings --}}
                    <li class="nav-item dropdown d-none">
                        <a class="nav-link dropdown-toggle" href="#" id="trainingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Treinos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="trainingsDropdown">
                            <a class="dropdown-item" href="/" >Treino individual</a>
                            <a class="dropdown-item" href="/" >Treino em time</a>
                        </div>
                    </li>

                    {{-- streaming --}}
                     <li class="nav-item">
                        <a class="nav-link " href="/" >Streaming</a>
                    </li>

                    {{-- teams --}}
                    <li class="nav-item">
                        <a class="nav-link " href="/" >Times</a>
                    </li>

                    {{-- search --}}
                    <li class="nav-item">
                        <a class="nav-link " href="/" >Busca</a>
                    </li>

                    {{-- historical --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="historicalDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Históricos
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="historicalDropdown">
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Campeões</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Históricos de confrontos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Rankings de coachs</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Rankings de times</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Tranferências de coachs</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Tranferências de jogadores</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Time da rodada</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Time da Etapa</a>
                        </div>
                    </li>

                    {{-- ADMIN --}}
                    @if (Auth::user()->id == 1)
                        <li class="nav-item">
                            <a class="nav-link " href="/admin" >ADM</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        @yield('content')

        {{-- Scripts --}}
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"                 ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/collection-util-js@1.5.9/dist/collection-min.js" ></script>

        @yield('scripts')
    </body>
</html>
