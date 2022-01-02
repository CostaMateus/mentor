@extends('adminlte::page')

@section('title_prefix', 'Ligas')

@section('css')
    <style>
        .form-check-input { margin-top: 0.4rem !important; }
    </style>
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
                        <th class="text-center" data-field="nrdTeams" data-sortable="true" >Nº times</th>
                        <th class="text-center" data-field="special"  data-sortable="true" >Especial</th>
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
                                    <img class="bg-img-team" src="{{ asset("images/game/leagues/" . $league->image) }}"
                                         onerror="this.onerror=null;this.src='{{ asset('images/game/leagues/default.png') }}';"
                                         alt="{{ $league->initials }}" width="50px" height="50px">
                                </button>
                            </td>
                            <td class=""            >{{ $league->name }}</td>
                            <td class="text-center" >{{ $league->initials }}</td>
                            <td class="text-center" >{{ $league->nrdivisions }}</td>
                            <td class="text-center" >{{ $league->nrparticipants }}</td>
                            <td class="text-center" >
                                @if ($league->special)
                                    <i class="fas fa-check"></i>
                                @endif
                            </td>

                            <td class="text-center" >
                                <button class="btn btn-link text-dark see-league" data-id="{{ $league->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-primary edit-league" data-id="{{ $league->id }}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="text-center" >
                                <button class="btn btn-link text-danger del-league" data-id="{{ $league->id }}" data-name="{{ $league->name }}" >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- SEE --}}
                        @include('adm/partials.modal-see', [
                            "modal_id"   => "see-league-$league->id",
                            "title_id"   => "see-league-$league->id-title",
                            "title_name" => $league->name,
                            "image_path" => asset("images/game/leagues"),
                            "image_name" => $league->image,
                            "image_alt"  => $league->initials,
                            "part"       => "league",
                            "data"       => [
                                "divisions" => $league->divisions,
                                "teams"     => $league->teams
                            ],
                        ])

                        {{-- EDIT --}}
                        @include('adm/partials.modal-edit', [
                            "modal_id"   => "edit-league-$league->id",
                            "form_id"    => "edit-league-$league->id-form",
                            "title_id"   => "edit-league-$league->id-title",
                            "title_name" => $league->name,
                            "image_path" => asset("images/game/leagues"),
                            "image_name" => $league->image,
                            "image_alt"  => $league->initials,
                            "id"         => $league->id,
                            "data"       => [
                                "edit_name"        => $league->name,
                                "edit_initials"    => $league->initials,
                                "edit_nrdivisions" => $league->nrdivisions,
                                "edit_special"     => $league->special,
                            ],
                        ])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- NEW --}}
    <div id="new-league" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="new-league-title" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="new-league-title">Nova liga</h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="new-league-form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nome da liga *</label>
                                    <input type="text" id="name" class="form-control form-control-sm" name="name" required >
                                    <span id="span_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="initials" class="text-muted">Sigla *</label>
                                    <input type="text" id="initials" class="form-control form-control-sm" name="initials" required >
                                    <span id="span_initials" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="nrdivisions" class="text-muted">Nº de divisões</label>
                                    <select id="nrdivisions" class="form-control form-control-sm" name="nrdivisions" style="width: 100%" >
                                        <option value="">Selecione...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <span id="span_nrdivisions" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image" class="text-muted">Imagem</label>
                                    <input id="image" type="file" class="form-control-file" name="image">
                                    <span id="span_image" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group form-check">
                                    <input class="form-check-input my-auto" type="checkbox" id="special" name="special" >
                                    <label class="form-check-label my-auto" for="special" >
                                        É uma liga especial?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 pl-2 ml-auto">
                                <button type="submit" class="btn btn-success btn-sm btn-block" >
                                    Criar <i class="ml-2 d-none fas fa-spinner fa-spin text-white"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- DELETE --}}
    @include('adm/partials.modal-delete', [
        "modal_id"   => "del-league",
        "form_id"    => "del-league-form",
        "title_id"   => "del-league-title",
        "title_name" => "Excluir liga",
        "text"       => "Deseja realmente excluir essa liga?",
    ])

    {{-- ICON --}}
    @include('adm/partials.modal-icon', [
        "modal_id"   => "icon-league"
    ])
@stop

@include('adm.footer')

@section('js')
    <script>
        // Bootstrap Table
        getbootstrapTable("leagues-table", {
            locale: "pt-br",
        });

        // SEE
        $(document).on("click", ".see-league", function() {
            let id = $(this).data("id");
            $(`#see-league-${id}`).modal("show");
        });

        // NEW
        $(document).on("click", ".new-league", function() {
            $("#new-league").find("#name").val("");
            $("#new-league").find("#initials").val("");
            $("#new-league").find("#nrdivisions").val("").removeAttr("disabled");
            $("#new-league").modal("show");
        });
        $("#new-league-form").on("submit", function(e) {
            e.preventDefault();

            var url      = "{{ route("api.league.store") }}";
            var formData = new FormData(this);
            var btn      = $(this).find("button");

            window.submitData(url, formData, btn);
        });

        // EDIT
        $(document).on("click", ".edit-league", function() {
            let id = $(this).data("id");
            $(`#edit-league-${id}-form`).attr("data-id", id);
            $(`#edit-league-${id}`).modal("show");
        });
        $("form.edit-form").on("submit", function(e) {
            e.preventDefault();

            let id       = $(this).data("id");
            let url      = `{{ url("api/leagues") }}/${id}`;
            var formData = new FormData(this);
            var btn      = $(`#edit-league-${id}-form`).find("button");

            window.submitData(url, formData, btn, id, `${id}_edit_`);
        });

        // DEL
        $(document).on("click", ".del-league", function() {
            $("#del-league-title").html($(this).data("name"));
            $("#del-league-form").attr("data-id", $(this).data("id"));
            $("#del-league").modal("show");
        });
        $("#del-league-form").on("submit", function(e) {
            e.preventDefault();
            let id   = $(this).data("id");
            let url  = `{{ url("api/leagues") }}/${id}`;
            let data = $("#del-league-form").serialize();
            var btn  = $(this).find("button");
            btn.addClass("disabled").find("i").removeClass("d-none");

            deleteItem(url, data, btn);
        });

        // ICON
        $(document).on("click", ".icon-league", function() {
            let path  = "{{ asset("images/game/leagues") }}";
            let image = $(this).data("image");

            $("#icon-league").find("img").attr("src", `${path}/${image}`).attr("onerror", `this.onerror=null;this.src="${path}/default.png";`);
            $("#icon-league").modal("show");
        });
    </script>
@endsection
