@extends('adminlte::page')

@section('title_prefix', 'Ligas especiais')

@section('css')
    <style></style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Campeonatos especiais</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 pb-3">
            <button type="button" class="btn btn-secondary btn-sm new-league" disabled >
                <i class="fas fa-plus "></i> Novo campeonato
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
                        <th class="text-center" data-field="nrd"      data-sortable="true" >Nº participantes</th>
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
                                    @if (file_exists(public_path('images/game/leagues/specials/' . $league->image)))
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/specials/' . $league->image) }}" alt="{{ $league->initials }}" width="50px" height="50px">
                                    @else
                                        <img class="bg-img-team" src="{{ asset('images/game/leagues/specials/default.png') }}" alt="{{ $league->initials }}" width="50px" height="50px">
                                    @endif
                                </button>
                            </td>
                            <td class=""            >{{ $league->name }}</td>
                            <td class="text-center" >{{ $league->initials }}</td>
                            <td class="text-center" >{{ $league->nrdivisions }}</td>

                            <td class="text-center" >
                                <button disabled class="btn btn-link text-dark see-league" data-id="{{ $league->id }}"
                                                                                  data-name="{{ $league->name }}"
                                                                                  data-nrd="{{ $league->nrdivisions }}"
                                                                                  data-image="{{ $league->image }}"
                                                                                  data-initials="">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button disabled class="btn btn-link text-primary edit-league" data-id="{{ $league->id }}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button disabled class="btn btn-link text-danger del-league" data-id="{{ $league->id }}"
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

    {{-- ICON --}}
    @include('adm/partials.modal-icon', ['modalId' => 'icon-league'])
@stop

@include('adm.footer')

@section('js')
    <script>
        // Bootstrap Table
        window.getbootstrapTable('leagues-table', {
            locale: 'pt-br',
        });

        // ICON
        $(document).on('click', '.icon-league', function() {
            let id    = 'icon-league';
            let path  = 'images/game/leagues/specials/';
            let image = $(this).data('image');

            window.showImage(id, path, image);
        });

    </script>
@endsection