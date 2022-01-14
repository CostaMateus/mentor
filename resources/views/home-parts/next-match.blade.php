
    <style>
        td label {
            display: block;
            position: relative;
            padding-left: 15px;
            cursor: pointer;
            font-size: 18px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        td label input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            height: 22px;
            width:  22px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        td label:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        td label input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        td label input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        td label .checkmark:after {
            left:    9px;
            top:     6px;
            width:   5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>

    <div class="modal fade" id="nextmatchModal" tabindex="-1" role="dialog" aria-labelledby="nextmatchModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nextmatchModalTitle">Escalar jogadores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("loading.game") }}" method="POST" >
                    @csrf
                    <input type="hidden" name="team"    value="{{ session("p_team_id") }}"  >
                    <input type="hidden" name="advTeam" value="{{ $nextMatch['adv']->id }}" >

                    <div id="tbnextmatch" class=" modal-body row px-0 py-0">
                        <div class="col col-lg-8 mx-auto">
                            <div class="table-responsive">

                                <table class="table table-borderless table-hover mb-0">
                                    <tbody class="">
                                        @foreach ($team->players as $p)
                                            @if (!$p->mentor)
                                                @php
                                                    $rolTx1 = $p->attribute->role;
                                                    $rolTx2 = $p->attribute->secondary_role;
                                                    $role1  = Helper::formatRole($rolTx1);
                                                    $role2  = Helper::formatRole($rolTx2);
                                                @endphp

                                                <tr id="nm-{{ $p->id }}" >
                                                    <td class="text-center" >
                                                        <img class="my-auto flag" src="{{ asset("images/flags/") }}/{{ $p->country->code }}_64.png" alt="{{ $p->country->code }}" title="{{ $p->country->name }}" width="25px" height="25px">
                                                    </td>
                                                    <td class="nick"                                          ><b>{{ $p->nickname }}</b></td>
                                                    <td class="energy text-center"                            >{{ $p->attribute->energy }}%</td>
                                                    <td class="force text-center"                             >{{ $p->attribute->force }}</td>
                                                    <td class="role text-center text-bold text-{{ $rolTx1 }}" >
                                                        <label class="mb-0" for="r-check-{{ $p->id }}">
                                                            {{ $role1 }}
                                                            <input id="r-check-{{ $p->id }}" type="checkbox" value="{{ $p->id }}" name="{{ $rolTx1 }}">
                                                            <span class="my-auto checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td class="secondary text-center text-bold text-{{ $rolTx2 }}" >
                                                        <label class="mb-0" for="s-check-{{ $p->id }}">
                                                            {{ $role2 }}
                                                            <input id="s-check-{{ $p->id }}" type="checkbox" value="{{ $p->id }}" name="{{ $rolTx2 }}">
                                                            <span class="my-auto checkmark"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  id="game" class="btn btn-info mb-0" type="submit" disabled >Jogar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('compl_js')
        <script>
            $(".role input").on("click", function () {
                const id       = $(this).val();
                const checkbox = $(this).attr("name");

                $(`#nm-${id} .secondary input`).prop( "checked", false );

                $(`.role      input[name=${checkbox}]`).not(this).prop( "checked", false );
                $(`.secondary input[name=${checkbox}]`).prop( "checked", false );

                enableButton();
            });

            $(".secondary input").on("click", function () {
                const id       = $(this).val();
                const checkbox = $(this).attr("name");

                $(`#nm-${id} .role input`).prop( "checked", false );

                $(`.role      input[name=${checkbox}]`).prop( "checked", false );
                $(`.secondary input[name=${checkbox}]`).not(this).prop( "checked", false );

                enableButton();
            });

            // $("#game").on("click", function() {
            //     if ($(":checkbox:checked").length == 5)
            //     {
            //         console.log($("form").serialize());
            //     }
            // });

            enableButton = function ()
            {
                if ($(":checkbox:checked").length == 5)
                {
                    $("#game").removeAttr("disabled");
                }
                else
                {
                    $("#game").attr("disabled", true);
                }
            }
        </script>
    @endsection
