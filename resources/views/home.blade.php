@extends('layouts.app')

@section('title')
    Home
@endsection

@section('css')
    <style>
        .mentorScrollbar::-webkit-scrollbar { width:10px; height:10px; }
        .mentorScrollbar::-webkit-scrollbar-track { background: #EEE; }
        .mentorScrollbar::-webkit-scrollbar-thumb { background: #AAA; }
        .mentorScrollbar::-webkit-scrollbar-thumb:hover { background: #888; }

        body { background-color: #395A6A; }
        .container, .container-fluid { margin-top: 58px; }

        .bg-default { background-color:#F2F2F2; }
        .bg-img-team { background-color: #ABB9C0; border-radius: 10px; max-height: 140px; max-width: 140px; }

        #team-infos h1,
        #team-infos h3 { text-decoration: underline; }

        /* #team-infos .bg-default, */
        #players-card .bg-default { height: 400px; }

        .table-mentor th,
        .table-mentor td { padding: .4rem; vertical-align: middle; }
        .table-mentor th { background-color: #F8F9FA !important; position: sticky; top: 0; }

        #players-table {
            border: none !important;
        }

        #tb-team-finances .tb-title { text-align: right !important; width: 50%; }
        #tb-team-finances .tb-value { text-align: left !important;  width: 50%; }
        #tb-team-finances #income   tbody tr:last-child,
        #tb-team-finances #expenses tbody tr:last-child,
        #tb-team-finances #total    tbody tr:last-child { background-color: rgba(0, 0, 0, .05); }

    </style>
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row d-flex flex-row align-items-stretch">

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
                                    <h4>CBLOL 20?? - ?ª Etapa</h4>
                                    <h5>Posição atual: <strong>?°</strong></h5>
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

            {{-- PLAYERS CARD --}}
            <div id="players-card" class="col-12 col-md-7 col-lg-8 px-2 pl-md-1 py-1 pt-md-0">
                <div class="table-responsive bg-default">
                    <table id="players-table" class="table table-borderless table-striped mb-0 table-mentor" data-toggle="table" >
                        <thead class="bg-light ">
                            <tr>
                                <th class="nick"                  data-field="nick"   data-sortable="true" title="Nick"               >Jogador</th>
                                <th class="energy"                data-field="energy" data-sortable="true" title="Energia"            >Energia</th>
                                <th class="text-center force"     data-field="force"  data-sortable="true" title="Força"              >F</th>
                                <th class="text-center role"      data-field="role1"  data-sortable="true" title="Posição primária"   >1ª</th>
                                <th class="text-center secondary" data-field="role2"  data-sortable="true" title="Posição secundária" >2ª</th>
                                <th class="text-center salary"    data-field="salary" data-sortable="true" title="Salário (R$)"       >Salário</th>
                                <th class="text-center pass"      data-field="pass"   data-sortable="true" title="Passe (R$)"         >Passe</th>
                                <th class="text-center age"       data-field="age"    data-sortable="true" title="Idade"              >I.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->players as $p)
                                @if (!$p->mentor)
                                    @php
                                        $rolTx1 = $p->attribute->role;
                                        $rolTx2 = $p->attribute->secondary_role;

                                        $role1  = Helper::formatteRole($rolTx1);
                                        $role2  = Helper::formatteRole($rolTx2);
                                    @endphp

                                    <tr id="p-{{ $p->id }}" >
                                        <td class="nick"                                               >{{ $p->name }} <b>'{{ $p->nickname }}'</b> {{ $p->lastname }}</td>
                                        <td class="energy align-middle" >
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" style="width: {{ $p->attribute->energy }}%">{{ $p->attribute->energy }}%</div>
                                            </div>
                                        </td>
                                        <td class="force     text-center"                              >{{ $p->attribute->force }}</td>
                                        <td class="role      text-center text-bold text-{{ $rolTx1 }}" >{{ $role1 }}</td>
                                        <td class="secondary text-center text-bold text-{{ $rolTx2 }}" >{{ $role2 }}</td>
                                        <td class="salary    text-center"                              >{{ Helper::formatSalary($p->attribute->salary) }}</td>
                                        <td class="pass      text-center"                              >{{ Helper::formatSalary($p->attribute->pass) }}</td>
                                        <td class="age       text-center"                              >{{ $p->age }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="row d-flex flex-row align-items-stretch">

            {{-- PLAYER INFOS --}}
            <div id="player-infos" class="col-12 col-md-6 col-lg-4 px-2 pr-md-1 pt-1 pb-2" >
                <div class="p-2 bg-default h-100">
                    <div class="row h-100">
                        <div class="col-12 col-md-6 my-auto">
                            <h3 id="p-infos-name" class="mb-0 text-center" title="" ></h3>
                            <div class="mx-auto my-2">
                                <a class="btn btn-info btn-block btn-sm" href="" data-toggle="modal" data-target="#default" >Hist. Carreira</a>
                            </div>
                            <div class="mx-auto my-2">
                                <a class="btn btn-info btn-block btn-sm disabled" href="#" title="">Vender</a>
                            </div>
                            <div class="mx-auto my-2">
                                <a class="btn btn-info btn-block btn-sm disabled" href="#" title="">Contrato</a>
                            </div>
                            <div class="mx-auto my-2">
                                <a class="btn btn-info btn-block btn-sm disabled" href="#" title="">Aposentar</a>
                            </div>
                            <div class="mx-auto my-2">
                                <a class="btn btn-primary btn-block btn-sm disabled" href="#" title="">Treinar</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 my-auto text-center">
                            <p id="p-infos-role"   class="mb-0 pb-2" title="Posição primária" ></p>
                            <p id="p-infos-secund" class="mb-0 pb-2" title="Posição secundária" ></p>
                            <p id="p-infos-age"    class="mb-0 pb-2" title="Idade" ></p>
                            <p id="p-infos-force"  class="mb-0 pb-2" title="Força tática" ></p>
                            <p id="p-infos-salary" class="mb-0 pb-2" ></p>
                            <p id="p-infos-pass"   class="mb-0 pb-2" ></p>
                            <!-- <p class="mb-0 pb-2" >Favoritos:<br><u>Draven</u> e <u>Ezreal</u></p> -->
                        </div>
                    </div>
                </div>
            </div>

            {{-- GAME INFOS --}}
            <div id="game-infos" class="col-12 col-md-6 col-lg-4 px-2 pl-md-1 px-lg-1 pt-1 pb-2" >
                <div class="p-2 bg-default h-100">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3>Próximo jogo:
                                <a class="btn btn-link btn-sm text-info my-auto" href="/" role="button" data-toggle="modal" data-target="#nextGameModal" >
                                    <u>Hist. conf.</u>
                                </a>
                            </h3>
                        </div>
                        @foreach ($matchups as $m)
                            @if ($m->winner_team_id == null)
                                @php
                                    $adv = ($team->id == $m->blue_team_id) ? $m->red_team_id : $m->blue_team_id;
                                @endphp

                                @if ($team->id == $m->blue_team_id || $team->id == $m->red_team_id)
                                    <div class="col-6 text-center my-auto">
                                        @foreach ($teams as $t)
                                            @if ($t->id == $adv)
                                                <a href="/">
                                                    <img src="{{ asset('images/game/leagues/teams') . '/' . $t->image }}" class="m-auto d-block bg-img-team w-50 " >
                                                </a>
                                                <h6>{{ $t->initials}} (?°)</h6>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-6 text-center my-auto">
                                        <h6>Rodada {{ $m->round }}</h6>
                                        <small>{{ Helper::formatDate($m->date) }}</small>
                                    </div>

                                    @break
                                @endif
                            @endif
                        @endforeach
                        <div class="col-12 text-center mt-4 mb-2">
                            <a class="btn btn-info btn-lg" href="/" >
                                ESCALAR TIME
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ADM INFOS --}}
            <div id="adm-infos" class="col-12 col-lg-4 px-2 pl-lg-1 pt-1 pb-2" >
                <div class="p-2 bg-default h-100">
                    <div class="row">
                        <div class="col-8 pb-2 " >
                            <h4 class="mb-0 text-left" >Jogadores: {{ $total_p }}/15</h4>
                        </div>
                        <div class="col-4 pb-2 " >
                            <p class="mb-0 text-right" >23/01/2019</p>
                        </div>
                        <div class="col-12 py-2" >
                            <h4 class="mb-0 text-left" >Caixa:
                                <a class="text-info" href="" data-toggle="modal" data-target="#team-finances" >
                                    <strong><u>R$ {{ Helper::formatSalary($total) }}</u></strong>
                                </a>
                            </h4>
                        </div>
                        <div class="col-12 pt-2 d-none" >
                            <!-- <h4 class="text-left" >Notificações: <a href="msgs.html" class="text-info"><strong>sem novas notificações</strong></a></h4> -->
                            <h4 class="mb-0 text-left" >Notificações:
                                <a href="msgs.html" class="" ><span class="badge badge-info">2 novas</span></a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- <div class="row">
            <div class="card-group w-100">
                <div class="card border-light mb-3">
                    <div class="card-header">
                        <h2 class="position-relative ml-auto mr-0 mb-0 float-right">21</h2>
                        <h6 class="mb-0">Segunda 21</h6>
                        <small>Janeiro 2018</small>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p class="mb-0"><small></small></p>
                        </div>
                    </div>
                </div>
                <div class="card border-light mb-3">
                    <div class="card-header">
                        <h2 class="position-relative ml-auto mr-0 mb-0 float-right">22</h2>
                        <h6 class="mb-0">Terça 22</h6>
                        <small>Janeiro 2018</small>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p class="mb-0 alert-info" role="alert"><small>Treino coletivo</small></p>
                        </div>
                        <div class="card-text">
                            <p class="mb-0 alert-info" role="alert"><small>Análise pós treino</small></p>
                        </div>
                    </div>
                </div>
                <div class="card border-light mb-3">
                    <div class="card-header">
                        <h2 class="position-relative ml-auto mr-0 mb-0 float-right">23</h2>
                        <h6 class="mb-0">Quarta</h6>
                        <small>Janeiro 2018</small>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p class="mb-0 alert-info" role="alert"><small>Treino individual</small></p>
                        </div>
                        <!-- <div class="card-text">
                            <p class="mb-0 alert-info" role="alert"><small>Análise pós treino</small></p>
                        </div> -->
                    </div>
                </div>
                <div class="card border-light mb-3">
                    <div class="card-header">
                        <h2 class="position-relative ml-auto mr-0 mb-0 float-right">24</h2>
                        <h6 class="mb-0">Quinta 24</h6>
                        <small>Janeiro 2018</small>
                    </div>
                    <div class="card-body">
                        <p class="card-text"></p>
                    </div>
                </div>
                <div class="card border-light mb-3">
                    <div class="card-header">
                        <h2 class="position-relative ml-auto mr-0 mb-0 float-right">25</h2>
                        <h6 class="mb-0">Sexta 25</h6>
                        <small>Janeiro 2018</small>
                    </div>
                    <div class="card-body">
                        <p class="card-text"></p>
                    </div>
                </div>
                <div class="card border-light mb-3">
                    <div class="card-header">
                        <h2 class="position-relative ml-auto mr-0 mb-0 float-right">26</h2>
                        <h6 class="mb-0">Sábado 26</h6>
                        <small>Janeiro 2018</small>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p class="mb-0 alert-warning" role="alert"><small>CBLOL - S3 D1 - <a href="#">ITZ</a></small></p>
                        </div>
                    </div>
                </div>
                <div class="card border-light mb-3">
                    <div class="card-header">
                        <h2 class="position-relative ml-auto mr-0 mb-0 float-right">27</h2>
                        <h6 class="mb-0">Domingo 27</h6>
                        <small>Janeiro 2018</small>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p class="mb-0 alert-warning" role="alert"><small>CBLOL - S3 D2 - <a href="#">VK</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>


    {{-- Modal teste --}}
    <div id="default" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Default</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-10">
                        <h5>Teste</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal finance --}}
    @include('home-parts.finance')

@endsection

@section('scripts')
    <script>

        // Bootstrap Table
        getbootstrapTable('players-table', {
            locale: 'pt-br',
        });

        $(document).ready(function () {
            let t = $('tbody tr').first().attr('id');
            $('#' + t).click();
        });

        $('[id*=p-]').on('click', function (e) {
            let id = $(this).attr('id').split('p-')[1];
            let players = {!! $team->players !!};

            players.forEach(p => {
                if (p.id == id)
                {
                    $('#p-infos-name').html(p.nickname).attr('title', `${p.name} ${p.lastname}`);
                    $('#p-infos-role').html(   `1ª p.:               ${formatteRoleFull(p.attribute.role)[0]}`);
                    $('#p-infos-secund').html( `2ª p.:               ${formatteRoleFull(p.attribute.secondary_role)[0]}`);
                    $('#p-infos-age').html(    `Idade:               ${p.age}`);
                    $('#p-infos-force').html(  `Força:               ${p.attribute.force}`);
                    $('#p-infos-salary').html( `Salário:<br>R$       ${formatCurrency(p.attribute.salary)}`);
                    $('#p-infos-pass').html(   `Valor do passe<br>R$ ${formatCurrency(p.attribute.pass)}`);
                }
            });
        });

    </script>

@endsection
