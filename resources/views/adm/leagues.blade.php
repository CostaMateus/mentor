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
            <button type="button" class="btn btn-secondary btn-sm " data-modal="novo" >
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
                                {{-- {{ $league->image    }} --}}
                                <img class="bg-img-team" src="{{ asset('images/game/leagues/' . $league->image) }}" alt="" width="50px" height="50px">
                            </td>
                            
                            <td class="text-center" >
                                <button class="btn btn-link" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-danger" >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- /col-12 table -->
    </div>
@stop

@include('adm.footer')
