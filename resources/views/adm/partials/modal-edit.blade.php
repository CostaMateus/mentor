    <div id="{{ $modal_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="{{ $title_id }}" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="bg-img-team mr-2 my-auto"
                         src="{{ $image_path }}/{{ $image_name }}"
                         onerror="this.onerror=null;this.src='{{ $image_path }}/default.png';"
                         alt="{{ $image_alt }}" width="30px" height="30px">
                    <p id="{{ $title_id }}" class="modal-title my-auto h4">{{ $title_name }}</p>

                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="{{ $form_id }}" class="edit-form" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="{{ $id }}_edit_name" class="text-muted">Nome da liga *</label>
                                    <input type="text" id="{{ $id }}_edit_name" class="form-control form-control-sm" name="name" value="{{ $data["edit_name"] }}" required >
                                    <span id="span_{{ $id }}_edit_name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pr-md-2">
                                <div class="form-group">
                                    <label for="{{ $id }}_edit_initials" class="text-muted">Sigla *</label>
                                    <input type="text" id="{{ $id }}_edit_initials" class="form-control form-control-sm" name="initials" value="{{ $data["edit_initials"] }}" required >
                                    <span id="span_{{ $id }}_edit_initials" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 pl-md-2">
                                <div class="form-group">
                                    <label for="{{ $id }}_edit_nrdivisions" class="text-muted">Nº de divisões</label>
                                    <select id="{{ $id }}_edit_nrdivisions" class="form-control form-control-sm" name="nrdivisions" style="width: 100%" >
                                        <option value="0" >Selecione...</option>
                                        <option value="1" @if ($data["edit_nrdivisions"] == 1) selected @endif >1</option>
                                        <option value="2" @if ($data["edit_nrdivisions"] == 2) selected @endif >2</option>
                                        <option value="3" @if ($data["edit_nrdivisions"] == 3) selected @endif >3</option>
                                        <option value="4" @if ($data["edit_nrdivisions"] == 4) selected @endif >4</option>
                                    </select>
                                    <span id="span_nrdivisions" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="{{ $id }}_edit_image" class="text-muted">Imagem</label>
                                    <input id="{{ $id }}_edit_image" type="file" class="form-control-file" name="image">
                                    <span id="span_{{ $id }}_edit_image" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group form-check">
                                    <input class="form-check-input my-auto" type="checkbox" id="{{ $id }}_edit_special" name="special" @if ($data["edit_special"]) checked @endif >
                                    <label class="form-check-label my-auto" for="{{ $id }}_edit_special" >
                                        É uma liga especial?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="update_invalid" class="col-12 text-center d-none">
                                <p class="text-danger" ></p>
                            </div>
                            <div class="col-6 pl-2 ml-auto">
                                <button type="submit" class="btn btn-success btn-sm btn-block" >
                                    Salvar <i class="ml-2 d-none fas fa-spinner fa-spin text-white"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
