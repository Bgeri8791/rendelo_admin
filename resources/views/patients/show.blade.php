@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0">Páciens profil</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-outline-primary">Szerkesztés</a>
        <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">Vissza a listához</a>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="fw-bold">Állapot</div>
                    @if($patient->is_active)
                    <span class="badge text-bg-success">Aktív</span>
                    @else
                    <span class="badge text-bg-secondary">Inaktív</span>
                    @endif
                </div>
                <div class="mb-2"><span class="text-muted">Név:</span> <br>{{ $patient->last_name }} {{ $patient->first_name }}</div>
                <div class="mb-2"><span class="text-muted">Születési dátum:</span> <br>{{ $patient->birth_date }}</div>
                <div class="mb-2"><span class="text-muted">Azonosító:</span> <br>{{ $patient->id_type }} — {{ $patient->id_number }}</div>
                @if($patient->email)<div class="mb-2"><span class="text-muted">E-mail:</span> <br>{{ $patient->email }}</div>@endif
                @if($patient->phone)<div class="mb-2"><span class="text-muted">Telefon:</span> <br>{{ $patient->phone }}</div>@endif

                <form action="{{ route('patients.status', $patient) }}" method="POST" class="mt-3">
                    @csrf @method('PATCH')
                    <input type="hidden" name="is_active" value="{{ $patient->is_active ? 0 : 1 }}">
                    <button type="submit"
                        class="btn w-100 {{ $patient->is_active ? 'btn-danger' : 'btn-success' }}"
                        title="{{ $patient->is_active ? 'Inaktiválás' : 'Aktiválás' }}">
                        @if($patient->is_active)
                        <i class="bi bi-x-circle-fill me-1"></i> Inaktiválás
                        @else
                        <i class="bi bi-check-circle-fill me-1"></i> Aktiválás
                        @endif
                    </button>

                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-body">
                <h2 class="h5 mb-3">Vizitek</h2>
                @include('visits._table', ['visits' => $patient->visits ?? []])
            </div>
        </div>
    </div>
</div>
@endsection