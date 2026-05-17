<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FootballApp</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #000000;
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        nav {
            background-color: #111111;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #00ff88;
        }

        nav .logo {
            font-size: 22px;
            font-weight: bold;
            color: #ffffff;
            text-decoration: none;
        }

        nav a {
            color: #aaaaaa;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }

        nav a:hover { color: #ffffff; }

        .container {
            max-width: 700px;
            margin: 60px auto;
            padding: 0 20px;
            text-align: center;
        }

        .welcome {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .welcome span { color: #00ff88; }

        .subtitle {
            color: #aaa;
            font-size: 14px;
            margin-bottom: 40px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 30px;
        }

        .card {
            background-color: #111111;
            border-radius: 12px;
            padding: 25px;
            text-decoration: none;
            color: #ffffff;
            border: 1px solid #222;
            transition: all 0.2s;
        }

        .card:hover {
            border-color: #00ff88;
            background-color: #1a1a1a;
        }

        .card .icon { font-size: 30px; margin-bottom: 10px; }
        .card .card-title { font-size: 16px; font-weight: bold; }
        .card .card-desc { font-size: 12px; color: #aaa; margin-top: 5px; }

        .btn-home {
            display: inline-block;
            margin-top: 10px;
            padding: 12px 30px;
            background-color: #00ff88;
            color: #000000;
            font-weight: bold;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-home:hover { opacity: 0.85; }

        .logout-link {
            display: block;
            margin-top: 20px;
            color: #aaa;
            font-size: 13px;
            text-decoration: none;
        }

        .logout-link:hover { color: #ef4444; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="logo">FootballApp</a>
        <div>
            <a href="{{ route('home') }}">Home</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('leagues.index') }}">Admin Panel</a>
            @endif
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="welcome">
            Halo, <span>{{ auth()->user()->name }}!</span>
        </div>
        <div class="subtitle">Selamat datang di FootballApp</div>

        @if(auth()->user()->role === 'admin')
            {{-- Tampilan Admin --}}
            <div class="card-grid">
                <a href="{{ route('leagues.index') }}" class="card">
                    <div class="icon">🏆</div>
                    <div class="card-title">Kelola Liga</div>
                    <div class="card-desc">Tambah, edit, hapus liga</div>
                </a>
                <a href="{{ route('teams.index') }}" class="card">
                    <div class="icon">👕</div>
                    <div class="card-title">Kelola Tim</div>
                    <div class="card-desc">Tambah, edit, hapus tim</div>
                </a>
                <a href="{{ route('matchgames.index') }}" class="card">
                    <div class="icon">📅</div>
                    <div class="card-title">Kelola Jadwal</div>
                    <div class="card-desc">Tambah, edit, hapus pertandingan</div>
                </a>
                <a href="{{ route('laporan') }}" class="card">
                    <div class="icon">📊</div>
                    <div class="card-title">Laporan</div>
                    <div class="card-desc">Lihat hasil pertandingan</div>
                </a>
            </div>
        @endif

        <a href="{{ route('home') }}" class="btn-home">← Kembali ke Home</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-link">Logout</button>
        </form>
    </div>
</body>
</html>