    <div class="d-flex flex-column flex-md-row justify-content-between">
        <div class="d-flex justify-content-center">
            <div class="form-group mb-0 mb-md-3 d-flex justify-content-md-between">
                <div class="pr-1 my-auto">
                    <select id="perpage" class="form-control form-control-sm" style="width: 100%">
                        <option value="100" @if (session('pp') == 100) selected @endif >100</option>
                        <option value="200" @if (session('pp') == 200) selected @endif >200</option>
                        <option value="300" @if (session('pp') == 300) selected @endif >300</option>
                        <option value="500" @if (session('pp') == 500) selected @endif >500</option>
                    </select>
                </div>
                <small class="pl-1 text-muted my-auto">por página</small>
            </div>
        </div>

        <div class="text-center">
            @php
                $de   = ($data->currentPage() * $data->perPage()) - $data->perPage() + 1;
                if      ($data->total() == 0) $de = $data->total();
                $para = ($data->currentPage() * $data->perPage());
                if      ($para > $data->total()) $para = $data->total();
            @endphp
            <p class="text-muted my-1">Mostrando {{ $de }} até {{ $para }} de {{ number_format($data->total(), 0, ',', '.') }}</p>
        </div> <!-- /quntdd de registros exibidos -->

        <div>
            @php
                $link_limit = 7;
                $pp = '&pp=' . session('pp');
                $pp .= (!session('name'))  ? '' :'&name=' . session('name');
            @endphp
            @if ($data->lastPage() >= 1)
                <ul class="pagination pagination-sm justify-content-center justify-content-md-end">
                    <li class="page-item {{ ($data->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $data->url(1) }}<?php echo($pp)?>" aria-label="Anterior">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    @for ($i = 1; $i <= $data->lastPage(); $i++)
                        @php
                            $half_total_links = floor($link_limit / 2);
                            $from = $data->currentPage() - $half_total_links;
                            $to = $data->currentPage() + $half_total_links;
                            if ($data->currentPage() < $half_total_links) $to += $half_total_links - $data->currentPage();
                            if ($data->lastPage() - $data->currentPage() < $half_total_links) $from -= $half_total_links - ($data->lastPage() - $data->currentPage()) - 1;
                        @endphp

                        @if ($from < $i && $i < $to)
                            <li class="page-item {{ ($data->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $data->url($i) }}<?php echo($pp)?>">
                                    {{ $i }}
                                </a>
                            </li>
                        @endif
                    @endfor

                    <li class="page-item {{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $data->url($data->lastPage()) }}<?php echo($pp)?>" aria-label="Próximo">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>