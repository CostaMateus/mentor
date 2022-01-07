<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon site -->
        <link rel="shortcut icon" href="{{ asset("favicon.ico") }}" type="image/x-icon" />

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("vendor/fontawesome-free/css/all.min.css") }}">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Select 2 CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Date range picker -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <link rel="stylesheet" type="text/css" href="{{ asset("css/mentor.css") }}" />

        <title>Novo jogo | {{ config("app.name", "Mentor") }}</title>
    </head>

    <body class="bg-mentor">

        <div class="container-fluid">
            <h1 class="text-center text-white mt-2" >Mentor</h1>

            {{-- Escolha de time --}}
            <div class="row">
                <div id="choose-team" class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 mx-auto mt-3 mb-2 p-3 bg-white">
                    <h4 class="text-center" >Escolha o seu time</h4>

                    <div class="form-group">
                        <label for="league_id" class="text-muted">Liga</label>
                        <select id="league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" >
                            <option value="" selected disabled >Selecione...</option>
                            @foreach ($leagues as $league)
                                <option value="{{ $league->id }}">{{ $league->name }}</option>
                            @endforeach
                        </select>
                        <span id="span_league_id" class="invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="division_id" class="text-muted">Divisão</label>
                        <select id="division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" disabled ></select>
                        <span id="span_division_id" class="invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="team_id" class="text-muted">Time</label>
                        <select id="team_id" class="form-control form-control-sm" name="team_id" style="width: 100%" disabled ></select>
                        <span id="span_team_id" class="invalid-feedback"></span>
                    </div>

                    <button id="team-info" class="btn btn-mentor btn-sm float-right" >Próximo</button>
                </div>
            </div>

            {{-- Informações jo jogador --}}
            <div class="row">
                <div id="player-info" class="col-10 col-sm-8 col-md-6 col-xl-4 mx-auto mt-3 mb-2 p-3 bg-white d-none">
                    <h4 class="text-center" >Seus dados</h4>

                    <form id="info-form" >
                        @csrf
                        <input type="hidden" id="hide_team_id" name="team_id" >
                        <input type="hidden" id="user_id"      name="user_id" value="{{ Auth::user()->id }}" >
                        <input type="hidden" id="user_mentor"  name="mentor"  value="1" >
                        <input type="hidden" id="user_force"   name="force"   value="2" >
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="name" class="text-muted">Nome *</label>
                                <input type="text" id="name" class="form-control form-control-sm" name="name"  >
                                <span id="span_name" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="lastname" class="text-muted">Sobrenome *</label>
                                <input type="text" id="lastname" class="form-control form-control-sm" name="lastname"  >
                                <span id="span_lastname" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="nickname" class="text-muted">Apelido *</label>
                                <input type="text" id="nickname" class="form-control form-control-sm" name="nickname"  >
                                <span id="span_nickname" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="birthday" class="text-muted">Aniversário</label>
                                <input type="text" id="birthday" class="form-control form-control-sm" name="birthday">
                                <span id="span_birthday" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="sex" class="text-muted">Sexo *</label>
                                <select id="sex" class="form-control form-control-sm" name="sex" style="width: 100%">
                                    <option value="" selected disabled >Selecione...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                                <span id="span_sex" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="country_id" class="text-muted">Nacionalidade *</label>
                                <select id="country_id" class="form-control form-control-sm" name="country_id" style="width: 100%">
                                    <option value="" selected disabled >Selecione...</option>
                                    @foreach ($countries as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                <span id="span_country_id" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="role" class="text-muted">1ª Posição *</label>
                                <select id="role" class="form-control form-control-sm" name="role" style="width: 100%">
                                    <option value="" selected disabled >Selecione...</option>
                                    <option value="top" class="text-top" >Topo</option>
                                    <option value="jng" class="text-jng" >Selva</option>
                                    <option value="mid" class="text-mid" >Meio</option>
                                    <option value="adc" class="text-adc" >Atirador</option>
                                    <option value="sup" class="text-sup" >Suporte</option>
                                </select>
                                <span id="span_role" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="secondary_role" class="text-muted">2ª Posição *</label>
                                <select id="secondary_role" class="form-control form-control-sm" name="secondary_role" style="width: 100%">
                                    <option value="" selected disabled >Selecione...</option>
                                    <option value="top" class="text-top" >Topo</option>
                                    <option value="jng" class="text-jng" >Selva</option>
                                    <option value="mid" class="text-mid" >Meio</option>
                                    <option value="adc" class="text-adc" >Atirador</option>
                                    <option value="sup" class="text-sup" >Suporte</option>
                                </select>
                                <span id="span_secondary_role" class="invalid-feedback"></span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-mentor btn-sm float-right" >
                            Próximo <i class="ml-2 d-none fas fa-spinner fa-spin text-white"></i>
                        </button>
                    </form>

                </div>
            </div>

        </div>

        <footer id="footer" class="py-3 bg-fa">
            <div class="container">
                <div class="row">
                    <div class="col text-center text-white">
                        <h6 class="mb-0">&copy; <?= date("Y") ?> Mentor</h6>
                    </div>
                </div>
            </div>
        </footer>

        {{-- Scripts --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/collection-util-js@1.5.9/dist/collection-min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        <script src="{{ asset("js/common.js") }}"></script>

        <script>
            $("#country_id").select2();

            $("#league_id").on("change", function () {
                $("#division_id").removeAttr("disabled");
                insertDivisions("division_id", this.value);
            });
            $("#division_id").on("change", function () {
                $("#team_id").removeAttr("disabled");
                insertTeams("team_id", this.value);
            });

            // {{-- INSERT DIVISIONS --}}
            insertDivisions = function (id, league_id)
            {
                let divisions = {!! $divisions !!};
                let opts      = "<option selected disabled hidden >Selecione...</option>";

                divisions.forEach(division => {
                    if (division.league_id == league_id)
                    {
                        opts += `<option value="${division.id}" >${division.name}</option>`;
                    }
                });

                opts += "<option value='0' >Sem divisão</option>";

                $(`#${id}`).html(opts);
            }

            // {{-- INSERT TEAMS --}}
            insertTeams = function (id, division_id)
            {
                let teams = {!! $teams !!};
                let opts  = "<option selected disabled hidden >Selecione...</option>";

                teams.forEach(team => {
                    if (team.division_id == division_id)
                    {
                        opts += `<option value="${team.id}" >${team.name}</option>`;
                    }

                    if (team.division_id === null && division_id == 0)
                    {
                        let selected = (team.id == team_id) ? "selected" : "";
                        opts += `<option value="${team.id}" ${selected} >${team.name}</option>`;
                    }
                });

                $(`#${id}`).html(opts);
            }

            // {{-- DATEPICKER --}}
            $("#birthday").daterangepicker({
                "singleDatePicker" : true,
                "showDropdowns"    : true,
                "minYear"   : 2020,
                "autoApply" : true,
                "locale"    : {
                    "firstDay"   : 0,
                    "format"     : "DD/MM/YYYY",
                    "separator"  : " - ",
                    "daysOfWeek" : [ "D", "S", "T", "Q", "Q", "S", "S" ],
                    "monthNames" : [ "Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dec" ],
                },
                "startDate" : "{{ Helper::convertDate(config("mentor.start_date"), true) }}",
                "endDate"   : "{{ Helper::convertDate(config("mentor.start_date"), true) }}",
                "minDate"   : "01/01/1970",
                "maxDate"   : "31/12/2069"
            });

            $("#team-info").on("click", function(e) {
                clearInvalid();
                clearSpan();

                let league   = $("#league_id").val();
                let division = $("#division_id").val();
                let team     = $("#team_id").val();

                if (league === null)
                {
                    $("#league_id").addClass("is-invalid");
                    $("#span_league_id").html("Selecione uma liga");
                }
                else if (division === null)
                {
                    $("#division_id").addClass("is-invalid");
                    $("#span_division_id").html("Selecione uma divisão");
                }
                else if (team === null)
                {
                    $("#team_id").addClass("is-invalid");
                    $("#span_team_id").html("Selecione um time");
                }
                else
                {
                    $("#choose-team").addClass("d-none");
                    $("#player-info").removeClass("d-none");
                    $("#hide_team_id").val(team);
                }
            });

            $("#info-form").on("submit", function(e) {
                e.preventDefault();

                let spin = $(this).find("i");
                spin.removeClass("d-none");

                disableFields();
                clearInvalid();
                clearSpan();

                let player = $(this).serializeArray();

                player.push({
                    "name"  : "sex",
                    "value" : $("#sex").val(),
                },{
                    "name"  : "country_id",
                    "value" : $("#country_id").val(),
                },{
                    "name"  : "role",
                    "value" : $("#role").val(),
                },{
                    "name"  : "secondary_role",
                    "value" : $("#secondary_role").val(),
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route("api.player.store") }}",
                    data: player,
                    success: function ( data ) {
                        location.href = `{{ route("set-configs") }}?i=${data.id}&u=${data.user_id}`;
                    },
                    error: function ( err ) {
                        console.log(err);
                        clearInvalid();
                        enableFields();
                        showErrors( err );
                        spin.addClass("d-none");
                    }
                });
            });
        </script>

    </body>
</html>
