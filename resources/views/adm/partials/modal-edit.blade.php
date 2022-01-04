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
                    @php
                        $arr = [
                            "form_id" => $form_id,
                            "id"      => $id,
                            "leagues" => (isset($data["leagues"])) ? $data["leagues"] : "",
                            "data"    => $data
                        ];
                    @endphp

                    @if ($part === "league")

                        @include('adm/partials/modal-edit.league', $arr)

                    @elseif ($part === "team")

                        @include('adm/partials/modal-edit.team', $arr)

                    @endif

                </div>
            </div>
        </div>
    </div>
