<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT Serasi Tunggal Mandiri</title>

    {{-- Font Inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #5041BC;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 320px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 6px 8px 10px rgba(0, 0, 0, 0.25);
            padding: 20px;
            text-align: center;
            transform: scale(1.25);
        }

        .tabs-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin-bottom: 15px;
        }

        .logo {
            position: absolute;
            left: 35px;
            height: 55px;
        }

        .tabs {
            display: flex;
            justify-content: center;
        }

        .tab {
            padding: 5px 12px;
            border: 1px solid #C4BDBD;
            border-radius: 4px;
            margin: 0 5px;
            cursor: pointer;
            font-size: 12px;
        }

        .tab.active {
            border: 1px solid #2662D9;
            color: #2662D9;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 6px;
            margin: 8px 0;
            border: 1px solid #C4BDBD;
            border-radius: 5px;
            font-size: 12px;
        }

        .btn {
            width: 100%;
            background: #2662D9;
            color: #fff;
            padding: 7px;
            border: none;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }

        .footer {
            font-size: 10px;
            margin-top: 15px;
            color: #444;
        }
    </style>
</head>

<body>
    <div class="card">
        {{-- Logo and Tab Switch --}}
        <div class="tabs-container">
            <img src="assets/logo/stmlogo.png" alt="PT Serasi Tunggal Mandiri Logo" class="logo">
            <div class="tabs">
                <div class="tab active">Login Email</div>
                <a href="{{ route('login.qr') }}" class="tab">QR</a>
            </div>
        </div>

        <h4 style="font-size: 14px; margin-bottom: 15px;">SELAMAT DATANG DIHALAMAN LOGIN!</h4>

        {{-- Form Login --}}
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <input type="text" name="username" class="form-control" placeholder="Username">
            <input type="password" name="password" class="form-control" placeholder="Password">

            <div style="text-align: left; font-size: 12px;">
                <input type="checkbox" name="remember"> Remember me
            </div>

            <button type="submit" class="btn">Login</button>
        </form>

      

        <div class="footer">
            © 2025 PT Serasi Tunggal Mandiri. All rights reserved.
        </div>
    </div>
</body>

</html>