<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FootballApp</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #000000;
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .register-card {
            background-color: #111111;
            border-radius: 12px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            border: 1px solid #222;
        }

        .logo {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #aaa;
            font-size: 13px;
            margin-bottom: 30px;
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

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            background-color: #000000;
            border: 1px solid #333;
            border-radius: 6px;
            color: #ffffff;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #00ff88;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            background-color: #00ff88;
            color: #000000;
            font-weight: bold;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-register:hover { opacity: 0.85; }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #aaa;
        }

        .login-link a {
            color: #00ff88;
            text-decoration: none;
        }

        .error {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="logo">FootballApp</div>
        <div class="subtitle">Buat akun baru</div>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-register">Daftar</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>
</body>
</html>