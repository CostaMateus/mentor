
            {{-- TEAM INFOS --}}
            <div id="team-infos" class="col-12 col-md-5 col-lg-4 px-2 pr-md-1 pb-1">
                <div class="p-2 bg-default h-100">
                    <div class="row h-100">
                        <div class="col my-auto">

                            <div class="row pb-2" >
                                <div class="col-6 mt-2 px-0">
                                    <a href="/" >
                                        <img src="{{ asset('images/game/leagues/teams/' . $team->image) }}" alt="{{ $team->initials }}" class="m-auto d-block bg-img-team" />
                                    </a>
                                </div>
                                <div class="col-6 text-center my-auto">
                                    <h1>{{ $team->initials }}</h1>
                                    <h3>{{ $team->name }}</h3>
                                </div>
                            </div>

                            <div class="row py-2" >
                                <div class="col-12 text-center" >
                                    <h4>CBLOL {{ Helper::getYear($matchups[0]->date) }} - {{ $matchups[0]->split }}ª Etapa</h4>
                                    <h5>Posição atual: <strong>{{ $team->position }}°</strong></h5>
                                    <h6>Treinador: <a class="text-info" href="/">{{ $player->name . ' \'' . $player->nickname . '\' ' . $player->lastname }}</a></h6>
                                </div>
                            </div>

                            <div class="row py-2" >
                                <div class="col-12 col-md-10 mx-auto ">
                                    <h6>Confiança da diretoria: </h6>
                                </div>
                                <div class="col-12 col-md-10 mx-auto ">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{ $trust->board }}%">{{ $trust->board }}%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row py-2" >
                                <div class="col-12 col-md-10 mx-auto ">
                                    <h6>Confiança da torcida: </h6>
                                </div>
                                <div class="col-12 col-md-10 mx-auto ">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{ $trust->fans }}%">{{ $trust->fans }}%</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
