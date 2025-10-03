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

    .logo {
      height: 55px;
      margin-bottom: 15px;
    }

    .tabs {
      display: flex;
      justify-content: center;
      margin-bottom: 15px;
      gap: 10px;
    }

    .tab {
      padding: 5px 12px;
      border: 1px solid #C4BDBD;
      border-radius: 4px;
      cursor: pointer;
      font-size: 12px;
      text-decoration: none;
      color: #000;
    }

    .tab.active {
      border: 1px solid #2662D9;
      color: #2662D9;
      font-weight: 600;
    }

    .upload-area {
      width: 250px;
      height: 250px;
      background: #D9D9D9;
      margin: 0 auto 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 8px;
      position: relative;
    }

    #video {
      width: 100%;
      height: 100%;
      border-radius: 8px;
    }

    #qr-file {
      margin-top: 10px;
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
    {{-- Logo --}}
    <img src="{{ asset('assets/logo/stmlogo.png') }}" alt="PT Serasi Tunggal Mandiri Logo" class="logo">

    {{-- Tabs --}}
    <div class="tabs">
      <a href="{{ route('login') }}" class="tab">Login Email</a>
      <div class="tab active">QR</div>
    </div>

    {{-- Upload area & video --}}
    <div class="upload-area">
      <video id="video"></video>
    </div>

    {{-- File upload fallback --}}
    <input type="file" id="qr-file" accept="image/*">

    {{-- Form --}}
    <form action="{{ route('login.qr.post') }}" method="POST" id="qr-form">
      @csrf
      <input type="hidden" name="nik" id="nik">
      <input type="hidden" name="nama_lengkap" id="nama_lengkap">
      <input type="hidden" name="nama_departemen" id="nama_departemen">
      <input type="hidden" name="nama_role" id="nama_role">
    </form>

    {{-- Footer --}}
    <div class="footer">
      © 2025 PT Serasi Tunggal Mandiri. All rights reserved.
    </div>
  </div>

  {{-- jsQR --}}
  <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
  <script>
  const video = document.getElementById('video');
  let scanned = false; // flag supaya submit cuma sekali

  // aktifkan kamera
  navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
    .then(stream => {
      video.srcObject = stream;
      video.setAttribute("playsinline", true);
      video.play();
      requestAnimationFrame(scan);
    });

  function processQRData(data) {
    if (scanned) return; // kalau sudah pernah scan, stop biar ga submit lagi
    scanned = true;

    try {
      // parsing JSON dari QR
      const parsed = JSON.parse(data);

      document.getElementById('nik').value = parsed.nik || '';
      document.getElementById('nama_lengkap').value = parsed.nama_lengkap || '';
      document.getElementById('nama_departemen').value = parsed.nama_departemen || '';
      document.getElementById('nama_role').value = parsed.nama_role || '';

      // stop kamera biar gak terus scan
      const stream = video.srcObject;
      if (stream) {
        stream.getTracks().forEach(track => track.stop());
      }

      // kasih delay kecil sebelum submit
      setTimeout(() => {
        document.getElementById('qr-form').submit();
      }, 300);

    } catch (e) {
      alert('Format QR tidak valid. Pastikan berisi JSON dengan nik, nama_lengkap, nama_departemen, nama_role.');
      scanned = false; // biar bisa scan ulang kalau gagal
    }
  }

  function scan() {
    if (video.readyState === video.HAVE_ENOUGH_DATA) {
      const canvas = document.createElement('canvas');
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      const ctx = canvas.getContext('2d');
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
      const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
      const code = jsQR(imageData.data, imageData.width, imageData.height);
      if (code) {
        processQRData(code.data);
      }
    }
    if (!scanned) requestAnimationFrame(scan); // stop scanning kalau sudah sukses
  }

  // fallback upload file
  document.getElementById('qr-file').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function () {
      const img = new Image();
      img.onload = function () {
        const canvas = document.createElement('canvas');
        canvas.width = img.width;
        canvas.height = img.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0);
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height);
        if (code) {
          processQRData(code.data);
        } else {
          alert('QR Code tidak terbaca.');
        }
      }
      img.src = reader.result;
    }
    reader.readAsDataURL(file);
  });
</script>

</body>

</html>
