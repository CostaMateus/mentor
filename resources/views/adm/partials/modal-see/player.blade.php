
<div class="row">
    <div class="col-12 border">
        <div class="row my-2">

            @if (!is_null($data["player"]))
                @php
                    $player = $data["player"];

                    $rolTx1  = $player->attribute->role;
                    $role1   = Helper::formatRoleFull2($rolTx1)[0];

                    $rolTx2  = $player->attribute->secondary_role;
                    $role2   = Helper::formatRoleFull2($rolTx2)[0];

                    $force   = $player->attribute->force;
                    $energy  = $player->attribute->energy;
                    $salary  = Helper::formatCurrency($player->attribute->salary);
                    $pass    = Helper::formatCurrency($player->attribute->pass);

                    $d1      = new DateTime($player->birthday);
                    // A data de comparação não pode ser a data de inicio da temporado do jogo.
                    // Tem que ser a data corrente do sistema do jogo.
                    // No momento ela não existe.
                    $d2      = new DateTime(config("mentor.start_date"));
                    $age     = $d1->diff($d2);

                    $team_name = ($player->team) ? $player->team->name : "";
                @endphp

                <div class="col-12 py-2 text-center">
                    <p class="mb-1" >Posição primária: <strong class="text-{{ $rolTx1 }}" >{{ $role1 }}</strong></p>
                    <p class="mb-1" >Posição secundária: <strong class="text-{{ $rolTx2 }}" >{{ $role2 }}</strong></p>
                    <p class="mb-1" >Nacionalidade: <img src="{{ asset("images/flags") }}/{{ $player->country->code }}_64.png" alt="{{ $player->country->code }}" title="{{ $player->country->name }}" width="20px" height="20px"></p>
                    <p class="mb-1" >Sexo: <strong>{{ $player->sex }}</strong></p>
                    <p class="mb-1" >Idade: <strong>{{ $age->y }}</strong></p>
                    <p class="mb-1" >Força: <strong>{{ $force }}</strong></p>
                    <p class="mb-1" >Energia: <strong>{{ $energy }}%</strong></p>
                    <p class="mb-1" >Salário: <strong>R$ {{ $salary }}</strong></p>
                    <p class="mb-1" >Passe: <strong>R$ {{ $pass }}</strong></p>
                    <p class="mb-0" >Time atual: <strong>{{ $team_name }}</strong></p>
                </div>
            @else

                <div class="col-12 col-md-6 mx-auto">
                    <p class="my-3 text-center">Nenhuma informação encontrada.<p>
                </div>

            @endif

        </div>
    </div>
</div>
