    <!-- inicio Finanças do Time Modal -->
    <div class="modal fade" id="team-finances" tabindex="-1" role="dialog" aria-labelledby="team-finances-title" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="team-finances-title">Finanças</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="tb-team-finances" class="tbSchedule modal-body row px-0 py-0">
                    <!-- tabela de receita -->
                    <div id="income" class="table-responsive col-12 ">
                        <table class="table table-borderless table-sm table-hover mb-0">
                            <thead>
                                <tr class="text-success">
                                    <th class="tb-title" >Receita</th>
                                    <th class="tb-value" >Valor (R$)</th>
                                </tr>
                            </thead>
                            <tbody class="customScrollbar">
                                @foreach ($finances as $f)
                                    @if ($f->type)
                                        <tr>
                                            <td class="tb-title" >{{ Helper::formatteFinance($f->category) }}</td>
                                            <td class="tb-value" >{{ Helper::formatSalary($f->value) }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td class="tb-title" ><strong>Total receita</strong>:</td>
                                    <td class="tb-value" >{{ Helper::formatSalary($income) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="expenses" class="table-responsive col-12 my-4">
                        <table class="table table-borderless table-sm table-hover mb-0">
                            <thead>
                                <tr class="text-warning">
                                    <th class="tb-title" >Despesa</th>
                                    <th class="tb-value" >Valor (R$)</th>
                                </tr>
                            </thead>
                            <tbody class="customScrollbar">
                                @foreach ($finances as $f)
                                    @if (!$f->type)
                                        <tr>
                                            <td class="tb-title" >{{ Helper::formatteFinance($f->category) }}</td>
                                            <td class="tb-value" >{{ Helper::formatSalary($f->value) }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td class="tb-title" ><strong>Total despesas</strong>:</td>
                                    <td class="tb-value" ><strong>{{ Helper::formatSalary($expenses) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="total" class="table-responsive col-12 ">
                        <table class="table table-borderless table-sm table-hover mb-0">
                            <thead>
                                <tr class="text-info">
                                    <th class="tb-title" >Balanço mês</th>
                                    <th class="tb-value" >Valor (R$)</th>
                                </tr>
                            </thead>
                            <tbody class="customScrollbar">
                                <tr>
                                    <td class="tb-title" >Receita:</td>
                                    <td class="tb-value" >{{ Helper::formatSalary($income) }}</td>
                                </tr>
                                <tr>
                                    <td class="tb-title" >Despesa:</td>
                                    <td class="tb-value" >{{ Helper::formatSalary($expenses) }}</td>
                                </tr>
                                <tr>
                                    <td class="tb-title" ><strong>Saldo</strong>:</td>
                                    <td class="tb-value" ><strong>{{ Helper::formatSalary($total) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- final  Finanças do Time Modal -->