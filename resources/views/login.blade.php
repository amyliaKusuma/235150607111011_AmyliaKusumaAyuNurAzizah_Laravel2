<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f7f1;
            padding: 20px;
        }

        .login-container {
            background: rgba(119, 189, 146, 0.2);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        h1 {
            color: #2c584c;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #2c584c;
            font-size: 0.95em;
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #a8d5bb;
            border-radius: 8px;
            background: white;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        button {
            width: 100%;
            padding: 14px;
            background: #70ba72;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background: #5aa15c;
        }

        .error-container {
            background: #fde8e8;
            border: 1px solid #f88;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }

        .error-container ul {
            list-style-position: inside;
            color: #c53030;
        }

        .error-container li {
            margin: 5px 0;
            font-size: 0.9em;
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 1.7em;
            }

            button {
                padding: 12px;
            }
        }

        /* Link styling jika Anda ingin menambahkan link ke halaman registrasi */
        .register-link {
            text-align: center;
            margin-top: 20px;
            color: #2c584c;
            font-size: 0.9em;
        }

        .register-link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Masukkan Email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
            </div>
            
            <button type="submit">Login</button>
        </form>

        @if ($errors->any())
            <div class="error-container">
                <ul>
                    {{-- @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach --}}
                </ul>
            </div>
        @endif

        <div class="register-link">
            Belum punya akun? <a href="{{ route('register.create') }}">Daftar disini</a>
        </div>
    </div>
</body>
</html>