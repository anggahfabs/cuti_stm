<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PT Serasi Tunggal Mandiri</title>

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
            width: 420px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 6px 8px 10px rgba(0,0,0,0.25);
            padding: 20px;
            text-align: center;
            transform: scale(1.05);
        }
        .form-control {
            width: 100%;
            padding: 6px;
            margin: 6px 0;
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
    <h3 style="font-size:16px;margin-bottom:15px;">Form Register</h3>

    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <input type="text" name="nik" class="form-control" placeholder="NIK">
        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
        <!-- <input type="text" name="jabatan" class="form-control" placeholder="Jabatan"> -->
        <input type="email" name="email" class="form-control" placeholder="Email">
        <input type="text" name="no_hp" class="form-control" placeholder="No HP">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
        <input type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk">


        {{-- dropdown role --}}
        <select name="role_id" class="form-control">
            <option value="">-- Pilih Role --</option>
            <option value="1">Superadmin</option>
            <option value="2">Kepala Departemen</option>
            <option value="3">BMO</option>
            <option value="4">Admin</option>
            <option value="5">Staff</option>
        </select>

        {{-- dropdown departemen --}}
        <select name="departemen_id" class="form-control">
            <option value="">-- Pilih Departemen --</option>
            <option value="1">Acounting & Finance</option>
            <option value="2">BMO</option>
            <option value="3">BRD & HKG</option>
            <option value="4">FnB</option>
            <option value="5">HRGA</option>
            <option value="5">Security</option>
            <option value="5">Teknik</option>
        </select>

        {{-- dropdown Jabatan --}}
        <select name="jabatan_id" class="form-control">
            <option value="">-- Pilih Jabatan --</option>
            <option value="1">Direktur</option>
            <option value="2">Finance controling</option>
        </select>

        

        <select name="status_karyawan" class="form-control">
            <option value="">-- Status Karyawan --</option>
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
        </select>

        <input type="text" name="qr_code" class="form-control" placeholder="QR Code (optional)">

        <button type="submit" class="btn">Register</button>
    </form>

    <div class="footer">
        © 2025 PT Serasi Tunggal Mandiri. All rights reserved.
    </div>
</div>
</body>
</html>
