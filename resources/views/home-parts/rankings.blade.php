
    <div class="modal fade" id="rankingModal" tabindex="-1" role="dialog" aria-labelledby="rankingModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="rankingModalTitle">CBLOL {{ Helper::getYear($matchups[0]->date) }} - {{ $matchups[0]->split }}ª Etapa</h5> --}}
                    <div class="col-4 pl-0">
                        <select id="league_id" class="form-control form-control-sm" name="league_id" style="width: 100%" >
                            @foreach ($leagues as $league)
                                <option value="{{ $league->id }}" @if (session('p_league_id') == $league->id) selected @endif >{{ $league->initials }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 pl-0">
                        <select id="division_id" class="form-control form-control-sm" name="division_id" style="width: 100%" disabled ></select>
                    </div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="tbRanking" class=" modal-body row px-0 py-0">
                    <div class="table-responsive col-12 ">
                        <table class="table table-borderless table-hover mb-0">
                            <thead class="">
                                <tr class="tr-thead">
                                    <th class="tb-position" >#</th>
                                    <th class="tb-color"    > </th>
                                    <th class="tb-icon"     > </th>
                                    <th class="tb-name"     > </th>
                                    <th class="tb-ps"       >V</th>
                                    <th class="tb-ps"       >D</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                {{-- <tr>
                                    <td class="tb-color color-final" ></td>
                                    <td class="tb-color color-climbing" ></td>
                                    <td class="tb-color color-climbing" ></td>
                                    <td class="tb-color color-pre-climbing" ></td>
                                    <td class="tb-color color-pre-climbing" ></td>
                                    <td class="tb-color color-promotion" ></td>
                                    <td class="tb-color color-promotion" ></td>
                                    <td class="tb-color color-demotion" ></td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <div class="col-lg-8 col-12 mx-auto px-0">
                        <p class="mb-0">
                            <span class="mb-0 color-final"        >| Classificado direto para a final                          </span><br>
                            <span class="mb-0 color-climbing"     >| Classificados para Série Escalada                         </span><br>
                            <span class="mb-0 color-pre-climbing" >| Vencedor, joga Série Escalada; Perdedor, Série de Promoção</span><br>
                            <span class="mb-0 color-promotion"    >| Participantes da Série de Promoção                        </span><br>
                            <span class="mb-0 color-demotion"     >| Rebaixamento automático                                   </span>
                        </p>
                    </div>
                    <div class="col-lg-4 col-12 mx-auto px-0 text-lg-right">
                        <p class="mb-0">P - Pontos <br> V - Vitórias <br> D - Derrotas</p>
                    </div> --}}
                    <p class="mb-0">V - Vitórias | D - Derrotas</p>
                </div>
            </div>
        </div>
    </div>