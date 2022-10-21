@extends('layouts.app')

@section('title_prefix', 'Home')
@section('title')
@section('title_posfix')

@section('css')
    <style>
        .container, .container-fluid { margin-top: 58px; }

        .mentorScrollbar::-webkit-scrollbar { width:10px; height:10px; }
        .mentorScrollbar::-webkit-scrollbar-track { background: #EEE; }
        .mentorScrollbar::-webkit-scrollbar-thumb { background: #AAA; }
        .mentorScrollbar::-webkit-scrollbar-thumb:hover { background: #888; }

        .bg-default { background-color:#F2F2F2; }
        .bg-img-team { background-color: #ABB9C0; border-radius: 10px; max-height: 140px; max-width: 140px; padding: 5px}

        #team-infos h1,
        #team-infos h3 { text-decoration: underline; }

        #team-infos   .bg-default,
        #players-card .bg-default { min-height: 405px; }

        @media (min-width: 992px) {
            #player-infos .bg-default,
            #game-infos   .bg-default,
            #adm-infos    .bg-default { min-height: 270px; }
        }

        .table-mentor th,
        .table-mentor td { padding: .4rem; vertical-align: middle; }
        .table-mentor th { background-color: #F8F9FA !important; position: sticky; top: 0; }

        #players-table {
            border: none !important;
        }
        #players-table tbody tr:hover {
            cursor: pointer;
        }

        #tb-team-finances .tb-title { text-align: right !important; width: 50%; }
        #tb-team-finances .tb-value { text-align: left !important;  width: 50%; }
        #tb-team-finances #income   tbody tr:last-child,
        #tb-team-finances #expenses tbody tr:last-child,
        #tb-team-finances #total    tbody tr:last-child { background-color: rgba(0, 0, 0, .05); }

        #rankingModal table .tb-icon img  { width:30px; }
        #rankingModal table .tb-icon      { padding:10px 0px 10px 7px; margin:auto 0; }
        #rankingModal table .tb-icon,
        #rankingModal table .tb-position  { text-align:center; width:5%; }
        #rankingModal table .tb-color     { width:.25%; padding:0 1.5px; }
        #rankingModal table .tb-name      { text-align:left; width:50%; }
        #rankingModal table .tb-ps        { text-align:center; width:10%; }
        #rankingModal .color-final        { color:#56B600; }
        #rankingModal .color-climbing     { color:#9F2487; }
        #rankingModal .color-pre-climbing { color:#2B2FD0; }
        #rankingModal .color-promotion    { color:#7f7871; }
        #rankingModal .color-demotion     { color:#DC3545; }

    </style>
@endsection

@section('content')

    @include('home-parts.menu')

    <div class="container-fluid">

        <div class="row d-flex flex-row align-items-stretch">

            {{-- TEAM INFOS --}}
            @include('home-parts.cards.team-infos')

            {{-- PLAYERS CARD --}}
            @include('home-parts.cards.players-card')

        </div>

        <div class="row d-flex flex-row align-items-stretch">

            {{-- PLAYER INFOS --}}
            @include('home-parts.cards.player-infos')

            {{-- GAME INFOS --}}
            @include('home-parts.cards.game-infos')

            {{-- ADM INFOS --}}
            @include('home-parts.cards.adm-infos')

        </div>

        {{-- dias da semana --}}
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
    {{-- Modal rankings --}}
    @include('home-parts.rankings')

    {{-- Modal final-stats --}}
    @if ($nextMatch == null)
    @include('home-parts.final-stats')
    @else
    @include('home-parts.next-match')
    @endif

@endsection

@section('scripts')
    <script>
        @if ($nextMatch === null)
            $("#finalStatsModal").modal("show");
        @endif

        $(document).ready(function () {
            let t = $("tbody tr").first().attr("id");
            $(`#${t}`).click();
        });

        // OPEN ranking modal
        $("#btnRankingModal").on("click", function (e) {
            $("#league_id").val({{ session("p_league_id") }}).trigger("change");
            $("#division_id").val({{ session("p_division_id") }}).trigger("change");

            $("#rankingModal").modal("show");
        });

        window.addEventListener('click', function ( e ) {
            const tr      = e.target.closest("tr");
            const players = {!! $team->players !!};

            if (tr)
            {
                players.forEach(p => {
                    if (`p-${p.id}` == tr.id)
                    {
                        const age = $(tr).children(".age").text();

                        $("#p-infos-name").html(p.nickname).attr("title", `${p.name} ${p.lastname}`);
                        $("#p-infos-role").html(   `1ª p.:               ${formatRoleFull(p.attribute.role)[0]}`);
                        $("#p-infos-secund").html( `2ª p.:               ${formatRoleFull(p.attribute.secondary_role)[0]}`);
                        $("#p-infos-age").html(    `Idade:               ${age}`);
                        $("#p-infos-force").html(  `Força:               ${p.attribute.force}`);
                        $("#p-infos-salary").html( `Salário:<br>R$       ${formatCurrency(p.attribute.salary)}`);
                        $("#p-infos-pass").html(   `Valor do passe<br>R$ ${formatCurrency(p.attribute.pass)}`);
                    }
                });
            }
        }, false);


        $("#league_id").on("change", function () {
            $("#division_id").removeAttr("disabled");
            insertDivisions(this.value);
        });
        $("#division_id").on("change", function () {
            insertTeams(this.value);
        });

        // {{-- INSERT DIVISIONS --}}
        insertDivisions = function (id)
        {
            const divisions = {!! $divisions !!};
            let opts        = "";

            divisions.forEach(division => {
                if (division.league_id == {{ session("p_league_id") }})
                {
                    let selected = (division.id == {{ session("p_division_id") }}) ? "selected" : "";
                    opts += `<option value="${division.id}" ${selected} >${division.initials}</option>`;
                }
            });

            $("#division_id").html(opts);
        }

        // {{-- INSERT TEAMS --}}
        insertTeams = function (division_id)
        {
            let tr           = "";
            const teams      = {!! $teams !!};
            const rankings   = JSON.parse('{!! json_encode($rankings) !!}');
            let team_ranking = [];

            for (let i = 0; i < 10; i++) {
                team_ranking.push(rankings[division_id][i]);
            }

            team_ranking.sort((a, b) => a.position - b.position);

            team_ranking.forEach(e => {
                let team;
                teams.forEach(t => {
                    if (t.id == e.team_id) team = t;
                });

                tr += `
                    <tr>
                        <td class="tb-position" >${e.position}</td>
                        <td class="tb-color"    ></td>
                        <td class="tb-icon"     >
                            <img src="{{ asset("images/game/leagues/teams") }}/${team.image}" class="img-fluid mx-auto d-block"
                                onerror="this.onerror=null;this.src='{{ asset("images/game/leagues/teams") }}/default.png';" />
                        </td>
                        <td class="tb-name"     >${team.name}</td>
                        <td class="tb-ps"       >${e.victories}</td>
                        <td class="tb-ps"       >${e.defeats}</td>
                    </tr>
                `;
            });

            $("#tbRanking table tbody").html(tr);
        }

    </script>

    @yield('compl_js')
@endsection
