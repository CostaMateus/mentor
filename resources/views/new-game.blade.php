<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon site -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- Select 2 CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" integrity="sha512-2L0dEjIN/DAmTV5puHriEIuQU/IL3CoPm/4eyZp3bM8dnaXri6lK8u6DC5L96b+YSs9f3Le81dDRZUSYeX4QcQ==" crossorigin="anonymous" />
        <!-- Date range picker -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <style>
            body { background-color: #395A6A; }

            .bg-default { background-color:#F2F2F2; }

            .bg-img-team     {
                background-color: #ABB9C0;
                border-radius: 4px;
                max-height: 140px;
                max-width: 140px;
                margin: auto;

            }

            .btn-newgame { background-color: #395A6A; border-color: #395A6A; }
        </style>

        <title>Novo jogo | {{ config('app.name', 'Mentor') }}</title>
    </head>

    <body>

        <div class="container-fluid">
            <h1 class="text-center text-white mt-2" >Mentor</h1>

            {{-- Escolher o time --}}
            <div class="row">
                <div id="choose-team" class="col-12 col-md-6 mx-auto my-3 p-3 bg-default ">
                    <h4 class="text-center" >Escolha o teu time</h4>

                    <form id="team-form" class="m-3">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="league_id" class="text-muted">Liga</label>
                                    <select id="league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" >
                                        <option value="" selected disabled >Selecione...</option>
                                        @foreach ($leagues as $league)
                                            <option value="{{ $league->id }}">{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="span_league_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="division_id" class="text-muted">Divisão</label>
                                    <select id="division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" disabled ></select>
                                    <span id="span_division_id" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="team_id" class="text-muted">Time</label>
                                    <select id="team_id" class="form-control form-control-sm" name="team_id" style="width: 100%" disabled ></select>
                                    <span id="span_team_id" class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-newgame btn-sm float-right" >Próximo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Inserir informações --}}
            <div class="row">
                <div id="insert-info" class="col-12 col-md-6 mx-auto my-3 p-3 bg-default d-none">
                    <h4 class="text-center" >Sobre você</h4>

                    <form id="info-form" class="m-3" >
                        @csrf
                        <input type="hidden" id="hide_team_id" name="team_id" >
                        <input type="hidden" id="user_id"      name="user_id"     value="{{ Auth::user()->id }}" >
                        <input type="hidden" id="user_mentor"  name="user_mentor" value="1" >
                        <div class="row">
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome *</label>
                                    <input type="text" id="name" class="form-control form-control-sm" name="name"  >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="lastname" class="text-muted">Sobrenome *</label>
                                    <input type="text" id="lastname" class="form-control form-control-sm" name="lastname"  >
                                    <span id="span_lastname" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="nickname" class="text-muted">Apelido *</label>
                                    <input type="text" id="nickname" class="form-control form-control-sm" name="nickname"  >
                                    <span id="span_nickname" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="birthday" class="text-muted">Aniversário</label>
                                    <input type="text" id="birthday" class="form-control form-control-sm" name="birthday">
                                    <span id="span_birthday" class="invalid-feedback"></span>
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
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="role" class="text-muted">1ª Posição *</label>
                                    <select id="role" class="form-control form-control-sm" name="role" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="top" class="text-top" >Topo</option>
                                        <option value="jng" class="text-jng" >Selva</option>
                                        <option value="mid" class="text-mid" >Meio</option>
                                        <option value="adc" class="text-adc" >Atirador</option>
                                        <option value="sup" class="text-sup" >Suporte</option>
                                    </select>
                                    <span id="span_role" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="secondary_role" class="text-muted">2ª Posição *</label>
                                    <select id="secondary_role" class="form-control form-control-sm" name="secondary_role" style="width: 100%">
                                        <option value="" selected disabled >Selecione...</option>
                                        <option value="top" class="text-top" >Topo</option>
                                        <option value="jng" class="text-jng" >Selva</option>
                                        <option value="mid" class="text-mid" >Meio</option>
                                        <option value="adc" class="text-adc" >Atirador</option>
                                        <option value="sup" class="text-sup" >Suporte</option>
                                    </select>
                                    <span id="span_secondary_role" class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-newgame btn-sm float-right" >Próximo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <footer id="footer" class="py-3 bg-fa">
            <div class="container">
                <div class="row">
                    <div class="col text-center text-white">
                        <h6 class="mb-0">&copy; <?= date('Y') ?> Mentor</h6>
                    </div>
                </div>
            </div>
        </footer>

        {{-- Scripts --}}
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"                 ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/collection-util-js@1.5.9/dist/collection-min.js" ></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" integrity="sha512-bj8HE1pKwchoYNizhD57Vl6B9ExS25Hw21WxoQEzGapNNjLZ0+kgRMEn9KSCD+igbE9+/dJO7x6ZhLrdaQ5P3g==" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        <script>
            $("#league_id").select2({ minimumResultsForSearch: Infinity });
            $("#division_id").select2({ minimumResultsForSearch: Infinity });
            $("#team_id").select2({ minimumResultsForSearch: Infinity });

            $("#sex").select2({ minimumResultsForSearch: Infinity });
            $("#nationality").select2();
            $("#role").select2({ minimumResultsForSearch: Infinity });
            $("#secondary_role").select2({ minimumResultsForSearch: Infinity });

            $('#league_id').on('change', function () {
                $('#division_id').removeAttr('disabled');
                insertDivisions('division_id', false, this.value);
            });
            $('#division_id').on('change', function () {
                $('#team_id').removeAttr('disabled');
                insertTeams('team_id', false, this.value);
            });

            {{-- INSERT DIVISIONS --}}
            insertDivisions = function (id, edit = false, league_id, division_id)
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

                opts += '<option value="0"' + ((division_id === null ) ? 'selected' : '') + '>Sem divisão</option>';

                $('#' + id).html(opts);
            }

            {{-- INSERT DIVISIONS --}}
            insertTeams = function (id, edit = false, division_id, team_id)
            {
                let teams = {!! $teams !!};
                let opts  = '<option value="" ' + (edit ? '' : 'selected') + ' disabled hidden >Selecione...</option>';

                teams.forEach(team => {
                    if (team.division_id == division_id)
                    {
                        let selected = (team.id == team_id) ? 'selected' : '';
                        opts += '<option value="' + team.id + '" ' + selected + ' >' + team.name + '</option>';
                    }

                    if (team.division_id === null && division_id == 0)
                    {
                        let selected = (team.id == team_id) ? 'selected' : '';
                        opts += '<option value="' + team.id + '" ' + selected + ' >' + team.name + '</option>';
                    }
                });

                $('#' + id).html(opts);
            }

            {{-- DATEPICKER --}}
            $('#birthday').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns"   : true,
                "minYear"  : 2020,
                "autoApply": true,
                "locale"   : {
                    "firstDay"  : 0,
                    "format"    : "DD/MM/YYYY",
                    "separator" : " - ",
                    "daysOfWeek": [
                        "D", "S", "T", "Q", "Q", "S", "S"
                    ],
                    "monthNames": [
                        "Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dec"
                    ],
                },
                "startDate": Date.now(),
                "endDate"  : Date.now(),
                "minDate"  : "01/01/1970",
                "maxDate"  : "31/12/2069"
            });


            $('#team-form').on('submit', function(e) {
                e.preventDefault();

                let arr = $('#team-form').serializeArray();

                let lg = false;
                let dv = false;
                let tm = false;

                arr.forEach(e => {
                    if (!lg)
                        if (e.name == 'league_id') lg = true;

                    if (!dv)
                        if (e.name == 'division_id') dv = true;

                    if (!tm)
                        if (e.name == 'team_id') tm = e.value;
                });


                $('input, select').removeClass('is-invalid');
                $('[id*=span_]').html('');

                if (lg)
                {
                    if (dv)
                    {
                        if (tm)
                        {
                            $('#choose-team').addClass('d-none');
                            $('#insert-info').removeClass('d-none');
                            $('#hide_team_id').val(tm);
                        }
                        else
                        {
                            $('#team_id').addClass('is-invalid');
                            $('#span_team_id').html('Selecione um time');
                        }
                    }
                    else
                    {
                        $('#division_id').addClass('is-invalid');
                        $('#span_division_id').html('Selecione uma divisão');
                    }
                }
                else
                {
                    $('#league_id').addClass('is-invalid');
                    $('#span_league_id').html('Selecione uma liga');
                }
            });


            $('#info-form').on('submit', function(e) {
                e.preventDefault();

                let player = $('#info-form').serializeArray();

                let age;
                player.forEach( a => {
                    if (a.name == 'birthday')
                    {
                        let temp = a.value.split('/');
                        age      = eval((new Date()).getFullYear() - temp[2]);
                        a.value  = temp[2] + '-' + temp[1] + '-' + temp[0];
                    }
                });

                player.push({
                    'name'  : 'age',
                    'value' : age
                });
                player.push({
                    'name'  : 'force',
                    'value' : 2
                });
                player.push({
                    'name'  : 'mentor',
                    'value' : 'yes'
                });

                console.log(player);

                $.ajax({
                    type: 'POST',
                    url: '{{ url("/players") }}',
                    data: player,
                    success: function ( data ) {
                        console.log( data );

                        location.href = '{{ url("/") }}';
                    },
                    error: function ( err ) {
                        if ( err.status == 422 )
                        {
                            showErrors( err );
                        }
                        console.log( err );
                    }
                });

            });
            // Mostrar erros
            showErrors = function(e) {
                $.each(e.responseJSON.errors, function (key, error) {
                    $('#' + key).addClass('is-invalid');
                    $('#span_' + key).html(error[0]);

                    let elem = $('#' + key);
                    if (elem.next().find('.select2')) elem.next().find('.select2-selection').addClass('has-error');
                });
            }
        </script>

    </body>
</html>
