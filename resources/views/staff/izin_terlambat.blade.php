@extends('layouts.staff')

@section('title', 'Pengajuan Terlambat')

@section('content')
<div class="container-fluid" style="padding: 20px; margin-top: 10px;">
  <div class="card shadow-sm border-0" style="border-radius: 12px;">
    <div class="card-body">
      <h3 class="mb-4 fw-semibold">Form Pengajuan Terlambat</h3>

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

      <form action="#" method="POST" enctype="multipart/form-data">
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
          <!-- Tanggal Terlambat -->
          <div class="col-md-6 col-lg-4">
            <label for="tanggal_terlambat" class="form-label fw-semibold">Tanggal Terlambat</label>
            <input type="date" class="form-control" id="tanggal_terlambat" name="tanggal_terlambat" required>
          </div>
          <!-- Jam Masuk Seharusnya -->
          <div class="col-md-6 col-lg-4">
            <label for="jam_masuk_seharusnya" class="form-label fw-semibold">Jam Masuk Seharusnya</label>
            <input type="time" class="form-control" id="jam_masuk_seharusnya" name="jam_masuk_seharusnya" required>
          </div>
          <!-- Jam Masuk Sebenarnya -->
          <div class="col-md-6 col-lg-4">
            <label for="jam_masuk_sebenarnya" class="form-label fw-semibold">Jam Masuk Sebenarnya</label>
            <input type="time" class="form-control" id="jam_masuk_sebenarnya" name="jam_masuk_sebenarnya" required oninput="hitungKeterlambatan()">
          </div>
          <!-- Jumlah Keterlambatan (otomatis) -->
          <div class="col-md-6 col-lg-4">
            <label for="jumlah_keterlambatan" class="form-label fw-semibold">Jumlah Keterlambatan (menit)</label>
            <input type="number" class="form-control" id="jumlah_keterlambatan" name="jumlah_keterlambatan" readonly>
          </div>
          <!-- Keterangan (wajib diisi) -->
          <div class="col-md-12">
            <label for="keterangan" class="form-label fw-semibold">Keterangan <span class="text-danger">(wajib diisi)</span></label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="2" placeholder="Jelaskan keterlambatan" required></textarea>
          </div>
          <!-- Bukti / Lampiran -->
          <!-- <div class="col-md-12">
            <label for="lampiran" class="form-label fw-semibold">Bukti / Lampiran (opsional)</label>
            <input type="file" class="form-control" id="lampiran" name="lampiran" accept="image/*,application/pdf">
          </div> -->
        </div>
        <div class="text-end mt-4">
          <button type="submit" class="btn btn-primary fw-semibold px-4 py-2">Ajukan Terlambat</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function hitungKeterlambatan() {
    var jamNormal = document.getElementById('jam_masuk_seharusnya').value;
    var jamDatang = document.getElementById('jam_masuk_sebenarnya').value;
    if (jamNormal && jamDatang) {
      var [h1, m1] = jamNormal.split(":").map(Number);
      var [h2, m2] = jamDatang.split(":").map(Number);
      var menitNormal = h1 * 60 + m1;
      var menitDatang = h2 * 60 + m2;
      var selisih = menitDatang - menitNormal;
      document.getElementById('jumlah_keterlambatan').value = selisih > 0 ? selisih : 0;
    } else {
      document.getElementById('jumlah_keterlambatan').value = '';
    }
  }
</script>
@endsection