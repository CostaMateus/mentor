
<div class="row">
    @if (count($data["divisions"]) > 0)

        @foreach ($data["divisions"] as $division)

            <div class="col-12 col-md-6 border">
                <div class="row my-2">
                    <div class="col-12">
                        <p class="h6 text-bold">{{ $division->name }}</p>
                    </div>

                    @foreach ($data["teams"] as $team)

                        @if ($division->id == $team->division_id)

                            <div class="col-6 my-1 d-flex">
                                <div class="my-auto">
                                    <img class="bg-img-team p-1 mr-1"
                                        src="{{ $image_path }}/teams/{{ $team->image }}"
                                        onerror="this.onerror=null;this.src='{{ $image_path }}/teams/default.png';"
                                        alt="{{ $team->initials }}" width="50px" height="50px">
                                </div>
                                <div class="flex-fill align-self-center">
                                    <p class="mb-0" >{{ $team->name }}</p>
                                </div>
                            </div>

                        @endif


                    @endforeach

                </div>
            </div>

        @endforeach

        @if (Helper::hasTeamWithoutDivision($data["teams"]))

            <div class="col-12 col-md-6 border">
                <div class="row my-2">
                    <div class="col-12">
                        <p class="h6 text-bold">Sem divisão</p>
                    </div>

                    @foreach ($data["teams"] as $team)

                        @if (is_null($team->division_id))

                            <div class="col-6 my-1 d-flex">
                                <div class="my-auto">
                                    <img class="bg-img-team p-1 mr-1"
                                        src="{{ $image_path }}/teams/{{ $team->image }}"
                                        onerror="this.onerror=null;this.src='{{ $image_path }}/teams/default.png';"
                                        alt="{{ $team->initials }}" width="50px" height="50px">
                                </div>
                                <div class="flex-fill align-self-center">
                                    <p class="mb-0" >{{ $team->name }}</p>
                                </div>
                            </div>

                        @endif


                    @endforeach

                </div>
            </div>

        @endif

    @else

        <div class="col-12 col-md-6 border">
            <div class="row my-2">
                <div class="col-6 my-1 d-flex"><p class="mb-0">Nenhum time encontrado.<p></div>
            </div>
        </div>

    @endif

</div>
