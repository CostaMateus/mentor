@extends('adminlte::page')

@section('title_prefix', 'Times')

@section('css')
    <style>
        .striped { background-color: rgba(0,0,0,.05) !important; }
    </style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Times</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 pb-3">
            <button type="button" class="btn btn-secondary btn-sm new-team" >
                <i class="fas fa-plus "></i> Novo time
            </button>
        </div>

        <div class="col-12 table-responsive pb-2">
            <table id="teams-table" class="table table-striped table-sm" data-toggle="table" >
                <thead>
                    <tr class="bg-light">
                        <th class="text-center" data-field="id"       data-sortable="true" >#</th>
                        <th class="text-center"                                            >Logo</th>
                        <th class=""            data-field="name"     data-sortable="true" >Nome</th>
                        <th class="text-center" data-field="initials" data-sortable="true" >Sigla</th>
                        <th class="text-center" data-field="league"   data-sortable="true" >Liga</th>
                        <th class="text-center" data-field="division" data-sortable="true" >Divisão</th>
                        <th class="text-center" data-field="players"  data-sortable="true" >Nº Jogadores</th>
                        <th class="text-center"                                            >Ver</th>
                        <th class="text-center"                                            >Editar</th>
                        <th class="text-center"                                            >Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $team)
                        <tr>
                            <td class="text-center" >{{ $loop->iteration }}</td>
                            <td class="text-center" >
                                <button type="button" class="btn icon-team" data-image="{{ $team->image }}">
                                    @if (file_exists(public_path('images/game/leagues/teams/' . $team->image)))
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/teams/' . $team->image) }}" alt="{{ $team->initials }}" width="50px" height="50px">
                                    @else
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/teams/default.png') }}" alt="{{ $team->initials }}" width="50px" height="50px">
                                    @endif
                                </button>
                            </td>
                            <td class=""            >{{ $team->name }}</td>
                            <td class="text-center" >{{ $team->initials }}</td>
                            <td class="text-center" >{{ $team->league_initials }}</td>
                            <td class="text-center" >{{ $team->division_initials }}</td>
                            <td class="text-center" >{{ $team->total_players }}</td>

                            <td class="text-center" >
                                <button class="btn btn-link text-dark see-team" data-id="{{ $team->id }}"
                                                                                data-name="{{ $team->name }}"
                                                                                data-initials="{{ $team->initials }}"
                                                                                data-image="{{ $team->image }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-primary edit-team" data-id="{{ $team->id }}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-danger del-team" data-id="{{ $team->id }}"
                                                                                  data-name="{{ $team->name }}">
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
        'modalId' => 'see-team',
        'title'   => 'see-team-title',
        'image'   => 'see-team-image',
        'body'    => 'team-players',
    ])

    {{-- NEW --}}
    <div id="new-team" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="new-team-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="new-team-title" class="modal-title">Nova liga</h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="new-team-form" action="" method="" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="league_id" class="text-muted">Liga *</label>
                                    <select id="league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" required >
                                        <option value="">Selecione...</option>
                                        @foreach ($leagues as $league)
                                            <option value="{{ $league->id }}.{{ $league->initials }}">{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="span_league_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="division_id" class="text-muted">Divisão *</label>
                                    <select id="division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" disabled required ></select>
                                    <span id="span_division_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome do time *</label>
                                    <input type="text" id="name" class="form-control form-control-sm" name="name" required >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="initials" class="text-muted">Sigla *</label>
                                    <input type="text" id="initials" class="form-control form-control-sm" name="initials" required >
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
                                <button type="submit" class="btn btn-success btn-sm btn-block" >Criar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT --}}
    <div id="edit-team" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="edit-team-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="edit-team-title" class="modal-title"></h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-team-form" action="" method="" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_league_id" class="text-muted">Liga *</label>
                                    <select id="edit_league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" required >
                                        <option value="">Selecione...</option>
                                        @foreach ($leagues as $league)
                                            <option value="{{ $league->id }}">{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="edit_league_id_hidden" name="league_id">
                                    <span id="span_league_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_division_id" class="text-muted">Divisão *</label>
                                    <select id="edit_division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" required ></select>
                                    <span id="span_division_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="edit_name" class="text-muted">Nome do time *</label>
                                    <input type="text" id="edit_name" class="form-control form-control-sm" name="name" required >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="edit_initials" class="text-muted">Sigla *</label>
                                    <input type="text" id="edit_initials" class="form-control form-control-sm" name="initials" required >
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
    </div>

    {{-- DELETE --}}
    @include('adm/partials.modal-delete', [
        'modalId' => 'del-team',
        'titleId' => 'del-team-title',
        'title'   => 'Apagar time',
        'formId'  => 'del-team-form',
        'text'    => 'Deseja realmente apagar essa liga?',
    ])

    {{-- ICON --}}
    @include('adm/partials.modal-icon', ['modalId' => 'icon-team'])
@stop

@include('adm.footer')

@section('js')
    <script>
        // Bootstrap Table
        window.getbootstrapTable('teams-table', {
            locale: 'pt-br',
            // height: 710,
            // pageSize: '25',
            // pagination: 'true',
            // paginationVAlign: 'top',
            // pageList: [25, 50, 100, 200, 'All'],
        });

        $("#league_id").select2({ minimumResultsForSearch: Infinity });
        $("#division_id").select2({ minimumResultsForSearch: Infinity });

        $("#edit_league_id").select2({ minimumResultsForSearch: Infinity });
        $("#edit_division_id").select2({ minimumResultsForSearch: Infinity });

        // SEE
        $(document).on('click', '.see-team', function() {
            let id        = $(this).data('id');
            let name      = $(this).data('name');
            let initials  = $(this).data('initials');
            let image     = $(this).data('image');
            let players   = {!! $players !!};
            let countries = {!! $countries !!};
            let html      = '';
            let count     = 0;

            html +=
                '<div class="col-12 border">' +
                '    <div class="row my-2">';

            players.forEach(player => {
                let rolTx1  = player.attribute.role;
                let aux_r   = window.formatteRoleFull(rolTx1);
                let role1   = aux_r[0];
                let order   = aux_r[1];

                let rolTx2  = player.attribute.secondary_role;
                let role2   = window.formatteRoleFull(rolTx2)[0];

                let force   = player.attribute.force;
                let energy  = player.attribute.energy;
                let salary  = window.formatCurrency(player.attribute.salary);
                let pass    = window.formatCurrency(player.attribute.pass);

                let country = window.getNameCountry(countries, player.nationality);

                if (player.team_id == id)
                {
                    let aux = new Date(player.attribute.contract);
                    let d   = ("0" + aux.getDate()).slice(-2);
                    let m   = ("0" + (aux.getMonth() + 1)).slice(-2);
                    let y   = aux.getFullYear();
                    let ctt = d + "/" + m + "/" + y;

                    count++;
                    html +=
                        '<div class="col-6 my-1 d-flex order-' + ((player.mentor) ? '0' : order) + ' ">' +
                        '    <div class="my-auto mr-1">' +
                        '        <i class="fas fa-user" ' + ((player.mentor) ? '' : 'style="color:#6c757d;"') + ' ></i>' +
                        '    </div>' +
                        '    <div class="flex-fill align-self-center striped p-2">' +
                        '        <p class="mb-0 small" title="Posição primária e secundária" >' +
                                    ((player.mentor) ? '<strong>Treinador</strong> | ' : '' ) +
                        '           1ª pos. <strong class="text-' + rolTx1 + '" >' + role1 + '</strong> | ' +
                        '           2º pos. <strong class="text-' + rolTx2 + '" >' + role2 + '</strong>' +
                        '        </p>' +
                        '        <p class="mb-0 " >' + player.name + ' "<strong>' + player.nickname + '</strong>" ' + player.lastname + '</p>' +
                        '        <p class="mb-0 " >Sexo: ' + player.sex + ' | Idade: ' + player.age + ' | Nacionalidade: <img src="images/flags/' + country[0] + '_64.png" alt="' + country[0] + '" title="' + country[1] + '" width="20px" height="20px"></p>' +
                        '        <p class="mb-0 " >Força: ' + force + ' | Energia: ' + energy + '%</p>' +
                        '        <p class="mb-0 " >Salário: R$ ' + salary + ' | Passe: R$ ' + pass + '</p>' +
                        '        <p class="mb-0 " >Contrato até: ' + ctt + '</p>' +
                        '    </div>' +
                        '</div>';
                }
            });

            html +=
                '    </div>' +
                '</div>';

            if ( count == 0 )
            {
                html =
                    '<div class="col-12 border text-center">' +
                    '   <p class="mt-3 mb-0">Nenhum jogadore encontrado.<p>' +
                    '</div>';
            }

            $('#team-players').html(html);

            let path = 'images/game/leagues/teams/';
            if (window.validateImage(path, image)) {
                $('#see-team-image').attr('src', path + image).attr('alt', initials);
            } else {
                $('#see-team-image').attr('src', path + 'default.png').attr('alt', initials);
            }

            $('#see-team-title').html(name + " - " + initials);
            $('#see-team').modal('show');
        });

        // NEW
        $(document).on('click', '.new-team', function() {
            $('#new-team-form').attr('action', '{{ url("/teams") }}');
            $('#new-team-form').attr('method', 'POST');

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

            $('#edit-team-form').attr('action', '{{ url("/teams") }}' + '/' + id).attr('method', 'POST');

            $.ajax({
                type: 'GET',
                url: '{{ url("/teams") }}' + '/' + id,
                success: function ( data ) {
                    // console.log( data );
                    let team = data[0];

                    let edit = $('#edit-team');

                    edit.find('#edit-team-title').html('Editar time: ' + team.name);
                    $('#edit_league_id').attr('disabled', '').val(team.league_id).trigger('change');
                    $('#edit_league_id_hidden').val(team.league_id + '.' + team.league_initials);

                    insertDivisions('edit_division_id', true, team.league_id, team.division_id);

                    edit.find('#edit_name').val(team.name);
                    edit.find('#edit_initials').val(team.initials);
                    edit.modal('show');
                },
                error: function ( err ) {
                    console.log( err );
                }
            });
        });

        // DEL
        $(document).on('click', '.del-team', function() {
            $('#del-team-title').html($(this).data('name'));
            $('#del-team-form').attr('data-id', $(this).data('id'));
            $('#del-team').modal('show');
        });
        $('#del-team-form').on('submit', function(e) {
            e.preventDefault();

            let url  = '{{ url("/teams") }}' + '/' + $(this).data('id');
            let data = $('#del-team-form').serialize();
            window.deleteItem(url, data);
        });

        // ICON - Team
        $(document).on('click', '.icon-team', function() {
            let id    = 'icon-team';
            let path  = 'images/game/leagues/teams/';
            let image = $(this).data('image');

            window.showImage(id, path, image);
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

            opts += '<option value="0"' + ((division_id === null) ? 'selected' : '') + '>Sem divisão</option>';

            $('#' + id).html(opts);
            $('#' + id).select2({ minimumResultsForSearch: Infinity });
        }


    </script>
@endsection