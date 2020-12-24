
    <div id="{{ $modalId }}" class="modal fade teste" tabindex="-1" role="dialog" aria-labelledby="{{ $title }}" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <img id="{{ $image }}" class="bg-img-team mr-2 my-auto" src="" alt="" width="30px" height="30px">
                    <p id="{{ $title }}" class="modal-title my-auto h4"></p>
                    <button type="button" class="close my-auto py-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-2">
                    <div id="{{ $body }}" class="row "></div>
                </div>
            </div>
        </div>
    </div>
