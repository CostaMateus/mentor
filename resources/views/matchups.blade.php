@extends('layouts.app')

@section('title_prefix', 'Partida')
@section('title')
@section('title_posfix')

@section('css')
    <style>
        .bg-mentor { background-color: #071A25 !important; }
        .table .small { font-size: 75% !important; }
        .table-mentor th, .table-mentor td { padding: .4rem; vertical-align: middle; }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-n4 mb-n5">
                <img class="" src="{{ asset("images/game/loading.gif") }}" alt="" height="200">
            </div>
        </div>

        @foreach ($leagues as $league)
            <div class="row mb-3">
                <div class="col-12 text-center text-white">
                    <h3>{{ $league->name }}</h3>
                </div>

                @foreach ($league->divisions as $division)
                    <div class="col-6 px-2">
                        <div class="table-responsive bg-white mb-3">
                            <table class="table table-borderless table-sm table-striped mb-0 table-mentor " data-toggle="table" >
                                <tbody>
                                    <tr >
                                        <td class="text-center" colspan="5" >{{ $division->name }}</td>
                                    </tr>

                                    @foreach ($division->matchups as $matchup)
                                        <tr >
                                            <td class="text-right small" width="37.5%" >{{ $matchup->teamBlue->name }}</td>
                                            <td class="text-center font-weight-bold" width="10%" >{{ $matchup->teamBlue->initials }}</td>
                                            <td class="text-center" width="5%" >x</td>
                                            <td class="text-center font-weight-bold" width="10%" >{{ $matchup->teamRed->initials }}</td>
                                            <td class="text-left small" width="37.5%" >{{ $matchup->teamRed->name }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach

    </div>
@endsection

@section('scripts')
@endsection
