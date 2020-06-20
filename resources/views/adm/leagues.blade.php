@extends('adminlte::page')

@section('title', 'Mentor')

@section('css')
    <style>
        table tr td {
            vertical-align: middle!important;
        }
        .bg-img-team { background-color: #ABB9C0; border-radius: 10px; max-height: 140px; max-width: 140px; }
    </style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Ligas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 pb-3">
            <button type="button" class="btn btn-secondary btn-sm new-league" >
                <i class="fas fa-plus "></i> Novo liga
            </button>
        </div>
        
        <div class="col-12 table-responsive">
            <table id="leagues-table" class="table table-striped table-sm" >
                <thead>
                    <tr class="bg-light">
                        <th class="text-center" >#</th>
                        <th class=""            >Nome</th>
                        <th class=""            >Sigla</th>
                        <th class="text-center" >Nº divisões</th>
                        <th class="text-center" >Logo</th>
                        <th class="text-center" >Editar</th>
                        <th class="text-center" >Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $league)
                        <tr>
                            <td class="text-center" >{{ $loop->iteration }}</td>
                            <td class=""            >{{ $league->name }}</td>
                            <td class=""            >{{ $league->initials }}</td>
                            <td class="text-center" >{{ $league->nrdivisions }}</td>
                            <td class="text-center" >
                                <img class="bg-img-team" src="{{ asset('images/game/leagues/' . $league->image) }}" alt="" width="50px" height="50px">
                            </td>
                            
                            <td class="text-center" >
                                <a href="/leagues/{{ $league->id }}/divisions" class="btn btn-link" >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-danger del-league" data-id="{{ $league->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{-- modal empresa novo/edit--}}
    <div id="new-league" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="league-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="league-title"> Nova liga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="new-league-form" action="#" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome da liga*</label>
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
                                    <input type="number" id="nrdivisions" class="form-control form-control-sm" name="nrdivisions" min="1" step="1">
                                    <span id="span_nrdivisions" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">Imagem</label>
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
    <div id="del-league" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="del-league-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header text-danger">
                    <h5 class="modal-title" id="del-league-title">Apagar liga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="del-league-form" action="#" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12 text-center">
                                <p>Deseja realmente apgar essa liga?</p>
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
@stop

@include('adm.footer')

@section('js')
    <script>
        $(document).on('click', '.new-league', function() {
            $('#new-league').modal('show');
        });
        
        $(document).on('click', '.del-league', function() {
            $('#del-league-form').attr('data-id', $(this).data('id'));
            $('#del-league').modal('show');
        });

        $('#del-league-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'DELETE',
                url: '{{ url("/leagues") }}' + '/' + $(this).data('id'),
                data: $('#del-league-form').serialize(),
                success: function (data) {
                    location.reload();
                },
                error: function (error) {
                    console.log(error.statusText);
                }
            });
        });


    </script>
@endsection