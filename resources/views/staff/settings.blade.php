@extends('layouts.staff')

@section('title', 'Setting Staff')

@section('content')
<div class="container-fluid" style="padding: 20px; margin-top: 10px;">
  <div class="card shadow-sm border-0" style="border-radius: 12px;">
    <div class="card-body">
      <h3 class="mb-4 fw-semibold">Profile Staff</h3>
      <form>
        <div class="row g-3">
          <!-- Nama -->
          <div class="col-md-6 col-lg-4">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" class="form-control" value="{{ Auth::user()->nama_lengkap }}" placeholder="Nama Staff" disabled>
          </div>
          <!-- NIK -->
          <div class="col-md-6 col-lg-4">
            <label class="form-label fw-semibold">NIK</label>
            <input type="text" class="form-control" value="{{ Auth::user()->nik }}" placeholder="NIK" disabled>
          </div>
          <!-- Jabatan -->
          <div class="col-md-6 col-lg-4">
            <label class="form-label fw-semibold">Jabatan</label>
            <input type="text" class="form-control" value="{{ Auth::user()->jabatan->nama_jabatan ?? '-' }}" placeholder="Jabatan" disabled>
          </div>
          <!-- Departemen -->
           <div class="col-md-6 col-lg-4">
            <label class="form-label fw-semibold">Departemen</label>
            <input type="text" class="form-control" value="{{ Auth::user()->departemen->nama_departemen ?? '-' }}" placeholder="Departemen" disabled>
          </div>
          <!-- Email -->
          <div class="col-md-6 col-lg-4">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Email" disabled>
          </div>
          <!-- No HP -->
          <div class="col-md-6 col-lg-4">
            <label class="form-label fw-semibold">No HP</label>
            <input type="text" class="form-control" value="{{ Auth::user()->no_hp }}" placeholder="No HP" disabled>
          </div>
          <!-- QR Code -->
          <div class="col-md-6 col-lg-4">
    <label class="form-label fw-semibold">QR Code</label><br>
    <img id="qrcode" src="{{ asset(Auth::user()->qr_code) }}" alt="QR Code" style="width:250px; height:250px;"><br><br>
    
    <!-- Tombol Simpan / Download -->
    <a href="{{ asset(Auth::user()->qr_code) }}" download="qr_code_{{ Auth::user()->nik }}.png" class="btn btn-primary">
        Simpan QR Code
    </a>
</div>
          <!-- Tanggal Masuk Kerja -->
          <div class="col-md-6 col-lg-4">
            <label class="form-label fw-semibold">Tanggal Masuk Kerja</label>
            <input type="text" class="form-control" value="{{ Auth::user()->tanggal_masuk }}" placeholder="Tanggal Masuk" disabled>
          </div>
          <!-- Status Karyawan -->
          <div class="col-md-6 col-lg-4">
            <label class="form-label fw-semibold">Status Karyawan</label>
            <input type="text" class="form-control" value="{{ Auth::user()->status_karyawan }}" placeholder="Status" disabled>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
