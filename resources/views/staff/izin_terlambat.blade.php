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

      {{-- FORM --}}
      <form action="{{ route('staff.izin_terlambat.store') }}" method="POST">
        @csrf
        <div class="row g-3">

          {{-- Nama (readonly) --}}
          <div class="col-md-6 col-lg-4">
            <label for="nama" class="form-label fw-semibold">Nama</label>
            <input type="text" class="form-control" id="nama"
              value="{{ $user->nama_lengkap }}" readonly>
          </div>

          {{-- Jabatan --}}
          <div class="col-md-6 col-lg-4">
            <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
            <input type="text" class="form-control" id="jabatan"
              value="{{ $user->jabatan->nama_jabatan ?? '-' }}" readonly>
          </div>

          {{-- Departemen --}}
          <div class="col-md-6 col-lg-4">
            <label for="departemen" class="form-label fw-semibold">Departemen</label>
            <input type="text" class="form-control" id="departemen"
              value="{{ $user->departemen->nama_departemen ?? '-' }}" readonly>
          </div>

          {{-- Hidden input untuk ID user, jabatan, departemen --}}
          <input type="hidden" name="user_id" value="{{ $user->user_id }}">
          <input type="hidden" name="jabatan_id" value="{{ $user->jabatan_id }}">
          <input type="hidden" name="departemen_id" value="{{ $user->departemen_id }}">

          {{-- Tanggal Terlambat --}}
          <div class="col-md-6 col-lg-4">
            <label for="tanggal_terlambat" class="form-label fw-semibold">Tanggal Terlambat</label>
            <input type="date" class="form-control" id="tanggal_terlambat"
              name="tanggal_terlambat" required>
          </div>

          {{-- Jam Datang --}}
          <div class="col-md-6 col-lg-4">
            <label for="jam_masuk" class="form-label fw-semibold">Jam Datang</label>
            <input type="time" class="form-control" id="jam_masuk" name="jam_masuk"
              required onchange="hitungKeterlambatan()">
          </div>

          {{-- Total Waktu Terlambat --}}
          <div class="col-md-6 col-lg-4">
            <label for="total_waktu_terlambat" class="form-label fw-semibold">Total Waktu Terlambat (menit)</label>
            <input type="number" class="form-control" id="total_waktu_terlambat"
              name="total_waktu_terlambat" readonly>
          </div>

          {{-- Alasan --}}
          <div class="col-md-12">
            <label for="alasan" class="form-label fw-semibold">Alasan / Keterangan</label>
            <textarea class="form-control" id="alasan" name="alasan" rows="2"
              placeholder="Jelaskan alasan keterlambatan" required></textarea>
          </div>
        </div>

        {{-- Tombol Submit --}}
        <div class="text-end mt-4">
          <button type="submit" class="btn btn-primary fw-semibold px-4 py-2">
            Ajukan Terlambat
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Script Hitung Keterlambatan Otomatis --}}
<script>
  function hitungKeterlambatan() {
    const jamMasukNormal = "08:00"; // Jam masuk normal (ubah kalau perlu)
    const jamMasuk = document.getElementById("jam_masuk").value;
    const output = document.getElementById("total_waktu_terlambat");

    if (!jamMasuk) {
      output.value = "";
      return;
    }

    const [h1, m1] = jamMasukNormal.split(":").map(Number);
    const [h2, m2] = jamMasuk.split(":").map(Number);

    const menitNormal = h1 * 60 + m1;
    const menitDatang = h2 * 60 + m2;
    const selisih = menitDatang - menitNormal;

    output.value = selisih > 0 ? selisih : 0;
  }
</script>
@endsection
