@extends('adminlte::page')

@section('title', 'Mentor')

@section('css')
    <style>
        table tr td {
            vertical-align: middle!important;
        }
        .bg-img-team { background-color: #ABB9C0; border-radius: 4px; max-height: 140px; max-width: 140px; }
        .bg-img-team-max { background-color: #ABB9C0; border-radius: 10px; max-height: 400px; max-width: 400px; }
        #icon-team .modal-body,
        #icon-league .modal-body { border-radius: .3rem; box-shadow: 0 0.5rem 1rem rgba(0,0,0,.5); }
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
                        <th class=""            data-field="initials" data-sortable="true" >Sigla</th>
                        <th class="text-center"                                            >Liga</th>
                        <th class="text-center" data-field="division" data-sortable="true" >Divisão</th>
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
                                <button type="button" class="btn icon-team" data-img="{{ $team->image }}">
                                    @if (file_exists(public_path('images/game/leagues/teams/' . $team->image)))
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/teams/' . $team->image) }}" alt="{{ $team->initials }}" width="50px" height="50px">
                                    @else
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/teams/default.png') }}" alt="{{ $team->initials }}" width="50px" height="50px">
                                    @endif
                                </button>
                            </td>
                            <td class=""            >{{ $team->name }}</td>
                            <td class=""            >{{ $team->initials }}</td>
                            <td class="text-center" >
                                <button type="button" class="btn icon-league" data-img="{{ $team->league_image }}">
                                    @if (file_exists(public_path('images/game/leagues/' . $team->league_image)))
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/' . $team->league_image) }}" alt="{{ $team->league_initials }}" width="50px" height="50px">
                                    @else
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/default.png') }}" alt="{{ $team->league_initials }}" width="50px" height="50px">
                                    @endif
                                </button>
                            </td>
                            <td class="text-center" >{{ $team->division_initials }}</td>

                            <td class="text-center" >
                                <button class="btn btn-link text-dark see-team" data-id="{{ $team->id }}" data-name="{{ $team->name }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-primary edit-team" data-id="{{ $team->id }}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-danger del-team" data-id="{{ $team->id }}" >
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
    <div id="see-league" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="see-team-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title h4" id="see-team-title"></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="team-divisions" class="row "></div>
                </div>
            </div>
        </div>
    </div>

    {{-- NEW --}}
    <div id="new-team" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="new-team-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="new-team-title">Nova liga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="new-team-form" action="{{ url("/teams") }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="league_id" class="text-muted">Liga *</label>
                                    <select id="league_id" class="form-control form-control-sm" name="league_id" style="width: 100%">
                                        <option value="">Selecione...</option>
                                        @foreach ($leagues as $league)
                                            <option value="{{ $league->id }}">{{ $league->name }}</option>
                                        @endforeach
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
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome do time *</label>
                                    <input type="text" id="name" class="form-control form-control-sm" name="name" >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="initials" class="text-muted">Sigla *</label>
                                    <input type="text" id="initials" class="form-control form-control-sm" name="initials" >
                                    <span id="span_initials" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 pl-md-2">
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
    </div>

    {{-- EDIT --}}
    <div id="edit-team" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="edit-team-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-team-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                    <select id="edit_league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" >
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
    </div>

    {{-- DELETE --}}
    <div id="del-team" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="del-team-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header text-danger">
                    <h5 class="modal-title" id="del-team-title">Apagar time</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="del-team-form" action="#" method="#" >
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
    </div>

    {{-- ICON --}}
    <div id="icon-team" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="icon-team-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="mx-auto">
                <div class="modal-body text-center">
                    <img class="bg-img-team-max" src="" width="400px" height="400px">
                </div>
            </div>
        </div>
    </div>
@stop

@include('adm.footer')

@section('js')
    <script>
        // Bootstrap Table
        $('#teams-table').bootstrapTable({
            locale: 'pt-br'
        });

        // SEE
        {{--
        $(document).on('click', '.see-team', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');

            var url = '/leagues/' + id + '/divisions';

            $.ajax({
                type: 'GET',
                url: url,
                success: function (divisions) {
                    var html = '';

                    divisions.forEach(division => {
                        html +=
                            '<div class="col-12 col-md-6 border">' +
                            '    <div class="row my-2">' +
                            '        <div class="col-12">' +
                            '            <p class="h6 text-bold" >' + division.name + '</p>' +
                            '        </div>'
                        ;

                        division.teams.forEach(team => {
                            html +=
                                '<div class="col-6 my-1 d-flex">' +
                                '    <div class="my-auto">' +
                                '        <img class="bg-img-team p-1 mr-1 " src="{{ asset('images/game/leagues/teams') }}' + '/' + team.image + '" alt="' + team.initial + '" width="50px" height="50px">' +
                                '    </div>' +
                                '    <div class="flex-fill align-self-center">' +
                                '        <p class="mb-0 " >' + team.name + '</p>' +
                                '    </div>' +
                                '</div>'
                            ;
                        });

                        html +=
                            '    </div>' +
                            '</div>'
                        ;
                    });

                    if (divisions.length == 1) {
                        $('#league-divisions').addClass('justify-content-center');
                    }
                    $('#league-divisions').html(html);

                    $('#see-league-title').html(name);
                    $('#see-league').modal('show');
                },
                error: function (error) {
                    console.log(error.statusText);
                }
            });
        });
        --}}

        $("#league_id").select2({ minimumResultsForSearch: Infinity });
        $("#division_id").select2({ minimumResultsForSearch: Infinity });

        $("#edit_league_id").select2({ minimumResultsForSearch: Infinity });
        $("#edit_division_id").select2({ minimumResultsForSearch: Infinity });

        // NEW
        $(document).on('click', '.new-team', function() {
            getLeagues('#league_id');
            $('#new-team').find('#name').val('');
            $('#new-team').find('#initials').val('');
            $('#new-team').find('#nrdivisions').val('').removeAttr('disabled');
            $('#new-team').modal('show');
        });

        // EDIT
        $(document).on('click', '.edit-team', function() {
            let id      = $(this).data('id');
            let teams = {!! $data !!};

            $('#edit-team-form').attr('action', '{{ url("/teams") }}' + '/' + id);
            $('#edit-team-form').attr('method', 'POST');

            teams.forEach(team => {
                if (team.id == id)
                {
                    $('#edit-team').find('#edit-team-title').html('Editar time: ' + team.name);
                    $('#edit_league_id').attr('disabled', '').val(team.league_id).trigger('change');
                    $('#edit_league_id_hidden').val(team.league_id + '.' + team.league_initials);

                    insertDivisions('#edit_division_id', true, team.division_league_id, team.division_id);

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
            $.ajax({
                type: 'DELETE',
                url: '{{ url("/teams") }}' + '/' + $(this).data('id'),
                data: $('#del-team-form').serialize(),
                success: function (data) {
                    location.reload();
                },
                error: function (error) {
                    console.log(error.statusText);
                }
            });
        });

        // ICON - League
        $(document).on('click', '.icon-league', function() {
            let img = $(this).data('img');

            let xhr = new XMLHttpRequest();
            xhr.open('HEAD', 'images/game/leagues/' + img, false);
            xhr.send();

            if (xhr.status == "404")
            {
                $('#icon-team').find('img').attr('src', 'images/game/leagues/default.png');
            }
            else
            {
                $('#icon-team').find('img').attr('src', 'images/game/leagues/' + img);
            }

            $('#icon-team').modal('show');
        });
        // ICON - Team
        $(document).on('click', '.icon-team', function() {
            let img = $(this).data('img');

            let xhr = new XMLHttpRequest();
            xhr.open('HEAD', 'images/game/leagues/teams/' + img, false);
            xhr.send();

            if (xhr.status == "404")
            {
                $('#icon-team').find('img').attr('src', 'images/game/leagues/teams/default.png');
            }
            else
            {
                $('#icon-team').find('img').attr('src', 'images/game/leagues/teams/' + img);
            }

            $('#icon-team').modal('show');
        });


        // INSERT DIVISIONS
        window.insertDivisions = function (id, edit = false, division_league_id, divison_id)
        {
            let divisions = {!! $divisions !!};
            let opts      = '<option value="" ' + (edit ? '' : 'selected') + ' disabled hidden>Selectione...</option>';

            divisions.forEach(division => {
                if (division.league_id == division_league_id)
                {
                    let selected = (division.id == divison_id) ? 'selected' : '';
                    opts += '<option value="' + division.id + '" ' + selected + ' >' + division.name + '</option>';
                }
            });

            $(id).html(opts);
            $(id).select2({ minimumResultsForSearch: Infinity });
        }

        $('#league_id').on('change', function () {
            $('#division_id').removeAttr('disabled');
            insertDivisions('#division_id', false, this.value.split('.')[0]);
        });

    </script>
@endsection