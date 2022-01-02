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
        {{-- NOVO --}}
        <div class="col-12 pb-3">
            <button type="button" class="btn btn-secondary btn-sm new-team" >
                <i class="fas fa-plus "></i> Novo time
            </button>
        </div>

        {{-- TABELA --}}
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
                                    <img class="bg-img-team" src="{{ asset('images/game/leagues/teams/' . $team->image) }}"
                                         onerror="this.onerror=null;this.src='{{ asset('images/game/leagues/teams/default.png') }}';"
                                         alt="{{ $team->initials }}" width="50px" height="50px">
                                </button>
                            </td>
                            <td class=""            >{{ $team->name }}</td>
                            <td class="text-center" >{{ $team->initials }}</td>
                            <td class="text-center" >{{ $team->league->initials }}</td>
                            <td class="text-center" >{{ is_null($team->division) ? "" : $team->division->initials }}</td>
                            <td class="text-center" >{{ $team->players->count() }}</td>

                            <td class="text-center" >
                                <button class="btn btn-link text-dark see-team" data-id="{{ $team->id }}">
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

                        {{-- SEE --}}
                        @include('adm/partials/modal-see', [
                            "modal_id"   => "see-team-$team->id",
                            "title_id"   => "see-team-$team->id-title",
                            "title_name" => $team->name,
                            "image_path" => asset("images/game/leagues/teams"),
                            "image_name" => $team->image,
                            "image_alt"  => $team->initials,
                            "part"       => "team",
                            "data"       => [
                                "players" => $team->players
                            ],
                        ])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
                    <form id="new-team-form" >
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
                            @foreach ($leagues as $league)
                                <div id="dv_opt_{{ $league->id }}" class="col-12 d-none">
                                    <div class="form-group">
                                        <label for="{{ $league->id }}_division_id" class="text-muted">Divisão *</label>
                                        <select id="{{ $league->id }}_division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" required >
                                            @foreach ($league->divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                            <option value="0">Sem divisão</option>
                                        </select>
                                        <span id="span_{{ $league->id }}_division_id" class="text-danger"></span>
                                    </div>
                                </div>
                            @endforeach
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
        "modal_id"   => "del-team",
        "form_id"    => "del-team-form",
        "title_id"   => "del-team-title",
        "title_name" => "Excluir time",
        "text"       => "Deseja realmente excluir esse time?",
    ])

    {{-- ICON --}}
    @include('adm/partials.modal-icon', [
        "modal_id"   => "icon-team"
    ])
@stop

@include('adm.footer')

@section('js')
    <script>
        // Bootstrap Table
        getbootstrapTable("teams-table", {
            locale: "pt-br",
        });

        $("#league_id").select2({ minimumResultsForSearch: Infinity });
        $("#division_id").select2({ minimumResultsForSearch: Infinity });

        $("#edit_league_id").select2({ minimumResultsForSearch: Infinity });
        $("#edit_division_id").select2({ minimumResultsForSearch: Infinity });

        // SEE
        $(document).on("click", ".see-team", function() {
            let id = $(this).data("id");
            $(`#see-team-${id}`).modal("show");
        });

        // NEW
        $(document).on("click", ".new-team", function() {
            $("#new-team-form").attr("action", "{{ url("/teams") }}");
            $("#new-team-form").attr("method", "POST");

            $("#new-team").find("#name").val("");
            $("#new-team").find("#initials").val("");
            $("#new-team").find("#nrdivisions").val("").removeAttr("disabled");
            $("#new-team").modal("show");
        });
        $("#league_id").on("change", function () {
            let id = this.value.split(".")[0];
            $("[id^=dv_opt_]").addClass("d-none");
            $(`#dv_opt_${id}`).removeClass("d-none");
        });

        // EDIT
        $(document).on("click", ".edit-team", function() {
            let id = $(this).data("id");

            $("#edit-team-form").attr("action", `{{ url("/teams") }}/${id}`).attr("method", "POST");

            $.ajax({
                type: "GET",
                url: `{{ url("/teams") }}/${id}`,
                success: function ( data ) {
                    // console.log( data );
                    let team = data[0];
                    let edit = $("#edit-team");

                    edit.find("#edit-team-title").html("Editar time: " + team.name);
                    $("#edit_league_id").attr("disabled", "").val(team.league_id).trigger("change");
                    $("#edit_league_id_hidden").val(team.league_id + "." + team.league_initials);

                    insertDivisions("edit_division_id", true, team.league_id, team.division_id);

                    edit.find("#edit_name").val(team.name);
                    edit.find("#edit_initials").val(team.initials);
                    edit.modal("show");
                },
                error: function ( err ) {
                    console.log( err );
                }
            });
        });

        // DEL
        $(document).on("click", ".del-team", function() {
            $("#del-team-title").html($(this).data("name"));
            $("#del-team-form").attr("data-id", $(this).data("id"));
            $("#del-team").modal("show");
        });
        $("#del-team-form").on("submit", function(e) {
            e.preventDefault();
            let id   = $(this).data("id");
            let url  = `{{ url("/teams") }}/${id}`;
            let data = $("#del-team-form").serialize();
            deleteItem(url, data);
        });

        // ICON - Team
        $(document).on("click", ".icon-team", function() {
            let path  = "{{ asset("images/game/leagues/teams") }}";
            let image = $(this).data("image");

            $("#icon-team").find("img").attr("src", `${path}/${image}`).attr("onerror", `this.onerror=null;this.src="${path}/default.png";`);
            $("#icon-team").modal("show");
        });
    </script>
@endsection
