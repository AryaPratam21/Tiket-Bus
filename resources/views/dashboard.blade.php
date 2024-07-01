<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Penjualan Tiket Bus')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #f0f2f5;
        }

        .header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
        }

        .header .navbar-brand {
            color: white;
            font-size: 1.5rem;
        }

        .content {
            flex: 1;
            display: flex;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            flex-shrink: 0;
        }

        .sidebar .nav-link {
            color: white;
            margin-left: 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        .main {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            border-radius: 10px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand">Tiket Bus</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="nav-link">
                                @csrf
                                <button type="submit" class="btn btn-link text-white">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>

    <div class="content">
        <nav class="sidebar">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('buses.index') }}">Bus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tikets.index') }}">Tiket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penjualans.index') }}">Penjualan</a>
                </li>
            </ul>
        </nav>

        <div class="main">
            @auth
                <div class="jumbotron">
                    <h1 class="display-4">Selamat Datang!</h1>
                    <p class="lead">Ini adalah aplikasi penjualan tiket bus yang membantu Anda mengelola bus, tiket, dan penjualan dengan mudah.</p>
                    <hr class="my-4">
                    <p>Anda bisa memulai dengan mengecek data bus, tiket, atau penjualan disebelah kiri. Atau bisa langsung klik tombol di bawah.</p>
                    <a class="btn btn-primary btn-lg" href="{{ route('buses.index') }}" role="button">Lihat Data Bus</a>
                    <a class="btn btn-primary btn-lg" href="{{ route('tikets.index') }}" role="button">Lihat Data Tiket</a>
                    <a class="btn btn-primary btn-lg" href="{{ route('penjualans.index') }}" role="button">Lihat Data Penjualan</a>
                </div>
            @else
                @yield('content')
            @endauth
        </div>
    </div>

    <div class="footer">
        &copy; 2024 Aplikasi Penjualan Tiket Bus. All rights reserved.
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
