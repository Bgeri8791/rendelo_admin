<!doctype html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rendelő Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Rendelő Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="topNav" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link {{ request()->is('patients*') ? 'active' : '' }}" href="{{ route('patients.index') }}">Betegek</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('statistics') ? 'active' : '' }}" href="{{ route('statistics.index') }}">Statisztika</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mb-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <div class="fw-bold mb-1">Hiba történt:</div>
            <ul class="mb-0">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
