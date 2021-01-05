@extends('adminlte::page')

@section('title_prefix', 'Jogadores')

@section('css')
    <style>
        .has-error {
            border-color: rgb(185, 74, 72) !important;
        }

        .accordion-icons .card-header .btn.collapsed:before {
            content:"\f07b";
        }
    </style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Jogadores</h1>
@stop

@section('content')
    <div class="row">
        {{-- NOVO e FILTRO --}}
        <div class="col-12 mb-3">
            <button type="button" class="btn btn-secondary btn-sm new-player mr-1" >
                <i class="fas fa-plus "></i> Novo jogador
            </button>
            <button type="button" id="btnSearch" class="btn btn-default btn-sm ml-1" data-toggle="collapse" data-target="#searchCollapse" aria-expanded="false" aria-controls="searchCollapse">
                <i class="fas fa-angle-down"></i> Filtros
            </button>
        </div>

        {{-- PAGINAÇÃO --}}
        <div class="col-12">
            @include('adm/partials.pagination', [
                'pp' => [100, 200, 300, 500],
            ])
        </div>

        {{-- FILTROS --}}
        <div class="col-12">
            <div id="searchCollapse" class="collapse show">
                <div class="card card-body p-3">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="row">

                                {{-- NAME NICKNAME LASTNAME --}}
                                <div class="col-12 mt-3 mt-md-0">
                                    <form id="search_form" method="GET" class="">
                                        <div class="form-group mb-0">
                                            <small for="search_name" class="text-muted">Buscar por nome, sobrenome e apelido</small>
                                            <div class="input-group">
                                                <input type="text" id="search_name" class="form-control form-control-sm" name="name" placeholder="@if (session('name')) {{ session('name') }} @endif" aria-describedby="name">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-secondary btn-sm">
                                                        <i class="fas fa-search "></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{-- NACIONALIDADE --}}
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <small for="search_nationality" class="text-muted">Nacionalidade</small>
                                        <select id="search_nationality" class="form-control form-control-sm" name="nationality" style="width: 100%">
                                            <option value="" selected >Qualquer...</option>
                                            @foreach ($countries as $c)
                                                <option value="{{ $c->code }}" @if (session('nationality') == $c->code) selected @endif >{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- IDADE --}}
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <small for="search_age" class="text-muted">Idade</small>
                                        <select id="search_age" class="form-control form-control-sm" name="age" style="width: 100%">
                                            <option value="" selected >Qualquer...</option>
                                            <option value="1" @if (session('age') == 1) selected @endif >16 a 20</option>
                                            <option value="2" @if (session('age') == 2) selected @endif >21 a 25</option>
                                            <option value="3" @if (session('age') == 3) selected @endif >26 a 30</option>
                                            <option value="4" @if (session('age') == 4) selected @endif >31+</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- SEXO --}}
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <small for="search_sex" class="text-muted">Sexo</small>
                                        <select id="search_sex" class="form-control form-control-sm" name="sex" style="width: 100%">
                                            <option value="" selected >Qualquer...</option>
                                            <option value="F" @if (session('sex') == 'F') selected @endif >Feminino</option>
                                            <option value="M" @if (session('sex') == 'M') selected @endif >Masculino</option>
                                        </select>
                                    </div>
                                </div>


                                {{-- DISPONIVEL PARA VENDA --}}
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <small for="search_contract" class="text-muted">Situação para venda</small>
                                        <select id="search_contract" class="form-control form-control-sm" name="contract" style="width: 100%">
                                            <option value="" selected >Qualquer...</option>
                                            <option value="1" @if (session('contract') == 1) selected @endif >Contratos expirados</option>
                                            <option value="2" @if (session('contract') == 2) selected @endif >Contratos a vencer</option>
                                            <option value="3" @if (session('contract') == 3) selected @endif >Contratos expirados e a vencer</option>
                                            <option value="4" @if (session('contract') == 4) selected @endif >Livres, sem contrato</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row">

                                {{-- VALOR PASSE --}}
                                <div class="col-12 mt-3 mt-md-0">
                                    <div class="form-group mb-0">
                                        <small for="search_pass" class="text-muted">Passe (R$)</small>
                                        <select id="search_pass" class="form-control form-control-sm" name="pass" style="width: 100%">
                                            <option value="" selected >Qualquer...</option>
                                            <option value="1" @if (session('pass') == 1) selected @endif >1 mil a 4 mil</option>
                                            <option value="2" @if (session('pass') == 2) selected @endif >5 mil a 8 mil</option>
                                            <option value="3" @if (session('pass') == 3) selected @endif >9 mil a 12 mil</option>
                                            <option value="4" @if (session('pass') == 4) selected @endif >13 mil a 16 mil</option>
                                            <option value="5" @if (session('pass') == 5) selected @endif >17 mil a 20 mil</option>
                                            <option value="6" @if (session('pass') == 6) selected @endif >+21 mil</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- !ª POSIÇÃO --}}
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <small for="search_role" class="text-muted">1ª Posição</small>
                                        <select id="search_role" class="form-control form-control-sm" name="role1" style="width: 100%">
                                            <option value="" selected >Qualquer...</option>
                                            <option value="top" class="text-top" @if (session('role1') == 'top') selected @endif >Topo</option>
                                            <option value="jng" class="text-jng" @if (session('role1') == 'jng') selected @endif >Selva</option>
                                            <option value="mid" class="text-mid" @if (session('role1') == 'mid') selected @endif >Meio</option>
                                            <option value="adc" class="text-adc" @if (session('role1') == 'adc') selected @endif >Atirador</option>
                                            <option value="sup" class="text-sup" @if (session('role1') == 'sup') selected @endif >Suporte</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- 2ª POSIÇÃO --}}
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <small for="search_secondary_role" class="text-muted">2ª Posição</small>
                                        <select id="search_secondary_role" class="form-control form-control-sm" name="role2" style="width: 100%">
                                            <option value="" selected >Qualquer...</option>
                                            <option value="top" class="text-top" @if (session('role2') == 'top') selected @endif >Topo</option>
                                            <option value="jng" class="text-jng" @if (session('role2') == 'jng') selected @endif >Selva</option>
                                            <option value="mid" class="text-mid" @if (session('role2') == 'mid') selected @endif >Meio</option>
                                            <option value="adc" class="text-adc" @if (session('role2') == 'adc') selected @endif >Atirador</option>
                                            <option value="sup" class="text-sup" @if (session('role2') == 'sup') selected @endif >Suporte</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- FORÇA --}}
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <small for="search_force" class="text-muted">Força</small>
                                        <select id="search_force" class="form-control form-control-sm" name="force" style="width: 100%">
                                            <option value="" selected >Qualquer...</option>
                                            <option value="1" @if (session('force') == 1) selected @endif >1 a 10</option>
                                            <option value="2" @if (session('force') == 2) selected @endif >11 a 30</option>
                                            <option value="3" @if (session('force') == 3) selected @endif >31 a 50</option>
                                            <option value="4" @if (session('force') == 4) selected @endif >51 a 70</option>
                                            <option value="5" @if (session('force') == 5) selected @endif >71 a 100</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- ATUANDO NA --}}
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <small for="search_league_id" class="text-muted">Atuando na</small>
                                        <select id="search_league_id" class="form-control form-control-sm" name="league_id" style="width: 100%">
                                            <option value="" selected >Qualquer...</option>
                                            @foreach ($leagues as $league)
                                                <option value="{{ $league->id }}" @if (session('league_id') == $league->id) selected @endif >{{ $league->initials }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- TABELA --}}
        <div class="col-12 table-responsive pb-2">
            <table id="players-table" class="table table-striped table-sm" data-toggle="table" >
                <thead>
                    <tr class="bg-light">
                        <th class="text-center" data-field="id"          data-sortable="true" >#</th>
                        <th class=""            data-field="name"        data-sortable="true" title="Nome 'Apelido' Sobrenome"   >Nome</th>
                        <th class="text-center" data-field="force"       data-sortable="true" title="Força"                      >F</th>
                        <th class="text-center" data-field="role1"       data-sortable="true" title="Posição primária"           >1ª</th>
                        <th class="text-center" data-field="role2"       data-sortable="true" title="Posição secundária"         >2ª</th>
                        <th class="text-center" data-field="age"         data-sortable="true" title="Idade"                      >Idade</th>
                        <th class="text-center" data-field="sex"         data-sortable="true" title="Sexo"                       >Sexo</th>
                        <th class="text-center" data-field="nationality" data-sortable="true" title="Nacionalidade"              >Nac.</th>
                        <th class="text-center" data-field="employed"    data-sortable="true" title="Time"                       >Time</th>
                        <th class="text-center" data-field="available"   data-sortable="true" title="Disponível para contratação">Disp.</th>
                        <th class="text-center"                                               >Ações</th>
                        {{-- <th class="text-center"                                               >Ver</th> --}}
                        {{-- <th class="text-center"                                               >Editar</th> --}}
                        {{-- <th class="text-center"                                               >Excluir</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $player)
                        @if ($player->employed)
                            @foreach ($teams as $t)
                                @if ($t->id == $player->team_id)
                                    @php
                                        $player->team_initials = $t->initials
                                    @endphp
                                @endif
                            @endforeach
                        @endif
                        @php
                            // $rolTx1 = $player->attribute->role;
                            // $rolTx2 = $player->attribute->secondary_role;
                            $rolTx1 = $player->role;
                            $rolTx2 = $player->secondary_role;

                            $role1  = Helper::formatteRole($rolTx1);
                            $role2  = Helper::formatteRole($rolTx2);

                            $formt  = date_format(new DateTime( $player->contract ), "d/m/Y");

                            if ( $player->contract != null )
                            {
                                $a = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                                $d = date('d');
                                $m = date('m');
                                $y = date('Y');

                                $today = date($y . '-' . $m . '-' . $d);
                                $nextM = date($y . '-' . $a[ $m + 0 ] . '-' . $d); // $a[ $m - 1 ] == $m === pega o msm mês dentro do array // $a[ ( $m - 1 ) + 1 ] == $m + 1 === pega o mês seguinte, só que formatado

                                if ( $today >= $player->contract)
                                {
                                    $expired = 'EX'; //expirado
                                }
                                else if ( $player->contract < $nextM)
                                {
                                    $expired = 'AV'; //a vencer
                                }
                            }
                        @endphp

                        <tr>
                            <td class="text-center"                              >{{ $loop->iteration }}</td>
                            <td class=""                                         >{{ $player->name }} "{{ $player->nickname }}" {{ $player->lastname }}</td>
                            <td class="text-center"                              >{{ $player->force }}</td>
                            <td class="text-center text-bold text-{{ $rolTx1 }}" >{{ $role1 }}</td>
                            <td class="text-center text-bold text-{{ $rolTx2 }}" >{{ $role2 }}</td>
                            <td class="text-center"                              >{{ $player->age }}</td>
                            <td class="text-center"                              >{{ $player->sex }}</td>
                            <td class="text-center" >
                                <img class="my-auto flag" src="images/flags/{{ $player->nationality }}_64.png" alt="{{ $player->nationality }}" title="{{ Helper::getNameCountry($player->nationality) }}" width="30px" height="30px">
                            </td>
                            <td class="text-center" >
                                @if ($player->employed)
                                    {{ $player->team_initials }}
                                @endif
                            </td>
                            <td class="text-center" >
                                {{-- @if ($player->attribute->contract == null) --}}
                                @if ($player->contract == null)
                                    <i class="fas fa-check" style="color: #080" ></i>
                                @elseif (isset($expired) && $expired == 'EX')
                                    <i class="fas fa-check" style="color: #DC3545" title="Contrato expirado em {{ $formt }}" ></i>
                                @elseif (isset($expired) && $expired == 'AV')
                                    <i class="fas fa-check" style="color: #FFC107" title="Contrato termina em {{ $formt }}" ></i>
                                @else
                                @endif

                            </td>

                            <td class="text-center d-flex justify-content-between" >
                                <button class="btn btn-link text-dark see-player" data-id="{{ $player->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            {{-- </td>
                            <td class="text-center" > --}}
                                <button class="btn btn-link text-primary edit-player" data-id="{{ $player->id }}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            {{-- </td>
                            <td class="text-center" > --}}
                                <button class="btn btn-link text-danger del-player" data-id="{{ $player->id }}"
                                                                                    data-name="{{ $player->name }} '{{ $player->nickname }}' {{ $player->lastname }}" >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- SEE --}}
    @include('adm/partials.modal-see', [
        'modalId' => 'see-player',
        'title'   => 'see-player-title',
        'image'   => 'see-player-image',
        'body'    => 'player-attr',
    ])

    {{-- NEW --}}
    <div id="new-player" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="new-player-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="new-player-title" class="modal-title">Novo jogador</h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="new-player-form" action="" method="" >
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome *</label>
                                    <input type="text" id="name" class="form-control form-control-sm" name="name"  >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="lastname" class="text-muted">Sobrenome *</label>
                                    <input type="text" id="lastname" class="form-control form-control-sm" name="lastname"  >
                                    <span id="span_lastname" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="nickname" class="text-muted">Apelido *</label>
                                    <input type="text" id="nickname" class="form-control form-control-sm" name="nickname"  >
                                    <span id="span_nickname" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="age" class="text-muted">Idade *</label>
                                    <input type="number" id="age" class="form-control form-control-sm" name="age" min="16" max="99" step="1"  >
                                    <span id="span_age" class="invalid-feedback"> AAA</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="sex" class="text-muted">Sexo *</label>
                                    <select id="sex" class="form-control form-control-sm" name="sex" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                    <span id="span_sex" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="nationality" class="text-muted">Nacionalidade *</label>
                                    <select id="nationality" class="form-control form-control-sm" name="nationality" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        @foreach ($countries as $c)
                                            <option value="{{ $c->code }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="span_nationality" class="text-danger"></span>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group mt-3 mb-0">
                                    <label class="">Atributos</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-check mb-2">
                                    <input type="checkbox" class="form-check-input" name="mentor" id="mentor">
                                    <label class="form-check-label" for="mentor">Treinador</label>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="force" class="text-muted">Força *</label>
                                    <select id="force" class="form-control form-control-sm" name="force" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="1"> 1...40</option>
                                        <option value="2">20...60</option>
                                        <option value="3">40...75</option>
                                        {{-- <option value="4">60...100</option> --}}
                                    </select>
                                    <p class="small mt-2 mb-0 text-muted">Salário e passe iniciais são de acordo com o valor da força</p>
                                    <span id="span_force" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="role" class="text-muted">1ª Posição *</label>
                                    <select id="role" class="form-control form-control-sm" name="role" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="top" class="text-top" >Topo</option>
                                        <option value="jng" class="text-jng" >Selva</option>
                                        <option value="mid" class="text-mid" >Meio</option>
                                        <option value="adc" class="text-adc" >Atirador</option>
                                        <option value="sup" class="text-sup" >Suporte</option>
                                    </select>
                                    <span id="span_role" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="secondary_role" class="text-muted">2ª Posição *</label>
                                    <select id="secondary_role" class="form-control form-control-sm" name="secondary_role" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="top" class="text-top" >Topo</option>
                                        <option value="jng" class="text-jng" >Selva</option>
                                        <option value="mid" class="text-mid" >Meio</option>
                                        <option value="adc" class="text-adc" >Atirador</option>
                                        <option value="sup" class="text-sup" >Suporte</option>
                                    </select>
                                    <span id="span_secondary_role" class="text-danger"></span>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group form-check mt-3 mb-2">
                                    <input type="checkbox" class="form-check-input" name="add_team" id="add_team">
                                    <label class="form-check-label" for="add_team">Adicionar a um time?</label>
                                </div>
                            </div>
                            <div class="col-12 add_team d-none">
                                <div class="form-group">
                                    <label for="league_id" class="text-muted">Liga *</label>
                                    <select id="league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" >
                                        <option value="" selected disabled >Selecione...</option>
                                        @foreach ($leagues as $league)
                                            <option value="{{ $league->id }}">{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="span_league_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 add_team d-none">
                                <div class="form-group">
                                    <label for="division_id" class="text-muted">Divisão *</label>
                                    <select id="division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" disabled ></select>
                                    <span id="span_division_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 add_team d-none">
                                <div class="form-group">
                                    <label for="team_id" class="text-muted">Time *</label>
                                    <select id="team_id" class="form-control form-control-sm" name="team_id" style="width: 100%" disabled ></select>
                                    <span id="span_team_id" class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 pl-2 ml-auto">
                                <button type="submit" class="btn btn-success btn-sm btn-block" >Criar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT --}}
    <div id="edit-player" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="edit-player-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="edit-player-title" class="modal-title"></h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-player-form" action="" method="" >
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="edit_name" class="text-muted">Nome *</label>
                                    <input type="text" id="edit_name" class="form-control form-control-sm" name="name"  >
                                    <span id="span_edit_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="edit_lastname" class="text-muted">Sobrenome *</label>
                                    <input type="text" id="edit_lastname" class="form-control form-control-sm" name="lastname"  >
                                    <span id="span_edit_lastname" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="edit_nickname" class="text-muted">Apelido *</label>
                                    <input type="text" id="edit_nickname" class="form-control form-control-sm" name="nickname"  >
                                    <span id="span_edit_nickname" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="edit_age" class="text-muted">Idade *</label>
                                    <input type="number" id="edit_age" class="form-control form-control-sm" name="age" min="16" max="99" step="1"  >
                                    <span id="span_edit_age" class="invalid-feedback"> AAA</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="edit_sex" class="text-muted">Sexo *</label>
                                    <select id="edit_sex" class="form-control form-control-sm" name="sex" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                    <span id="span_edit_sex" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="edit_nationality" class="text-muted">Nacionalidade *</label>
                                    <select id="edit_nationality" class="form-control form-control-sm" name="nationality" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        @foreach ($countries as $c)
                                            <option value="{{ $c->code }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="span_edit_nationality" class="text-danger"></span>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group mt-3 mb-0">
                                    <label class="">Atributos</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-check mb-2">
                                    <input type="checkbox" class="form-check-input" name="mentor" id="edit_mentor">
                                    <label class="form-check-label" for="edit_mentor">Treinador</label>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="edit_force" class="text-muted">Força *</label>
                                    <select id="edit_force" class="form-control form-control-sm" name="force" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="1"> 1...40</option>
                                        <option value="2">20...60</option>
                                        <option value="3">40...75</option>
                                        {{-- <option value="4">60...100</option> --}}
                                    </select>
                                    <p class="small mt-2 mb-0 text-muted">Salário e passe iniciais são de acordo com o valor da força</p>
                                    <span id="span_edit_force" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="edit_role" class="text-muted">1ª Posição *</label>
                                    <select id="edit_role" class="form-control form-control-sm" name="role" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="top" class="text-top" >Topo</option>
                                        <option value="jng" class="text-jng" >Selva</option>
                                        <option value="mid" class="text-mid" >Meio</option>
                                        <option value="adc" class="text-adc" >Atirador</option>
                                        <option value="sup" class="text-sup" >Suporte</option>
                                    </select>
                                    <span id="span_role" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="edit_secondary_role" class="text-muted">2ª Posição *</label>
                                    <select id="edit_secondary_role" class="form-control form-control-sm" name="secondary_role" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="top" class="text-top" >Topo</option>
                                        <option value="jng" class="text-jng" >Selva</option>
                                        <option value="mid" class="text-mid" >Meio</option>
                                        <option value="adc" class="text-adc" >Atirador</option>
                                        <option value="sup" class="text-sup" >Suporte</option>
                                    </select>
                                    <span id="span_edit_secondary_role" class="text-danger"></span>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group form-check mt-3 mb-2">
                                    <input type="checkbox" class="form-check-input" name="add_team" id="edit_add_team">
                                    <label class="form-check-label" for="edit_add_team">Adicionar a um time?</label>
                                </div>
                            </div>
                            <div class="col-12 edit_add_team d-none">
                                <div class="form-group">
                                    <label for="edit_league_id" class="text-muted">Liga *</label>
                                    <select id="edit_league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" >
                                        <option value="" selected disabled >Selecione...</option>
                                        @foreach ($leagues as $league)
                                            <option value="{{ $league->id }}">{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="span_edit_league_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 edit_add_team d-none">
                                <div class="form-group">
                                    <label for="edit_division_id" class="text-muted">Divisão *</label>
                                    <select id="edit_division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" disabled ></select>
                                    <span id="span_edit_division_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 edit_add_team d-none">
                                <div class="form-group">
                                    <label for="edit_team_id" class="text-muted">Time *</label>
                                    <select id="edit_team_id" class="form-control form-control-sm" name="team_id" style="width: 100%" disabled ></select>
                                    <span id="span_edit_team_id" class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 pl-2 ml-auto">
                                <button type="submit" class="btn btn-success btn-sm btn-block" >Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- DELETE --}}
    @include('adm/partials.modal-delete', [
        'modalId' => 'del-player',
        'titleId' => 'del-player-title',
        'title'   => 'Apagar jogador',
        'formId'  => 'del-player-form',
        'text'    => 'Deseja realmente apagar esse(a) jogador(a)?',
    ])

