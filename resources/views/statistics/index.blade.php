@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Statisztika</h1>

<div class="row g-3">
    {{-- Heti vizitszám kártya --}}
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-muted">Heti vizitszám (elmúlt 7 nap)</div>
                <div class="display-6 fw-semibold">{{ $weeklyVisits }}</div>
            </div>
        </div>
    </div>

    {{-- Legutóbbi vizitek --}}
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="fw-bold mb-2">Legutóbbi vizitek</div>
                <ul class="list-unstyled mb-0">
                    @forelse($recentVisits as $v)
                        <li class="mb-2">
                            <div class="small text-muted">
                                {{ \Illuminate\Support\Carbon::parse($v->visit_date)->format('Y-m-d H:i') }}
                            </div>
                            <div>
                                {{ $v->patient->last_name }} {{ $v->patient->first_name }}
                                — <span class="text-muted">{{ $v->reason }}</span>
                            </div>
                        </li>
                    @empty
                        <li class="text-muted">Nincs adat.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    {{-- Top okok --}}
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="fw-bold mb-2">Top okok</div>
                <ol class="mb-0">
                    @forelse($topReasons as $row)
                        <li>{{ $row->reason }} <span class="text-muted">({{ $row->total }})</span></li>
                    @empty
                        <li class="text-muted">Nincs adat.</li>
                    @endforelse
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
