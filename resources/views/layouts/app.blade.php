<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f0f8ff; /* AliceBlue */
        }
        .navbar {
            background-color: #004080; /* Dark Blue */
        }
        .navbar-brand, .nav-link, .dropdown-item {
            color: #ffffff !important;
        }
        .nav-link.active {
            background-color: #0056b3; /* Medium Blue */
        }
        .dropdown-menu {
            background-color: #004080;
        }
        .dropdown-item:hover {
            background-color: #0056b3;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #004080;
        }
        .btn-primary:hover {
            background-color: #004080;
            border-color: #003366;
        }
        .card-header {
            background-color: #0056b3;
            color: white;
        }
        .nav-link.active {
        background-color: #0056b3;
        border-radius: 12px; /* Membuat sudut melengkung */
        color: white !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Aplikasi Satpam</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('laporankejadian*') ? 'active' : '' }}" href="{{ route('laporankejadian.index') }}">Laporan Kejadian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('satpam*') ? 'active' : '' }}" href="{{ route('satpam.index') }}">List Satpam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('jadwal*') ? 'active' : '' }}" href="{{ route('jadwal.index') }}">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('routine-check*') ? 'active' : '' }}" href="{{ route('routine-check.index') }}">Cek Rutin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cctv*') ? 'active' : '' }}" href="{{ route('cctv.index') }}">CCTV</a>
                    </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <!-- Logout -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li><button type="submit" class="dropdown-item">Logout</button></li>
                            </form>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
