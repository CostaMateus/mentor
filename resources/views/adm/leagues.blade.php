@extends('adminlte::page')

@section('title', 'Mentor')

@section('css')
    <style></style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Ligas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 pb-3">
            <button type="button" class="btn btn-secondary btn-sm new-league" >
                <i class="fas fa-plus "></i> Nova liga
            </button>
        </div>

        <div class="col-12 table-responsive pb-2">
            <table id="leagues-table" class="table table-striped table-sm" data-toggle="table" >
                <thead>
                    <tr class="bg-light">
                        <th class="text-center" data-field="id"       data-sortable="true" >#</th>
                        <th class="text-center"                                            >Logo</th>
                        <th class=""            data-field="name"     data-sortable="true" >Nome</th>
                        <th class="text-center" data-field="initials" data-sortable="true" >Sigla</th>
                        <th class="text-center" data-field="nrd"      data-sortable="true" >Nº divisões</th>
                        <th class="text-center"                                            >Ver</th>
                        <th class="text-center"                                            >Editar</th>
                        <th class="text-center"                                            >Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $league)
                        <tr>
                            <td class="text-center" >{{ $loop->iteration }}</td>
                            <td class="text-center" >
                                <button type="button" class="btn icon-league" data-image="{{ $league->image }}">
                                    @if (file_exists(public_path('images/game/leagues/' . $league->image)))
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/' . $league->image) }}" alt="{{ $league->initials }}" width="50px" height="50px">
                                    @else
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/default.png') }}" alt="{{ $league->initials }}" width="50px" height="50px">
                                    @endif
                                </button>
                            </td>
                            <td class=""            >{{ $league->name }}</td>
                            <td class="text-center" >{{ $league->initials }}</td>
                            <td class="text-center" >{{ $league->nrdivisions }}</td>

                            <td class="text-center" >
                                <button class="btn btn-link text-dark see-league" data-id="{{ $league->id }}"
                                                                                  data-name="{{ $league->name }}"
                                                                                  data-nrd="{{ $league->nrdivisions }}"
                                                                                  data-image="{{ $league->image }}"
                                                                                  data-initials="">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-primary edit-league" data-id="{{ $league->id }}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-danger del-league" data-id="{{ $league->id }}"
                                                                                    data-name="{{ $league->name }}" >
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
        'modalId' => 'see-league',
        'title'   => 'see-league-title',
        'image'   => 'see-league-image',
        'body'    => 'league-divisions',
    ])

    {{-- NEW --}}
    <div id="new-league" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="new-league-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="new-league-title">Nova liga</h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="new-league-form" action="{{ url("/leagues") }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome da liga *</label>
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
                                    <label for="nrdivisions" class="text-muted">Nº de divisões</label>
                                    <input type="number" id="nrdivisions" class="form-control form-control-sm" name="nrdivisions" min="1" max="4" step="1">
                                    <span id="span_nrdivisions" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12">
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
    <div id="edit-league" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="edit-league-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-league-title"></h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-league-form" action="" method="" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome da liga *</label>
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
                                    <label for="nrdivisions" class="text-muted">Nº de divisões</label>
                                    <input type="number" id="nrdivisions" class="form-control form-control-sm" name="nrdivisions" min="1" max="4" step="1">
                                    <span id="span_nrdivisions" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12">
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

    {{-- DELETE --}}
    @include('adm/partials.modal-delete', [
        'modalId' => 'del-league',
        'titleId' => 'del-league-title',
        'title'   => 'Apagar liga',
        'formId'  => 'del-league-form',
        'text'    => 'Deseja realmente apagar essa liga?',
    ])

    {{-- ICON --}}
    @include('adm/partials.modal-icon', ['modalId' => 'icon-league'])
@stop

@include('adm.footer')

@section('js')
    <script>
        // Bootstrap Table
        window.getbootstrapTable('leagues-table', {
            locale: 'pt-br',
            // height: 710,
            // pageSize: '25',
            // pagination: 'true',
            // paginationVAlign: 'top',
            // pageList: [25, 50, 100, 200, 'All'],
        });

        // SEE
        $(document).on('click', '.see-league', function() {
            let id        = $(this).data('id');
            let name      = $(this).data('name');
            let nrd       = $(this).data('nrd');
            let image     = $(this).data('image');
            let divisions = {!! $divisions !!};
            let teams     = {!! $teams !!};
            let html      = '';

            divisions.forEach(division => {
                if (division.league_id == id)
                {
                    html +=
                        '<div class="col-12 col-md-6 border">' +
                        '    <div class="row my-2">' +
                        '        <div class="col-12">' +
                        '            <p class="h6 text-bold" >' + division.name + '</p>' +
                        '        </div>';

                    if (window.countTeamsInDivision(teams, division.id))
                    {
                        teams.forEach(team => {
                            if (team.league_id == id && team.division_id == division.id)
                            {
                                let path   = 'images/game/leagues/teams/';
                                team.image = (window.validateImage(path, team.image)) ? team.image : 'default.png';

                                html +=
                                    '<div class="col-6 my-1 d-flex">' +
                                    '    <div class="my-auto">' +
                                    '        <img class="bg-img-team p-1 mr-1 " src="{{ asset("images/game/leagues/teams") }}' + '/' + team.image + '" alt="' + team.initials + '" width="50px" height="50px">' +
                                    '    </div>' +
                                    '    <div class="flex-fill align-self-center">' +
                                    '        <p class="mb-0 " >' + team.name + '</p>' +
                                    '    </div>' +
                                    '</div>';
                            }
                        });
                    }
                    else
                    {
                        html +=
                                '<div class="col-6 my-1 d-flex">' +
                                '    <p class="mb-0">Nenhum time encontrado.<p>' +
                                '</div>';
                    }

                    html +=
                        '    </div>' +
                        '</div>';
                }
            });

            if (window.checkTeamsWithoutDivisions(teams))
            {
                html +=
                    '<div class="col-12 col-md-6 border">' +
                    '    <div class="row my-2">' +
                    '        <div class="col-12">' +
                    '            <p class="h6 text-bold" >Sem divisão</p>' +
                    '        </div>';
                teams.forEach(team => {
                    if (team.league_id == id && team.division_id == null)
                    {
                        let path   = 'images/game/leagues/teams/';
                        team.image = (window.validateImage(path, team.image)) ? team.image : 'default.png';

                        html +=
                            '<div class="col-6 my-1 d-flex">' +
                            '    <div class="my-auto">' +
                            '        <img class="bg-img-team p-1 mr-1 " src="{{ asset("images/game/leagues/teams") }}' + '/' + team.image + '" alt="' + team.initials + '" width="50px" height="50px">' +
                            '    </div>' +
                            '    <div class="flex-fill align-self-center">' +
                            '        <p class="mb-0 " >' + team.name + '</p>' +
                            '    </div>' +
                            '</div>';
                    }
                });
                html +=
                    '    </div>' +
                    '</div>';
            }

            if (nrd == 1) {
                $('#league-divisions').addClass('justify-content-center');
            }
            $('#league-divisions').html(html);

            let path = 'images/game/leagues/';
            if (window.validateImage(path, image)) {
                $('#see-league-image').attr('src', path + image).attr('alt', initials);
            } else {
                $('#see-league-image').attr('src', path + 'default.png').attr('alt', initials);
            }

            $('#see-league-title').html(name);
            $('#see-league').modal('show');
        });

        // NEW
        $(document).on('click', '.new-league', function() {
            $('#new-league').find('#name').val('');
            $('#new-league').find('#initials').val('');
            $('#new-league').find('#nrdivisions').val('').removeAttr('disabled');
            $('#new-league').modal('show');
        });

        // EDIT
        $(document).on('click', '.edit-league', function() {
            let id      = $(this).data('id');
            let leagues = {!! $data !!};

            $('#edit-league-form').attr('action', '{{ url("/leagues") }}' + '/' + id + '/update');
            $('#edit-league-form').attr('method', 'POST');

            leagues.forEach(league => {
                if (league.id == id)
                {
                    $('#edit-league').find('#edit-league-title').html('Editar liga');
                    $('#edit-league').find('#name').html(league.name).val(league.name);
                    $('#edit-league').find('#initials').html(league.initials).val(league.initials);
                    $('#edit-league').find('#nrdivisions').html(league.nrdivisions).val(league.nrdivisions).attr('disabled', 'disabled');
                    $('#edit-league').find('#image').html(league.image).val();
                    $('#edit-league').modal('show');
                }
            });
        });

        // DEL
        $(document).on('click', '.del-league', function() {
            $('#del-league-title').html($(this).data('name'));
            $('#del-league-form').attr('data-id', $(this).data('id'));
            $('#del-league').modal('show');
        });
        $('#del-league-form').on('submit', function(e) {
            e.preventDefault();

            let url  = '{{ url("/leagues") }}' + '/' + $(this).data('id');
            let data = $('#del-league-form').serialize();
            window.deleteItem(url, data);
        });

        // ICON
        $(document).on('click', '.icon-league', function() {
            let id    = 'icon-league';
            let path  = 'images/game/leagues/';
            let image = $(this).data('image');

            window.showImage(id, path, image);
        });

    </script>
@endsection