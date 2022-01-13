<nav class="navbar navbar-expand-lg navbar-mentor bg-mentor-nav fixed-top">
    <a class="navbar-brand" href="/home"  height="30" >
        <img src="{{ asset("favicon.ico") }}" alt="Mentor" class="" width="35" height="35" style="opacity:.8">
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
                    <a class="dropdown-item" href="/logout" >Logout</a>
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
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#team-finances" >Finanças do time</a>
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Empréstimo bancário</a>
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Patrocinadores</a>
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#default" >Loja</a>
                </div>
            </li>

            {{-- ranking --}}
            <li class="nav-item">
                <a id="btnRankingModal" class="nav-link" href="#" >Classificação</a>
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
