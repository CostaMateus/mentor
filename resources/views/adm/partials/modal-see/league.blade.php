
<div class="row">

    @forelse ($data["divisions"] as $division)

        <div class="col-12 col-md-6 border">
            <div class="row my-2">
                <div class="col-12">
                    <p class="h6 text-bold">{{ $division->name }}</p>
                </div>

                @forelse ($data["teams"] as $team)

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

                @empty

                    <div class="col-12 col-md-6 mx-auto">
                        <p class="my-3 text-center">Nenhum time encontrado.<p>
                    </div>

                @endforelse

            </div>
        </div>

    @empty

        <div class="col-12 col-md-6 mx-auto">
            <p class="my-3 text-center">Nenhuma divisão encontrada.<p>
        </div>

    @endforelse


    @if (($data["divisions"]->count() > 0) && Helper::hasTeamWithoutDivision($data["teams"]))

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

</div>
