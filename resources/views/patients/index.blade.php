@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0">Betegek</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">
        + Új páciens
    </a>
</div>

{{-- Kereső --}}
<form method="GET" action="{{ route('patients.index') }}" class="row g-2 mb-3">
    <div class="col-sm-4">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Keresés név / TAJ / e-mail / telefon">
    </div>
    <div class="col-sm-auto">
        <button class="btn btn-outline-secondary" type="submit">Keresés</button>
        <a href="{{ route('patients.index') }}" class="btn btn-link">Visszaállítás</a>
    </div>
</form>

{{-- Lista --}}
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Azonosító</th>
                    <th>Név</th>
                    <th>Születési dátum</th>
                    <th>Azonosító</th>
                    <th>Elérhetőség</th>
                    <th class="text-end">Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $patient)
                <tr>
                    <td>#{{ $patient->id }}</td>
                    <td class="fw-semibold">
                        <a href="{{ route('patients.show', $patient) }}" class="text-decoration-none">
                            {{ $patient->last_name }} {{ $patient->first_name }}
                        </a>
                    </td>
                    <td>{{ $patient->birth_date }}</td>
                    <td><span class="text-muted">{{ $patient->id_number }}</td>
                    <td>
                        @if($patient->email) <div>{{ $patient->email }}</div> @endif
                        @if($patient->phone) <div>{{ $patient->phone }}</div> @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('patients.show', $patient) }}" class="btn btn-sm btn-link text-secondary p-0 me-2" title="Profil">
                            <i class="bi bi-person-lines-fill" style="font-size: 1.2rem;"></i>
                        </a>

                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-link text-primary p-0 me-2" title="Szerkesztés">
                            <i class="bi bi-pencil-square" style="font-size: 1.2rem;"></i>
                        </a>

                        <form action="{{ route('patients.status', $patient) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_active" value="{{ $patient->is_active ? 0 : 1 }}">

                            @if($patient->is_active)
                            <button type="submit" class="btn btn-sm btn-link text-success p-0" title="Inaktiválás">
                                <i class="bi bi-check-circle-fill" style="font-size: 1.2rem;"></i>
                            </button>
                            @else
                            <button type="submit" class="btn btn-sm btn-link text-secondary p-0" title="Aktiválás">
                                <i class="bi bi-x-circle-fill" style="font-size: 1.2rem;"></i>
                            </button>
                            @endif
                        </form>

                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Biztosan törlöd a pácienst?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-link text-danger p-0" title="Törlés">
                                <i class="bi bi-trash-fill" style="font-size: 1.2rem;"></i>
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">Nincs találat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if(method_exists($patients, 'links'))
<div class="mt-3">
    {{ $patients->withQueryString()->links() }}
</div>
@endif
@endsection