
    <form id="{{ $form_id }}" class="edit-form" >
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="{{ $id }}_edit_league_id" class="text-muted">Liga *</label>
                    <select id="{{ $id }}_edit_league_id" class="form-control form-control-sm edit_league" name="league_id" data-id="{{ $id }}" style="width: 100%" required >
                        <option value="" >Selecione...</option>
                        @foreach ($leagues as $league)
                            <option value="{{ $league->id }}" @if ($league->id == $data["edit_league_id"]) selected @endif >{{ $league->name }}</option>
                        @endforeach
                    </select>
                    <span id="span_{{ $id }}_edit_league_id" class="text-danger"></span>
                </div>
            </div>
            @foreach ($leagues as $league)
                <div id="{{ $id }}_division_{{ $league->id }}" class="col-12 d-none">
                    <div class="form-group">
                        <label for="{{ $id }}_edit_{{ $league->id }}_division_id" class="text-muted">Divisão *</label>
                        <select id="{{ $id }}_edit_{{ $league->id }}_division_id" class="form-control form-control-sm edit_division" name="division_id" style="width: 100%" required >
                            @foreach ($league->divisions as $division)
                                <option value="{{ $division->id }}" @if ($division->id == $data["edit_division_id"]) selected @endif >{{ $division->name }}</option>
                            @endforeach
                            <option value="0" >Sem divisão</option>
                        </select>
                        <span id="span_{{ $id }}_edit_{{ $league->id }}_division_id" class="text-danger"></span>
                    </div>
                </div>
            @endforeach
            <div class="col-12 col-md-6 pr-md-2">
                <div class="form-group">
                    <label for="{{ $id }}_edit_name" class="text-muted">Nome do time *</label>
                    <input id="{{ $id }}_edit_name" type="text" class="form-control form-control-sm" name="name" value="{{ $data["edit_name"] }}" required >
                    <span id="span_name" class="invalid-feedback"></span>
                </div>
            </div>
            <div class="col-12 col-md-6 pl-md-2">
                <div class="form-group">
                    <label for="{{ $id }}_edit_initials" class="text-muted">Sigla *</label>
                    <input id="{{ $id }}_edit_initials" type="text" class="form-control form-control-sm" name="initials" value="{{ $data["edit_initials"] }}" required >
                    <span id="span_initials" class="invalid-feedback"></span>
                </div>
            </div>

            <div class="col-12 ">
                <div class="form-group">
                    <label for="{{ $id }}_edit_image" class="text-muted">Imagem</label>
                    <input id="{{ $id }}_edit_image" type="file" class="form-control-file" name="image">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 pl-2 ml-auto">
                <button type="submit" class="btn btn-success btn-sm btn-block" >
                    Salvar <i class="ml-2 d-none fas fa-spinner fa-spin text-white"></i>
                </button>
            </div>
        </div>
    </form>
