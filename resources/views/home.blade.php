<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Aplikasi Satpam</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Aplikasi Satpam</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Aplikasi Satpam</h1>
            <p class="lead">Sistem keamanan modern untuk mendukung kinerja satpam.</p>
            <a href="{{ route('login') }}" class="btn btn-light btn-lg mt-3 me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg mt-3">Daftar</a>
        </div>
    </header>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="bi bi-shield-lock-fill" style="font-size: 3rem; color: #007bff;"></i>
                    <h3 class="mt-3">Keamanan Data</h3>
                    <p>Sistem yang aman untuk mengelola data operasional satpam.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-clock-fill" style="font-size: 3rem; color: #007bff;"></i>
                    <h3 class="mt-3">Pemantauan 24/7</h3>
                    <p>Pantau aktivitas keamanan kapan saja dan di mana saja.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-person-fill-check" style="font-size: 3rem; color: #007bff;"></i>
                    <h3 class="mt-3">Kemudahan Akses</h3>
                    <p>Login dan kelola data dengan mudah menggunakan aplikasi kami.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p>&copy; 2024 Aplikasi Satpam. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons (Optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>
