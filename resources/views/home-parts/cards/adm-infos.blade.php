
            {{-- ADM INFOS --}}
            <div id="adm-infos" class="col-12 col-lg-4 px-2 pl-lg-1 pt-1 pb-2" >
                <div class="p-2 bg-default h-100">
                    <div class="row">
                        <div class="col-8 pb-2 " >
                            <h4 class="mb-0 text-left" >Jogadores: {{ $total_ply }}/15</h4>
                        </div>
                        <div class="col-4 pb-2 " >
                            <p class="mb-0 text-right" >23/01/2019</p>
                        </div>
                        <div class="col-12 py-2" >
                            <h4 class="mb-0 text-left" >Caixa:
                                <a class="text-info" href="" data-toggle="modal" data-target="#team-finances" >
                                    <strong><u>R$ {{ Helper::formatSalary($finances->last()->value) }}</u></strong>
                                </a>
                            </h4>
                        </div>
                        <div class="col-12 pt-2 d-none" >
                            <!-- <h4 class="text-left" >Notificações: <a href="msgs.html" class="text-info"><strong>sem novas notificações</strong></a></h4> -->
                            <h4 class="mb-0 text-left" >Notificações:
                                <a href="msgs.html" class="" ><span class="badge badge-info">2 novas</span></a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
