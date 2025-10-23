<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SIMRS Andini') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar-brand {
            font-weight: 600;
            color: #0d6efd !important;
        }
        .nav-link.active {
            font-weight: 600;
            border-bottom: 2px solid #0d6efd;
        }
        footer {
            border-top: 1px solid #dee2e6;
            padding: 15px 0;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">SIMRS Andini</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home.indexKeuangan') ? 'active' : '' }}" 
                            href="{{ route('home.keuangan') }}">Keuangan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HEADER -->
    @if (isset($header))
        <header class="bg-light py-3 border-bottom mb-4">
            <div class="container">
                <h4 class="mb-0">{{ $header }}</h4>
            </div>
        </header>
    @endif

    <!-- CONTENT -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white text-center mt-auto">
        <div class="container">
            © {{ date('Y') }} RSIA Andini — All Rights Reserved.
        </div>
    </footer>

    <!-- Script tambahan tiap halaman -->
    @stack('scripts')
</body>
</html>
