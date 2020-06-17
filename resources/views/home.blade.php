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
        #team-infos .bg-default,
        #players-table .bg-default { height: 406px; }
        #player-infos .bg-default,
        #game-infos .bg-default,
        #adm-infos .bg-default { height: 307px; }
        #player-infos .bg-default .row,
        #game-infos .bg-default .row,
        #adm-infos .bg-default .row { margin-top: auto; margin-bottom: auto; }

        .table-mentor th, 
        .table-mentor td      { padding: .4rem; }
        .table-mentor th      { background-color: #F8F9FA !important; position: sticky; top: 0; }
        .table-mentor .icon-a { width: 5%; text-align: center; }
        .table-mentor .icon-b { width: 15%; }
        .table-mentor .icon-c { width: 25%; }
        .table-mentor .icon-d { width: 10%; text-align: center; }  
        .table-mentor .icon-e { width: 30%; text-align: center !important; }

    </style>
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            {{-- TEAM INFOS --}}
            <div id="team-infos" class="col-12 col-md-5 col-lg-4 px-2 pr-md-1 pb-1">
                <div class="p-2 bg-default">
                    <div class="row pb-2" >
                        <div class="col-6 mt-2 px-0">
                            <a href="/" >
                                <img src="{{ asset('images/game/leagues/teams/cblol_fla.png') }}" class="m-auto d-block bg-img-team" />
                            </a>
                        </div>
                        <div class="col-6 text-center my-auto">
                            <h1>FLA</h1>
                            <h3>Flamengo eSports</h3>
                        </div>
                    </div>

                    <div class="row py-2" >
                        <div class="col-12 text-center" >
                            <h4>CBLOL 2019 - 1ª Etapa</h4>
                            <h5>Posição atual: <strong>1°</strong></h5>
                            <h5>Treinador: <a class="text-info" href="/">Mateus "kemns" Costa</a></h5> 
                        </div>
                    </div>

                    <div class="row py-2" >
                        <div class="col-12 col-md-10 mx-auto ">
                            <h6>Confiança da diretoria: </h6>
                        </div>
                        <div class="col-12 col-md-10 mx-auto ">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                            </div>
                        </div>
                    </div>

                    <div class="row py-2" >
                        <div class="col-12 col-md-10 mx-auto ">
                            <h6>Confiança da torcida: </h6>
                        </div>
                        <div class="col-12 col-md-10 mx-auto ">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PLAYERS TABLE --}}
            <div id="players-table" class="col-12 col-md-7 col-lg-8 px-2 pl-md-1 py-1 pt-md-0">
                <div class="table-responsive bg-default">
                    <table class="table table-borderless table-hover mb-0 table-mentor">
                        <thead class="bg-light ">
                            <tr>
                                <th class="icon-a text-center" > </th>
                                <th class="icon-b" title="Posição" >Posição</th>
                                <th class="icon-c" title="Nick"    >Jogador</th>
                                <th class="icon-d" title="Força"   >Força</th>
                                <th class="icon-e" title="Energia" >Energia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Topo</td>
                                <td class="icon-c" >Robo</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" style="width: 100%">100%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Caçador</td>
                                <td class="icon-c" >Shrimp</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="90" style="width: 90%">90%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Meio</td>
                                <td class="icon-c" >Goku</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="80" style="width: 80%">80%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Atirador</td>
                                <td class="icon-c" >brTT</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="70" style="width: 70%">70%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Suporte</td>
                                <td class="icon-c" >Luci</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="60" style="width: 60%">60%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_b.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Atirador</td>
                                <td class="icon-c" >Juzinho</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" style="width: 50%">50%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_b.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Suporte</td>
                                <td class="icon-c" >Reven</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 40%">40%</div>
                                    </div>
                                </td> 
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Topo</td>
                                <td class="icon-c" >Robo</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" style="width: 100%">100%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Caçador</td>
                                <td class="icon-c" >Shrimp</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="90" style="width: 90%">90%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Meio</td>
                                <td class="icon-c" >Goku</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="80" style="width: 80%">80%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Atirador</td>
                                <td class="icon-c" >brTT</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="70" style="width: 70%">70%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_v.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Suporte</td>
                                <td class="icon-c" >Luci</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="60" style="width: 60%">60%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_b.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Atirador</td>
                                <td class="icon-c" >Juzinho</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" style="width: 50%">50%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="icon-a text-center" >
                                    <img src="{{ asset('images/game/shirt/camisa_b.png') }}" width="15" height="14">
                                </td>
                                <td class="icon-b" >Suporte</td>
                                <td class="icon-c" >Reven</td>
                                <td class="icon-d" >50</td>
                                <td class="icon-e align-middle" >
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 40%">40%</div>
                                    </div>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            {{-- PLAYER INFOS --}}
            <div id="player-infos" class="col-12 col-md-6 col-lg-4 px-2 pr-md-1 py-1" >
                <div class="p-2 bg-default">
                    <div class="row">
                        <div class="col-12 col-md-6 my-auto">
                            <h3 class="mb-0 text-center" title="Felipe Gonçalves - Brasileiro" >brTT - BR</h3>
                            <div class="mx-auto my-2">
                                <a class="btn btn-info btn-block btn-sm" href="" data-toggle="modal" data-target="#default" >Hist. Carreira</a>
                            </div>
                            <div class="mx-auto my-2">
                                <a class="btn btn-info btn-block btn-sm disabled" href="/" title="">Vender</a>
                            </div>
                            <div class="mx-auto my-2">
                                <a class="btn btn-info btn-block btn-sm disabled" href="/" title="">Contrato</a>
                            </div>
                            <div class="mx-auto my-2">
                                <a class="btn btn-info btn-block btn-sm disabled" href="/" title="">Aposentar</a>
                            </div>
                            <div class="mx-auto my-2">
                                <a class="btn btn-primary btn-block btn-sm disabled" href="/" title="">Treinar</a>
                            </div>
                        </div>	
                        <div class="col-12 col-md-6 my-auto text-center">
                            <p class="mb-0 pb-2" title="Posição" >Posição: Atirador</p>
                            <p class="mb-0 pb-2" title="Idade">Idade: 27</p>
                            <p class="mb-0 pb-2" title="Força tática">Força: 50</p>
                            <p class="mb-0 pb-2" >Valor do passe:<br>R$ 205.009,90</p>
                            <p class="mb-0 pb-2" >Salário:<br>R$ 2.500,99</p>
                            <!-- <p class="mb-0 pb-2" >Favoritos:<br><u>Draven</u> e <u>Ezreal</u></p> -->
                        </div>
                    </div>
                </div>
            </div>

            {{-- GAME INFOS --}}
            <div id="game-infos" class="col-12 col-md-6 col-lg-4 px-2 px-md-1 py-1" >
                <div class="p-2 bg-default">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3>Próximo jogo:
                                <a class="btn btn-link btn-sm text-info my-auto" href="/" role="button" data-toggle="modal" data-target="#nextGameModal" >
                                    <u>Hist. conf.</u>
                                </a>
                            </h3>
                        </div>
                        <div class="col-6 text-center my-auto">
                            <a href="/">
                                <img src="{{ asset('images/game/leagues/teams/cblol_itz.png') }}" class="m-auto d-block bg-img-team" >
                            </a>
                            <h6>INTZ (6°)</h6>
                        </div>
                        <div class="col-6 text-center my-auto">
                            <h5>CBLoL 2019<br>1ª Etapa</h5>
                            <h6>Semana 3 - Dia 1</h6>
                            <small>26/01/19</small>
                        </div>
                        <div class="col-12 text-center mt-4 mb-2">
                            <a class="btn btn-info btn-lg" href="/" >
                                ESCALAR TIME
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ADM INFOS --}}
            <div id="adm-infos" class="col-12 col-lg-4 px-2 pl-md-1 py-1" >
                <div class="p-2 bg-default">
                    <div class="row">
                        <div class="col-8 pb-2 " >
                            <h4 class="mb-0 text-left" >Jogadores: 11/15</h4>
                        </div>
                        <div class="col-4 pb-2 " >
                            <p class="mb-0 text-right" >23/01/2019</p>
                        </div>
                        <div class="col-12 py-2" >
                            <h4 class="mb-0 text-left" >Caixa: 
                                <a class="text-info" href="" data-toggle="modal" data-target="#teamFinancesModal" >
                                    <strong><u>R$ 148 mil</u></strong>
                                </a>
                            </h4>
                        </div>
                        <div class="col-12 pt-2" >
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
        
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>




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
@endsection
