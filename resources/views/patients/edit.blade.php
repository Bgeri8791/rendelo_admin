@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Páciens szerkesztése</h1>

<div class="card">
    <div class="card-body">
        <form action="{{ route('patients.update', $patient) }}" method="POST" class="row g-3">
            @csrf @method('PUT')

            <div class="col-md-6">
                <label class="form-label">Vezetéknév</label>
                <input type="text" name="last_name" value="{{ old('last_name', $patient->last_name) }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Keresztnév</label>
                <input type="text" name="first_name" value="{{ old('first_name', $patient->first_name) }}" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Születési dátum</label>
                <input type="date" name="birth_date" value="{{ old('birth_date', $patient->birth_date) }}" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Azonosító típusa</label>
                <select name="id_type" class="form-select" required>
                    <option value="TAJ" @selected(old('id_type', $patient->id_type)==='TAJ')>TAJ</option>
                    <option value="PASSPORT" @selected(old('id_type', $patient->id_type)==='PASSPORT')>Útlevél</option>
                    <option value="PERSONAL_ID" @selected(old('id_type', $patient->id_type)==='PERSONAL_ID')>Személyi</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Azonosító szám</label>
                <input type="text" name="id_number" value="{{ old('id_number', $patient->id_number) }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" value="{{ old('email', $patient->email) }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Telefon</label>
                <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}" class="form-control">
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                           {{ old('is_active', $patient->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        Aktív
                    </label>
                </div>
            </div>

            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary" type="submit">Mentés</button>
                <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">Mégse</a>
            </div>
        </form>
    </div>
</div>
@endsection
