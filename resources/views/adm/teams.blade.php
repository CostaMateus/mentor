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

        <div class="col-12 table-responsive">
            <table id="teams-table" class="table table-striped table-sm" >
                <thead>
                    <tr class="bg-light">
                        <th class="text-center" >#</th>
                        <th class="text-center" >Logo</th>
                        <th class=""            >Nome</th>
                        <th class=""            >Sigla</th>
                        <th class="text-center" >Liga</th>
                        <th class="text-center" >Divisão</th>
                        <th class="text-center" >Ver</th>
                        <th class="text-center" >Editar</th>
                        <th class="text-center" >Excluir</th>
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
                                    <select id="league_id" class="form-control form-control-sm" name="league_id" style="width: 100%"></select>
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
                    <form id="edit-team-form" action="" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_league_id" class="text-muted">Liga *</label>
                                    <select id="edit_league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" ></select>
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
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_name" class="text-muted">Nome do time *</label>
                                    <input type="text" id="edit_name" class="form-control form-control-sm" name="name" >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="edit_initials" class="text-muted">Sigla *</label>
                                    <input type="text" id="edit_initials" class="form-control form-control-sm" name="initials" >
                                    <span id="span_initials" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 pl-md-2">
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
            $.ajax({
                type: 'GET',
                url: '{{ url("/teams") }}' + '/' + $(this).data('id'),
                success: function (data) {
                    $('#edit-team-form').attr('action', '{{ url("/teams") }}' + '/' + data.id);

                    $('#edit-team').find('#edit-team-title').html('Editar time: ' + data.name);

                    getLeagues('#edit_league_id', true, data.league_id);
                    $('#edit_league_id').attr('disabled', '').val(data.league_name).trigger('change');
                    $('#edit_league_id_hidden').val(data.league_id + '.' + data.league_initials);

                    getDivisions('#edit_division_id', true, data.league_id, data.division_id);
                    $('#edit_division_id').val(data.division_id).trigger('change');

                    $('#edit-team').find('#edit_name').val(data.name);
                    $('#edit-team').find('#edit_initials').val(data.initials);
                    $('#edit-team').modal('show');
                },
                error: function (err) {
                    console.log(err);
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

        // ICON
        $(document).on('click', '.icon-league', function() {
            @if (file_exists(public_path('images/game/leagues/' . $team->league_image)))
                $('#icon-team').find('img').attr('src', 'images/game/leagues/' + $(this).data('img'));
            @else
                $('#icon-team').find('img').attr('src', 'images/game/leagues/default.png');
            @endif
            $('#icon-team').modal('show');
        });
        $(document).on('click', '.icon-team', function() {
            @if (file_exists(public_path('images/game/leagues/teams/' . $team->image)))
                $('#icon-team').find('img').attr('src', 'images/game/leagues/teams/' + $(this).data('img'));
            @else
                $('#icon-team').find('img').attr('src', 'images/game/leagues/teams/default.png');
            @endif
            $('#icon-team').modal('show');
        });

        // GET LEAGUES
        window.getLeagues = function (id, edit = false, league_id = null) {
            $.ajax({
                type: 'GET',
                url: '{{ route("leagues.list") }}',
                success: function (data) {
                    var select = '<option value="" ' + (edit ? '' : 'selected') + ' disabled hidden>Selectione...</option>';

                    $.each(data, function (id, league) {
                        var value = league.id + '.' + league.initials;
                        var lg_id = (league_id && league_id == league.id) ? 'selected' : '';

                        select += '<option value="' + value + '" ' + lg_id + ' >' + league.name + '</option>';
                    });

                    $(id).attr('class', 'form-control form-control-sm').html(select);
                    $(id).select2({ minimumResultsForSearch: Infinity });
                },
                error: function (response) {
                    var select = '<option selected>Ocorreu um erro</option>';
                    $(id).attr('class', function(i, cls){
                        return cls + ' text-danger';
                    }).html(select);
                }
            });
        }

        // GET DIVISIONS
        window.getDivisions = function (id, edit = false, league_id = null, division_id = null) {
            $.ajax({
                type: 'GET',
                url: '{{ url("/") }}/leagues/' + league_id + '/divisions/listall',
                success: function (data) {
                    var select = '<option value="" ' + (edit ? '' : 'selected') + ' disabled hidden>Selectione...</option>';

                    $.each(data, function (id, division) {
                        var dv_id = (division_id && division_id == division.id) ? 'selected' : '';

                        select += '<option value="' + division.id + '" ' + dv_id + ' >' + division.name + '</option>';
                    });

                    $(id).attr('class', 'form-control form-control-sm').html(select);
                    $(id).select2({ minimumResultsForSearch: Infinity });
                },
                error: function (response) {
                    var select = '<option selected>Ocorreu um erro</option>';
                    $(id).attr('class', function(i, cls){
                        return cls + ' text-danger';
                    }).html(select);
                }
            });
        }

        $('#league_id').on('change', function () {
            $('#division_id').removeAttr('disabled');
            getDivisions('#division_id', false, this.value.split('.')[0]);
        });

    </script>
@endsection