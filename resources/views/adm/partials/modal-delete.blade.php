
    <div id="{{ $modalId }}" class="modal fade teste" tabindex="-1" role="dialog" aria-labelledby="{{ $titleId }}" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header text-danger">
                <h5 id="{{ $titleId }}" class="modal-title">{{ $title }}</h5>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="{{ $formId }}" action="#" method="#" >
                        @csrf
                        <div class="row">
                            <div class="col-12 text-center">
                                <p>{{ $text }}</p>
                            </div>
                            <div class="col-3 mx-auto">
                                <button type="submit" class="btn btn-danger btn-sm btn-block" >Confirmar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>