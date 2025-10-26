{{-- Vár: $visits (Collection vagy array) --}}
@if(empty($visits) || (is_countable($visits) && count($visits) === 0))
    <div class="text-muted">Nincs rögzített vizit.</div>
@else
    <div class="table-responsive">
        <table class="table table-sm table-striped align-middle mb-0">
            <thead class="table-light">
            <tr>
                <th>Dátum</th>
                <th>Ok</th>
                <th>Diagnózis</th>
                <th class="text-end">Díj(Ft)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($visits as $v)
                <tr>
                    <td>
                        {{ \Illuminate\Support\Carbon::parse($v->visit_date)->format('Y-m-d H:i') }}
                    </td>
                    <td>{{ $v->reason }}</td>
                    <td>{{ $v->diagnosis ?? '—' }}</td>
                    <td class="text-end">{{ number_format((int)$v->price, 0, ',', ' ') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
