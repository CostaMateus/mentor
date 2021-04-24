
            {{-- GAME INFOS --}}
            <div id="game-infos" class="col-12 col-md-6 col-lg-4 px-2 pl-md-1 px-lg-1 pt-1 pb-2" >
                <div class="p-2 bg-default h-100">
                    <div class="row">
                        @if ($nextMatch != null)
                            <div class="col-12 text-center">
                                <h3>Próximo jogo:
                                    <a class="btn btn-link btn-sm text-info my-auto" href="/" role="button" data-toggle="modal" data-target="#nextGameModal" >
                                        <u>Hist. conf.</u>
                                    </a>
                                </h3>
                            </div>

                            <div class="col-6 text-center my-auto">
                                <a href="/">
                                    <img src="{{ asset('images/game/leagues/teams') . '/' . $nextMatch['adv']->image }}" class="m-auto d-block bg-img-team w-50 "
                                        onerror="this.onerror=null;this.src='{{ asset('images/game/leagues/teams') . '/default.png' }}';">
                                </a>
                                <h6>{{ $nextMatch['adv']->initials}} ({{ $nextMatch['position'] }}°)</h6>
                            </div>
                            <div class="col-6 text-center my-auto">
                                <h6>Rodada {{ $nextMatch['matchup']->round }}</h6>
                                <small>{{ Helper::formatDate($nextMatch['matchup']->date) }}</small>
                            </div>

                            <div class="col-12 text-center mt-4 mb-2">
                                <a class="btn btn-info btn-lg" href="/" >
                                    ESCALAR TIME
                                </a>
                            </div>
                        @else

                            <div class="col-12 text-center">
                                <h3>Split encerrado</h3>
                            </div>

                            <div class="col-12 text-center mt-4 mb-2">
                                <a class="btn btn-info btn-lg" href="/" >
                                    Ver vencedores
                                </a>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
