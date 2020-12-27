@extends('adminlte::page')

@section('title', 'Mentor')

@section('css')
    <style></style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Jogadores</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 pb-3">
            <button type="button" class="btn btn-secondary btn-sm new-team" >
                <i class="fas fa-plus "></i> Novo jogador
            </button>
        </div>

        <div class="col-12 table-responsive pb-2">
            <table id="players-table" class="table table-striped table-sm" data-toggle="table" >
                <thead>
                    <tr class="bg-light">
                        <th class="text-center" data-field="id"          data-sortable="true" >#</th>
                        <th class=""            data-field="name"        data-sortable="true" >Nome</th>
                        <th class="text-center" data-field="role"        data-sortable="true" >Posição</th>
                        <th class="text-center" data-field="age"         data-sortable="true" >Idade</th>
                        <th class="text-center" data-field="sex"         data-sortable="true" >Sexo</th>
                        <th class="text-center" data-field="nationality" data-sortable="true" >Nac.</th>
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
                        <tr>
                            <td class="text-center" >{{ $loop->iteration }}</td>
                            <td class=""            >{{ $player->name }} "{{ $player->nickname }}" {{ $player->lastname }}</td>
                            <td class="text-center" >{{ Helper::formatteRole($player->attribute->role) }}</td>
                            <td class="text-center" >{{ $player->age }}</td>
                            <td class="text-center" >{{ $player->sex }}</td>
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
                                <button class="btn btn-link text-danger del-player" data-id="{{ $player->id }}" >
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
    {{-- <div id="new-player" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="new-player-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="new-player-title" class="modal-title">Nova liga</h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="new-player-form" action="{{ url("/players") }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="league_id" class="text-muted">Liga *</label>
                                    <select id="league_id" class="form-control form-control-sm" name="league_id" style="width: 100%">
                                        <option value="">Selecione...</option>
                                    </select>
                                    <span id="span_league_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="division_id" class="text-muted">Divisão *</label>
                                    <select id="division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" disabled ></select>
                                    <span id="span_division_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome do time *</label>
                                    <input type="text" id="name" class="form-control form-control-sm" name="name" >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="initials" class="text-muted">Sigla *</label>
                                    <input type="text" id="initials" class="form-control form-control-sm" name="initials" >
                                    <span id="span_initials" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="image" class="text-muted">Imagem</label>
                                    <input id="image" type="file" class="form-control-file" name="image">
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
    {{-- <div id="del-player" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="del-player-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header text-danger">
                    <h5 id="del-player-title" class="modal-title">Apagar time</h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="del-player-form" action="#" method="#" >
                        @csrf
                        <div class="row">
                            <div class="col-12 text-center">
                                <p>Deseja realmente apagar esse time?</p>
                            </div>
                            <div class="col-3 mx-auto">
                                <button type="submit" class="btn btn-danger btn-sm btn-block" >Confirmar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

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

        // $("#league_id").select2({ minimumResultsForSearch: Infinity });

        // SEE
        $(document).on('click', '.see-player', function() {
            let id        = $(this).data('id');
            let data      = {!! $data !!};
            let teams     = {!! $teams !!};
            let countries = {!! $countries !!};
            let html;
            let player;

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

            let team_name     = (player.team_name)     ? player.team_name     : '';
            let team_image    = (player.team_image)    ? player.team_image    : '';
            let team_initials = (player.team_initials) ? player.team_initials : '';

            let role          = window.formatteRoleFull(player.attribute.role)[0];

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
                '   <p class="mb-1 " >Posição: <strong>' + role + '</strong></p>' +
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
        $(document).on('click', '.new-team', function() {
            // getLeagues('#league_id');
            $('#new-team').find('#name').val('');
            $('#new-team').find('#initials').val('');
            $('#new-team').find('#nrdivisions').val('').removeAttr('disabled');
            $('#new-team').modal('show');
        });
        $('#league_id').on('change', function () {
            $('#division_id').removeAttr('disabled');
            insertDivisions('division_id', false, this.value.split('.')[0]);
        });

        // EDIT
        $(document).on('click', '.edit-team', function() {
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
        $(document).on('click', '.del-team', function() {
            $('#del-team-form').attr('data-id', $(this).data('id'));
            $('#del-team').modal('show');
        });
        $('#del-team-form').on('submit', function(e) {
            e.preventDefault();

            let url  = '{{ url("/teams") }}' + '/' + $(this).data('id');
            let data = $('#del-team-form').serialize();
            window.deleteItem(url, data);
        });


    </script>
@endsection