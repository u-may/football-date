<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FootballApp</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #0f1117;
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            min-height: 100vh;
            background-color: #1a1d27;
            padding: 20px 0;
            position: fixed;
            border-right: 1px solid #333;
        }

        .sidebar .logo {
            font-size: 18px;
            font-weight: bold;
            color: #00d4aa;
            padding: 0 20px 20px;
            border-bottom: 1px solid #333;
            display: block;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #aaaaaa;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .sidebar a:hover {
            background-color: #242736;
            color: #ffffff;
            border-left: 3px solid #00d4aa;
        }

        .sidebar .menu-label {
            font-size: 10px;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 15px 20px 5px;
        }

        /* Main content */
        .main {
            margin-left: 220px;
            padding: 30px;
            width: 100%;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #1a1d27;
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #242736;
            padding: 12px 15px;
            text-align: left;
            font-size: 13px;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 12px 15px;
            font-size: 14px;
            border-bottom: 1px solid #242736;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover td { background-color: #1e2130; }

        /* Buttons */
        .btn {
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 13px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-primary { background-color: #00d4aa; color: #000; font-weight: bold; }
        .btn-warning { background-color: #f59e0b; color: #000; }
        .btn-danger { background-color: #ef4444; color: #fff; }
        .btn:hover { opacity: 0.85; }

        /* Form */
        .form-card {
            background-color: #1a1d27;
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: #aaa;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            background-color: #0f1117;
            border: 1px solid #333;
            border-radius: 6px;
            color: #ffffff;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #00d4aa;
        }

        .badge {
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 20px;
            font-weight: bold;
        }

        .badge-live { background-color: #ff3b3b; color: white; }
        .badge-upcoming { background-color: #333; color: #aaa; }
        .badge-finished { background-color: #222; color: #666; }
    </style>
</head>
<body>
    <div class="sidebar">
        <span class="logo">⚽ FootballApp</span>

        <div class="menu-label">Menu</div>
        <a href="{{ route('home') }}">🌐 Lihat Website</a>

        <div class="menu-label">Admin</div>
        <a href="{{ route('leagues.index') }}">🏆 Liga</a>
        <a href="{{ route('teams.index') }}">👕 Tim</a>
        <a href="{{ route('matchgames.index') }}">📅 Pertandingan</a>
        <a href="{{ route('laporan') }}">📊 Laporan</a>

        <div class="menu-label">Akun</div>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           🚪 Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>

    <div class="main">
        @yield('content')
    </div>
</body>
</html>