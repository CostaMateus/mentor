
            {{-- PLAYERS CARD --}}
            <div id="players-card" class="col-12 col-md-7 col-lg-8 px-2 pl-md-1 py-1 pt-md-0">
                <div class="table-responsive bg-default">
                    <table id="players-table" class="table table-borderless table-striped mb-0 table-mentor" data-toggle="table" >
                        <thead class="bg-light ">
                            <tr>
                                <th class="nick"                  data-field="nick"   data-sortable="true" title="Nick"               >Jogador</th>
                                <th class="energy"                data-field="energy" data-sortable="true" title="Energia"            >Energia</th>
                                <th class="text-center force"     data-field="force"  data-sortable="true" title="Força"              >F</th>
                                <th class="text-center role"      data-field="role1"  data-sortable="true" title="Posição primária"   >1ª</th>
                                <th class="text-center secondary" data-field="role2"  data-sortable="true" title="Posição secundária" >2ª</th>
                                <th class="text-center salary"    data-field="salary" data-sortable="true" title="Salário (R$)"       >Salário</th>
                                <th class="text-center pass"      data-field="pass"   data-sortable="true" title="Passe (R$)"         >Passe</th>
                                <th class="text-center age"       data-field="age"    data-sortable="true" title="Idade"              >I.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->players as $p)
                                @if (!$p->mentor)
                                    @php
                                        $rolTx1 = $p->attribute->role;
                                        $rolTx2 = $p->attribute->secondary_role;

                                        $role1  = Helper::formatRole($rolTx1);
                                        $role2  = Helper::formatRole($rolTx2);
                                    @endphp

                                    <tr id="p-{{ $p->id }}" >
                                        <td class="nick"                                               >{{ $p->name }} <b>'{{ $p->nickname }}'</b> {{ $p->lastname }}</td>
                                        <td class="energy align-middle" >
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" style="width: {{ $p->attribute->energy }}%">{{ $p->attribute->energy }}%</div>
                                            </div>
                                        </td>
                                        <td class="force     text-center"                              >{{ $p->attribute->force }}</td>
                                        <td class="role      text-center text-bold text-{{ $rolTx1 }}" >{{ $role1 }}</td>
                                        <td class="secondary text-center text-bold text-{{ $rolTx2 }}" >{{ $role2 }}</td>
                                        <td class="salary    text-center"                              >{{ Helper::formatSalary($p->attribute->salary) }}</td>
                                        <td class="pass      text-center"                              >{{ Helper::formatSalary($p->attribute->pass) }}</td>
                                        <td class="age       text-center"                              >{{ $p->age }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
