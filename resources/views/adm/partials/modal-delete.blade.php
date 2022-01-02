
    <div id="{{ $modal_id }}" class="modal fade teste" tabindex="-1" role="dialog" aria-labelledby="{{ $title_id }}" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header text-danger">
                    <h5 id="{{ $title_id }}" class="modal-title">{{ $title_name }}</h5>

                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="{{ $form_id }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 text-center">
                                <p>{{ $text }}</p>
                            </div>
                            <div id="delete_invalid" class="col-12 text-center d-none">
                                <p class="text-danger" ></p>
                            </div>
                            <div class="col-3 mx-auto">
                                <button type="submit" class="btn btn-danger btn-sm btn-block" >
                                    Confirmar <i class="ml-2 d-none fas fa-spinner fa-spin text-white"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
