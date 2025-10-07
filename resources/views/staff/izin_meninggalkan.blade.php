@extends('layouts.staff')

@section('title', 'Izin Meninggalkan Kerja')

@section('content')
<div class="container-fluid" style="padding: 20px; margin-top: 10px;">
  <div class="card shadow-sm border-0" style="border-radius: 12px;">
    <div class="card-body">
      <h3 class="mb-4 fw-semibold">Izin Meninggalkan Kerja</h3>

      <div class="alert alert-info mb-4">
        <strong>Catatan:</strong> Pengajuan izin wajib dilakukan di tanggal yang sama dengan izin diberikan.
      </div>

      {{-- ALERT SUCCESS --}}
      @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      {{-- ALERT ERROR --}}
      @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form action="#" method="POST">
        @csrf
        <div class="row g-3">
          <!-- Nama -->
          <div class="col-md-6 col-lg-4">
            <label for="nama" class="form-label fw-semibold">Nama</label>
            <input type="text" class="form-control" id="nama" value="{{ $user->nama_lengkap ?? '' }}" disabled>
          </div>
          <!-- Jabatan -->
          <div class="col-md-6 col-lg-4">
            <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" value="{{ $user->jabatan ?? '' }}" disabled>
          </div>
          <!-- Departemen -->
          <div class="col-md-6 col-lg-4">
            <label for="departemen" class="form-label fw-semibold">Departemen</label>
            <input type="text" class="form-control" id="departemen" value="{{ $user->departemen->nama_departemen ?? 'Belum diatur' }}" disabled>
          </div>
          <!-- Tanggal Masuk Kerja -->
          <div class="col-md-6 col-lg-4">
            <label for="tgl_masuk" class="form-label fw-semibold">Tanggal Masuk Kerja</label>
            <input type="text" class="form-control" id="tgl_masuk" value="{{ $user->tanggal_masuk ?? '' }}" disabled>
          </div>
          <!-- Tanggal Izin (wajib diisi dan wajib sama dengan hari ini) -->
          <div class="col-md-6 col-lg-4">
            <label for="tanggal_izin" class="form-label fw-semibold">Tanggal Izin <span class="text-danger">(wajib diisi)</span></label>
            <input type="date" class="form-control" id="tanggal_izin" name="tanggal_izin" value="{{ date('Y-m-d') }}" required>
          </div>
          <!-- Jam Masuk -->
          <div class="col-md-6 col-lg-4">
            <label for="jam_masuk" class="form-label fw-semibold">Jam Masuk <span class="text-danger">(wajib diisi)</span></label>
            <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" required>
          </div>
          <!-- Jam Keluar -->
          <div class="col-md-6 col-lg-4">
            <label for="jam_keluar" class="form-label fw-semibold">Jam Keluar <span class="text-danger">(wajib diisi)</span></label>
            <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" required>
          </div>
          <!-- Keterangan -->
          <div class="col-md-12">
            <label for="keterangan" class="form-label fw-semibold">Keterangan <span class="text-danger">(wajib diisi)</span></label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="2" placeholder="Masukkan keterangan izin" required></textarea>
          </div>
        </div>
        <div class="text-end mt-4">
          <button type="submit" class="btn btn-primary fw-semibold px-4 py-2">Ajukan Izin</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection