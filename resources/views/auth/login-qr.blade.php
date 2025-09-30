<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login QR - PT Serasi Tunggal Mandiri</title>

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
      width: 450px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 6px 8px 10px rgba(0, 0, 0, 0.25);
      padding: 20px;
      text-align: center;
      transform: scale(1.25);
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
      left: 80px;
      height: 55px;
    }

    .tabs {
      display: flex;
      justify-content: center;
      margin-bottom: 15px;
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

    .upload-area {
      width: 120px;
      height: 120px;
      background: #D9D9D9;
      margin: 20px auto;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 8px;
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
    {{-- Tab Switch --}}
    <div class="tabs">
      <img src="assets/logo/stmlogo.png" alt="PT Serasi Tunggal Mandiri Logo" class="logo">
      <a href="{{ route('login') }}" class="tab">Login Email</a>
      <!-- <a href="{{ route('dashboard') }}" class="tab">Login Email</a> -->
      <div class="tab active">QR</div>
    </div>

    <div class="upload-area">
      <span>Upload QR</span>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" name="qr_code" style="font-size: 12px; margin-bottom: 10px;">
      <a href="{{ route('dashboard') }}" type="submit" class="btn">Sign In</a>
    </form>

    <div class="footer">
      © 2025 PT Serasi Tunggal Mandiri. All rights reserved.
    </div>
  </div>
</body>

</html>