@stop

@include('adm.footer')

@section('js')
    @include('adm/partials.filters-players')
    <script>
        // Bootstrap Table
        window.getbootstrapTable('players-table', {
            locale: 'pt-br',
            // height: 710,
            // pageSize: '100',
            // pagination: 'true',
            // paginationVAlign: 'top',
            // pageList: [100, 200, 300, 500, 'All'],
        });

        $("#nationality").select2();
        $("#sex").select2({ minimumResultsForSearch: Infinity });
        $("#role").select2({ minimumResultsForSearch: Infinity });
        $("#force").select2({ minimumResultsForSearch: Infinity });
        $("#secondary_role").select2({ minimumResultsForSearch: Infinity });

        $("#team_id").select2({ minimumResultsForSearch: Infinity });
        $("#league_id").select2({ minimumResultsForSearch: Infinity });
        $("#division_id").select2({ minimumResultsForSearch: Infinity });

        // SEE
        $(document).on('click', '.see-player', function() {
            let id        = $(this).data('id');
            let players   = {!! $players !!};
            let teams     = {!! $teams !!};
            let countries = {!! $countries !!};
            let html;
            let player;

            players.forEach(p => {
                if (p.id == id)
                {
                    player = p;
                    teams.forEach(t => {
                        if (t.id == player.team_id)
                        {
                            player.team_name     = t.name;
                            player.team_image    = t.image;
                            player.team_initials = t.initials;
                        }
                    });
                }
            });

            let team_name     = (player.team_name)     ? player.team_name     : '';
            let team_image    = (player.team_image)    ? player.team_image    : '';
            let team_initials = (player.team_initials) ? player.team_initials : '';

            // let rolTx1        = player.attribute.role;
            let rolTx1        = player.role;
            let role1         = window.formatteRoleFull(rolTx1)[0];

            // let rolTx2        = player.attribute.secondary_role;
            let rolTx2        = player.secondary_role;
            let role2         = window.formatteRoleFull(rolTx2)[0];

            // let force         = player.attribute.force;
            // let energy        = player.attribute.energy;
            // let salary        = window.formatCurrency(player.attribute.salary);
            // let pass          = window.formatCurrency(player.attribute.pass);
            let force         = player.force;
            let energy        = player.energy;
            let salary        = window.formatCurrency(player.salary);
            let pass          = window.formatCurrency(player.pass);

            let country       = window.getNameCountry(countries, player.nationality);
            let birthday      = window.formatDate(player.birthday);

            html =
                '<div class="col-12 border py-2 text-center">' +
                '   <p class="mb-1 " >Nacionalidade: <img src="images/flags/' + country[0] + '_64.png" alt="' + country[0] + '" title="' + country[1] + '" width="20px" height="20px"></p>' +
                '   <p class="mb-1 " >Sexo: <strong>' + player.sex + '</strong></p>' +
                '   <p class="mb-1 " >Idade: <strong>' + player.age + '</strong></p>' +
                '   <p class="mb-1 " >Aniversário: <strong>' + birthday + '</strong></p>' +
                '   <p class="mb-1 " >Posição primária: <strong class="text-' + rolTx1 + '" >' + role1 + '</strong></p>' +
                '   <p class="mb-1 " >Posição secundária: <strong class="text-' + rolTx2 + '" >' + role2 + '</strong></p>' +
                '   <p class="mb-1 " >Força: <strong>' + force + '</strong></p>' +
                '   <p class="mb-1 " >Energia: <strong>' + energy + '%</strong></p>' +
                '   <p class="mb-1 " >Salário: <strong>R$ ' + salary + '</strong></p>' +
                '   <p class="mb-1 " >Passe: <strong>R$ ' + pass + '</strong></p>' +
                '   <p class="mb-0 " >Time atual: <strong>' + team_name + '</strong></p>' +
                '</div>';

            $('#player-attr').html(html);

            let path = 'images/game/leagues/teams/';
            if (window.validateImage(path, team_image)) {
                $('#see-player-image').attr('src', path + team_image).attr('alt', team_initials);
            } else {
                $('#see-player-image').attr('src', path + 'default.png').attr('alt', team_initials);
            }

            $('#see-player-title').html(player.name + ' "<strong>' + player.nickname + '</strong>" ' + player.lastname);
            $('#see-player').modal('show');
        });

        // NEW
        $(document).on('click', '.new-player', function() {
            $('#name').val('');
            $('#lastname').val('');
            $('#nickname').val('');
            $('#age').val('');
            $('#mentor').prop( "checked", false );
            $('#nationality').val('').trigger('change');
            $('#sex').val('').trigger('change');
            $('#force').val('').trigger('change');
            $('#role').val('').trigger('change');
            $('#secondary_role').val('').trigger('change');

            $('#new-player').modal('show');
        });
        $('#league_id').on('change', function () {
            $('#division_id').removeAttr('disabled');
            insertDivisions('division_id', false, this.value);
        });
        $('#division_id').on('change', function () {
            $('#team_id').removeAttr('disabled');
            insertTeams('team_id', false, this.value);
        });
        $('#new-player-form').on('submit', function(e) {
            e.preventDefault();

            clearInvalid();
            clearSpan();

            $.ajax({
                type: 'POST',
                url: '{{ url("/players") }}',
                data: $('#new-player-form').serialize(),
                success: function ( data ) {
                    // console.log( data );
                    location.reload();
                },
                error: function ( err ) {
                    if ( err.status == 422 )
                    {
                        showErrors( err );
                    }
                    console.log( err );
                }
            });
        });

        // EDIT
        $(document).on('click', '.edit-player', function() {
            $("#edit_nationality").select2();
            $("#edit_sex").select2({ minimumResultsForSearch: Infinity });
            $("#edit_force").select2({ minimumResultsForSearch: Infinity });
            $("#edit_role").select2({ minimumResultsForSearch: Infinity });
            $("#edit_secondary_role").select2({ minimumResultsForSearch: Infinity });
            $("#edit_league_id").select2({ minimumResultsForSearch: Infinity });
            $("#edit_division_id").select2({ minimumResultsForSearch: Infinity });
            $("#edit_team_id").select2({ minimumResultsForSearch: Infinity });

            let id      = $(this).data('id');

            $('#edit-player-form').attr('action', '{{ url("/players") }}' + '/' + id).attr('method', 'POST');

            $.ajax({
                type: 'GET',
                url: '{{ url("/players") }}' + '/' + id,
                success: function ( data ) {
                    // console.log( data );
                    let player = data;

                    $('#edit-player-title').html('Editar time: ' + player.name + ' "' + player.nickname + '" ' + player.lastname);

                    // var newOption = new Option(player.attribute.force, player.attribute.force, true, true);
                    var newOption = new Option(player.force, player.force, true, true);
                    $('#edit_force').append(newOption).trigger('change').attr('disabled', 'disabled');

                    $('#edit_name').val(player.name);
                    $('#edit_lastname').val(player.lastname);
                    $('#edit_nickname').val(player.nickname);
                    $('#edit_age').val(player.age);
                    $('#edit_mentor').prop( "checked", (player.mentor ? true : false) );
                    $('#edit_nationality').val(player.nationality).trigger('change');
                    $('#edit_sex').val(player.sex).trigger('change');

                    // $('#edit_role').val(player.attribute.role).trigger('change');
                    $('#edit_role').val(player.role).trigger('change');
                    window.selectRoleWithColor( document.getElementById('select2-edit_role-container') );

                    // $('#edit_secondary_role').val(player.attribute.secondary_role).trigger('change');
                    $('#edit_secondary_role').val(player.secondary_role).trigger('change');
                    window.selectRoleWithColor( document.getElementById('select2-edit_secondary_role-container') );

                    if (player.team)
                    {
                        $('#edit_add_team').prop( "checked", true );
                        $('.edit_add_team').removeClass('d-none');

                        $('#edit_league_id').val(player.team.league_id).trigger('change');

                        insertDivisions('edit_division_id', true, player.team.league_id, player.team.division_id);
                        $('#edit_division_id').removeAttr('disabled');

                        insertTeams('edit_team_id', (player.team.division_id ? true : false), (player.team.division_id ? player.team.division_id : 0), player.team.id);
                        $('#edit_team_id').removeAttr('disabled');
                    }
                    else
                    {
                        $('#edit_add_team').prop( "checked", false );
                        $('.edit_add_team').addClass('d-none');

                        $('#edit_league_id').val('').trigger('change');
                        $('#edit_division_id').val('').trigger('change').attr('disabled', 'disabled');
                        $('#edit_team_id').val('').trigger('change').attr('disabled', 'disabled');
                    }

                    $('#edit-player').modal('show');
                },
                error: function ( err ) {
                    console.log( err );
                }
            });
        });
        $('#edit_league_id').on('change', function () {
            $('#edit_division_id').removeAttr('disabled');
            insertDivisions('edit_division_id', false, this.value);
        });
        $('#edit_division_id').on('change', function () {
            $('#edit_team_id').removeAttr('disabled');
            insertTeams('edit_team_id', false, this.value);
        });

        // DEL
        $(document).on('click', '.del-player', function() {
            $('#del-player-title').html($(this).data('name'));
            $('#del-player-form').attr('data-id', $(this).data('id'));
            $('#del-player').modal('show');
        });
        $('#del-player-form').on('submit', function(e) {
            e.preventDefault();

            let url  = '{{ url("/players") }}' + '/' + $(this).data('id');
            let data = $('#del-player-form').serialize();
            window.deleteItem(url, data);
        });


        $('#role').on('change', function() {
            window.selectRoleWithColor( document.getElementById('select2-role-container') );
        });
        $('#edit_role').on('change', function() {
            window.selectRoleWithColor( document.getElementById('select2-edit_role-container') );
        });
        $('#search_role').on('change', function() {
            window.selectRoleWithColor( document.getElementById('select2-search_role-container') );
        });
        $('#secondary_role').on('change', function() {
            window.selectRoleWithColor( document.getElementById('select2-secondary_role-container') );
        });
        $('#edit_secondary_role').on('change', function() {
            window.selectRoleWithColor( document.getElementById('select2-edit_secondary_role-container') );
        });
        $('#search_secondary_role').on('change', function() {
            window.selectRoleWithColor( document.getElementById('select2-search_secondary_role-container') );
        });
        $('#add_team').on('change', function() {
            if ( $(this).is(':checked'))
            {
                $('.add_team').removeClass('d-none');
            }
            else
            {
                $('.add_team').addClass('d-none');
            }
        });
        $('#edit_add_team').on('change', function() {
            if ( $(this).is(':checked'))
            {
                $('.edit_add_team').removeClass('d-none');
            }
            else
            {
                $('.edit_add_team').addClass('d-none');
            }
        });

        // INSERT DIVISIONS
        window.insertDivisions = function (id, edit = false, league_id, division_id)
        {
            let divisions = {!! $divisions !!};
            let opts      = '<option value="" ' + (edit ? '' : 'selected') + ' disabled hidden >Selecione...</option>';

            divisions.forEach(division => {
                if (division.league_id == league_id)
                {
                    let selected = (division.id == division_id) ? 'selected' : '';
                    opts += '<option value="' + division.id + '" ' + selected + ' >' + division.name + '</option>';
                }
            });

            opts += '<option value="0"' + ((division_id === null ) ? 'selected' : '') + '>Sem divisão</option>';

            $('#' + id).html(opts);
        }

        // INSERT DIVISIONS
        window.insertTeams = function (id, edit = false, division_id, team_id)
        {
            let teams = {!! $teams !!};
            let opts  = '<option value="" ' + (edit ? '' : 'selected') + ' disabled hidden >Selecione...</option>';

            teams.forEach(team => {
                if (team.division_id == division_id)
                {
                    let selected = (team.id == team_id) ? 'selected' : '';
                    opts += '<option value="' + team.id + '" ' + selected + ' >' + team.name + '</option>';
                }

                if (team.division_id === null && division_id == 0)
                {
                    let selected = (team.id == team_id) ? 'selected' : '';
                    opts += '<option value="' + team.id + '" ' + selected + ' >' + team.name + '</option>';
                }
            });

            $('#' + id).html(opts);
        }

        window.selectRoleWithColor = function (elem)
        {
            switch ( $(elem).attr('title') ) {
                case 'Topo':
                    $(elem).css('color', '#F8C300').addClass('text-bold');
                    break;
                case 'Selva':
                    $(elem).css('color', '#A652BB').addClass('text-bold');
                    break;
                case 'Meio':
                    $(elem).css('color', '#0099E1').addClass('text-bold');
                    break;
                case 'Atirador':
                    $(elem).css('color', '#F93A2F').addClass('text-bold');
                    break;
                case 'Suporte':
                    $(elem).css('color', '#00C09A').addClass('text-bold');
                    break;
                default:
                    $(elem).css('color', '#444').removeClass('text-bold');
                    break;
            }
        }

    </script>
@endsection