<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Schedule</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #000;
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
        }

        nav {
            background-color: #424242;
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
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }

        h1, h2 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .match-card {
            background-color: #413f3f;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: #ffffff;
            transition: background 0.2s;
        }

        .match-card:hover { background-color: #454546; }

        .team-side {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 35%;
        }

        .team-side.away { justify-content: flex-end; }

        .team-name { font-size: 15px; font-weight: 600; }

        .match-center {
            text-align: center;
            width: 30%;
        }

        .score {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 4px;
        }

        .match-time {
            font-size: 12px;
            color: #aaaaaa;
            margin-top: 4px;
        }

        .badge {
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 20px;
            font-weight: bold;
            margin-top: 5px;
            display: inline-block;
        }

        .badge-live { background-color: #ff3b3b; color: white; }
        .badge-upcoming { background-color: #333; color: #aaa; }
        .badge-finished { background-color: #222; color: #666; }

        .league-header {
            font-size: 12px;
            color: #00d4aa;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 25px 0 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #333;
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #444;
            font-size: 12px;
            margin-top: 40px;
        }
 
/* Date Filter */
.date-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    margin-bottom: 25px;
}

.date-nav a {
    color: #00d4aa;
    text-decoration: none;
    font-size: 22px;
    font-weight: bold;
    padding: 5px 12px;
    border-radius: 50%;
    background-color: #1a1d27;
    border: 1px solid #333;
    transition: all 0.2s;
    line-height: 1;
}

.date-nav a:hover {
    background-color: #00ff88;
    color: #000;
}

.date-nav .date-display {
    text-align: center;
    min-width: 180px;
}

.date-nav .date-display .day-name {
    font-size: 13px;
    color: #aaa;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.date-nav .date-display .day-full {
    font-size: 20px;
    font-weight: bold;
    color: #ffffff;
}

.date-nav .date-display .today-badge {
    font-size: 11px;
    background-color: #00ff88;
    color: #000;
    padding: 2px 8px;
    border-radius: 20px;
    font-weight: bold;
    display: inline-block;
    margin-top: 3px;
}
    </style>
</head>
<body>
   <nav>
    <a href="{{ route('home') }}" class="logo">FootballApp</a>
    <div>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('jadwal') }}">Jadwal</a>
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('leagues.index') }}">Admin</a>
            @endif
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}" 
               style="background:#00ff88; color:#000; padding:6px 14px; border-radius:6px; font-weight:bold;">
               Register
            </a>
        @endauth
    </div>
</nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>© 2026 FootballApp — Tugas Praktek Web</footer>
</body>
</html>