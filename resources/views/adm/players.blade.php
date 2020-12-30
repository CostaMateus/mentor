@extends('adminlte::page')

@section('title_prefix', 'Jogadores')

@section('css')
    <style></style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Jogadores</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 pb-3">
            <button type="button" class="btn btn-secondary btn-sm new-player" >
                <i class="fas fa-plus "></i> Novo jogador
            </button>
        </div>

        <div class="col-12 table-responsive pb-2">
            <table id="players-table" class="table table-striped table-sm" data-toggle="table" >
                <thead>
                    <tr class="bg-light">
                        <th class="text-center" data-field="id"          data-sortable="true" >#</th>
                        <th class=""            data-field="name"        data-sortable="true" >Nome</th>
                        <th class="text-center" data-field="role1"       data-sortable="true" title="Posição primária"   >1ª Pos.</th>
                        <th class="text-center" data-field="role2"       data-sortable="true" title="Posição secundária" >2ª Pos.</th>
                        <th class="text-center" data-field="age"         data-sortable="true" >Idade</th>
                        <th class="text-center" data-field="sex"         data-sortable="true" >Sexo</th>
                        <th class="text-center" data-field="nationality" data-sortable="true" title="Nacionalidade" >Nac.</th>
                        <th class="text-center" data-field="employed"    data-sortable="true" >Contrato</th>
                        <th class="text-center"                                               >Ver</th>
                        <th class="text-center"                                               >Editar</th>
                        <th class="text-center"                                               >Excluir</th>
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
                            $rolTx1 = $player->attribute->role;
                            $rolTx2 = $player->attribute->secondary_role;

                            $role1  = Helper::formatteRole($rolTx1);
                            $role2  = Helper::formatteRole($rolTx2);
                        @endphp
                        <tr>
                            <td class="text-center"                              >{{ $loop->iteration }}</td>
                            <td class=""                                         >{{ $player->name }} "{{ $player->nickname }}" {{ $player->lastname }}</td>
                            <td class="text-center text-bold text-{{ $rolTx1 }}" >{{ $role1 }}</td>
                            <td class="text-center text-bold text-{{ $rolTx2 }}" >{{ $role2 }}</td>
                            <td class="text-center"                              >{{ $player->age }}</td>
                            <td class="text-center"                              >{{ $player->sex }}</td>
                            <td class="text-center" >
                                <img class="my-auto flag" src="images/flags/{{ $player->nationality }}_64.png" alt="{{ $player->nationality }}" title="{{ Helper::getNameCountry($player->nationality) }}" width="30px" height="30px">
                            </td>
                            <td class="text-center" >
                                @if ($player->employed)
                                    {{-- <i class="fas fa-check"></i> --}}
                                    {{ $player->team_initials }}
                                @endif
                            </td>

                            <td class="text-center" >
                                <button class="btn btn-link text-dark see-player" data-id="{{ $player->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-primary edit-player" data-id="{{ $player->id }}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="text-center" >
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
                    <form id="new-player-form" action="{{ url("/players") }}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome *</label>
                                    <input type="text" id="name" class="form-control form-control-sm" name="name" required >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="lastname" class="text-muted">Sobrenome *</label>
                                    <input type="text" id="lastname" class="form-control form-control-sm" name="lastname" required >
                                    <span id="span_lastname" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="nickname" class="text-muted">Apelido *</label>
                                    <input type="text" id="nickname" class="form-control form-control-sm" name="nickname" required >
                                    <span id="span_nickname" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="age" class="text-muted">Idade *</label>
                                    <input type="number" id="age" class="form-control form-control-sm" name="age" min="16" max="99" step="1" required >
                                    <span id="span_age" class="invalid-feedback"></span>
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
                                    <input type="checkbox" class="form-check-input" id="mentor">
                                    <label class="form-check-label" for="mentor">Treinador</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
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
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="role" class="text-muted">Posição *</label>
                                    <select id="role" class="form-control form-control-sm" name="role" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="Top">Topo</option>
                                        <option value="Jng">Selva</option>
                                        <option value="Mid">Meio</option>
                                        <option value="Adc">Atirador</option>
                                        <option value="Sup">Suporte</option>
                                    </select>
                                    <span id="span_role" class="text-danger"></span>
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
    {{-- <div id="edit-player" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="edit-player-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="edit-player-title" class="modal-title"></h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-player-form" action="" method="" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_league_id" class="text-muted">Liga *</label>
                                    <select id="edit_league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" >
                                        <option value="">Selecione...</option>
                                    </select>
                                    <input type="hidden" id="edit_league_id_hidden" name="league_id">
                                    <span id="span_league_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_division_id" class="text-muted">Divisão *</label>
                                    <select id="edit_division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" ></select>
                                    <span id="span_division_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="edit_name" class="text-muted">Nome do time *</label>
                                    <input type="text" id="edit_name" class="form-control form-control-sm" name="name" >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="edit_initials" class="text-muted">Sigla *</label>
                                    <input type="text" id="edit_initials" class="form-control form-control-sm" name="initials" >
                                    <span id="span_initials" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="edit_image" class="text-muted">Imagem</label>
                                    <input id="edit_image" type="file" class="form-control-file" name="image">
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
    </div> --}}

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
    <script>
        // Bootstrap Table
        window.getbootstrapTable('players-table', {
            locale: 'pt-br',
            // height: 710,
            // pageSize: '25',
            // pagination: 'true',
            // paginationVAlign: 'top',
            // pageList: [25, 50, 100, 200, 'All'],
        });

        $("#nationality").select2();
        $("#sex").select2({ minimumResultsForSearch: Infinity });
        $("#force").select2({ minimumResultsForSearch: Infinity });
        $("#role").select2({ minimumResultsForSearch: Infinity });

        // SEE
        $(document).on('click', '.see-player', function() {
            let id        = $(this).data('id');
            let data      = {!! $data !!};
            let teams     = {!! $teams !!};
            let countries = {!! $countries !!};
            let html;
            let player;

            console.log(countries);

            data.forEach(p => {
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
            console.log(player.nationality);

            let team_name     = (player.team_name)     ? player.team_name     : '';
            let team_image    = (player.team_image)    ? player.team_image    : '';
            let team_initials = (player.team_initials) ? player.team_initials : '';

            let rolTx1        = player.attribute.role;
            let role1         = window.formatteRoleFull(rolTx1)[0];

            let rolTx2        = player.attribute.secondary_role;
            let role2         = window.formatteRoleFull(rolTx2)[0];

            let force         = player.attribute.force;
            let energy        = player.attribute.energy;
            let salary        = window.formatCurrency(player.attribute.salary);
            let pass          = window.formatCurrency(player.attribute.pass);

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
            // getLeagues('#league_id');
            $('#new-player').find('#name').val('');
            $('#new-player').find('#initials').val('');
            $('#new-player').find('#nrdivisions').val('').removeAttr('disabled');
            $('#new-player').modal('show');
        });
        $('#league_id').on('change', function () {
            $('#division_id').removeAttr('disabled');
            insertDivisions('division_id', false, this.value.split('.')[0]);
        });

        // EDIT
        $(document).on('click', '.edit-player', function() {
            let id      = $(this).data('id');
            // let teams = ;

            $('#edit-team-form').attr('action', '{{ url("/teams") }}' + '/' + id);
            $('#edit-team-form').attr('method', 'POST');

            teams.forEach(team => {
                if (team.id == id)
                {
                    $('#edit-team').find('#edit-team-title').html('Editar time: ' + team.name);
                    $('#edit_league_id').attr('disabled', '').val(team.league_id).trigger('change');
                    $('#edit_league_id_hidden').val(team.league_id + '.' + team.league_initials);

                    insertDivisions('edit_division_id', true, team.division_league_id, team.division_id);

                    $('#edit-team').find('#edit_name').val(team.name);
                    $('#edit-team').find('#edit_initials').val(team.initials);
                    $('#edit-team').modal('show');
                }
            });
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


    </script>
@endsection