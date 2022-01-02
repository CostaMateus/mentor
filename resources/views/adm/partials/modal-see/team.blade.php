
<div class="row">
    <div class="col-12 border">
        <div class="row my-2">

            @if (!is_null($data["players"]))

                @foreach ($data["players"] as $player)

                    @php
                        $rolTx1  = $player->attribute->role;
                        $aux_r   = Helper::formatRoleFull2($rolTx1);
                        $role1   = $aux_r[0];

                        $order   = $player->mentor  ? "0" : $aux_r[1];
                        $style   = $player->mentor  ? "" : "style='color:#6c757d;'";
                        $mentor  = !$player->mentor ? "" : "<strong>Treinador</strong> | ";

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

                        $country = $player->country;
                        $ctt     = Helper::convertDate($player->contract->end, true);
                    @endphp

                    <div class="col-6 my-1 d-flex order-{{ $order }}">
                        <div class="my-auto mr-1">
                            <i class="fas fa-user" {!! $style !!} ></i>
                        </div>
                        <div class="flex-fill align-self-center striped p-2">
                            <p class="mb-0 small" title="Posição primária e secundária" >
                                {!! $mentor !!}
                                1ª pos. <strong class="text-{{ $rolTx1 }}" >{{ $role1 }}</strong> |
                                2º pos. <strong class="text-{{ $rolTx2 }}" >{{ $role2 }}</strong>
                            </p>
                            <p class="mb-0 " >{{ $player->name }} "<strong>{{ $player->nickname }}</strong>" {{ $player->lastname }}</p>
                            <p class="mb-0 " >Sexo: {{ $player->sex }} | Idade: {{ $age->y }} | Nacionalidade: <img src="{{ asset("images/flags") }}/{{ $country->code }}_64.png" alt="{{ $country->code }}" title="{{ $country->name }}" width="20px" height="20px"></p>
                            <p class="mb-0 " >Força: {{ $force }} | Energia: {{ $energy }}%</p>
                            <p class="mb-0 " >Salário: R$ {{ $salary }} | Passe: R$ {{ $pass }}</p>
                            <p class="mb-0 " >Contrato até: {{ $ctt }}</p>
                        </div>
                    </div>

                @endforeach

            @else

                <div class="col-12 col-md-6 mx-auto">
                    <p class="my-3 text-center">Nenhum jogador encontrado.<p>
                </div>

            @endif

        </div>
    </div>
</div>
