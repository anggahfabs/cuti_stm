@extends('layouts.staff')

@section('title', 'Izin Meninggalkan Kerja')

@section('content')
<div class="container-fluid" style="padding: 20px; margin-top: 10px;">
  <div class="card shadow-sm border-0" style="border-radius: 12px;">
    <div class="card-body">
      <h3 class="mb-4 fw-semibold">Izin Meninggalkan Kerja</h3>

      <div class="alert alert-info mb-4">
        <strong>Catatan:</strong> Pengajuan izin hanya dapat dilakukan di tanggal yang sama dengan izin diberikan (tidak bisa sebelum atau sesudah hari ini).
      </div>

            {{-- Toast Notifikasi --}}
            @if(session('success'))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '{{ session('success') }}',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    });
                </script>
            @endif

      {{-- ALERT ERROR --}}
            @if ($errors->any())
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            html: '{!! implode("<br>", $errors->all()) !!}',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                        });
                    });
                </script>
            @endif

      <form action="{{ route('staff.izin_meninggalkan.store') }}" method="POST">
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
            <input type="text" class="form-control" id="jabatan" value="{{ $user->jabatan->nama_jabatan?? '' }}" disabled>
          </div>

          <!-- Departemen -->
          <div class="col-md-6 col-lg-4">
            <label for="departemen" class="form-label fw-semibold">Departemen</label>
            <input type="text" class="form-control" id="departemen" value="{{ $user->departemen->nama_departemen ?? 'Belum diatur' }}" disabled>
          </div>

          <!-- Tanggal Masuk Kerja -->
          <!-- <div class="col-md-6 col-lg-4">
            <label for="tgl_masuk" class="form-label fw-semibold">Hari/Tanggal Masuk</label>
            <input type="text" class="form-control" id="tgl_masuk" value="{{ $user->tanggal_masuk ?? '' }}" disabled>
          </div> -->

          <!-- Tanggal Izin (hanya hari ini) -->
          <div class="col-md-6 col-lg-4">
            <label for="tanggal_izin" class="form-label fw-semibold">Tanggal Izin <span class="text-danger">(hanya hari ini)</span></label>
            @php $today = date('Y-m-d'); @endphp
            <input
              type="date"
              class="form-control"
              id="tanggal_izin"
              name="tanggal_izin"
              value="{{ $today }}"
              min="{{ $today }}"
              max="{{ $today }}"
              required>
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

          <!-- Total Waktu Kerja -->
          <div class="col-md-6 col-lg-4">
  <label for="total_waktu" class="form-label fw-semibold">Total Waktu</label>
  <input type="hidden" id="total_waktu_menit" name="total_waktu_kerja">
  <input type="text" class="form-control" id="total_waktu_display" readonly>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
  const jamMasukInput = document.getElementById('jam_masuk');
  const jamKeluarInput = document.getElementById('jam_keluar');
  const totalDisplay = document.getElementById('total_waktu_display');
  const totalHidden = document.getElementById('total_waktu_menit');

  function hitungTotalWaktu() {
    const jamMasuk = jamMasukInput.value;
    const jamKeluar = jamKeluarInput.value;

    if (jamMasuk && jamKeluar) {
      const [hMasuk, mMasuk] = jamMasuk.split(':').map(Number);
      const [hKeluar, mKeluar] = jamKeluar.split(':').map(Number);

      const waktuMasuk = hMasuk * 60 + mMasuk;
      const waktuKeluar = hKeluar * 60 + mKeluar;

      let selisihMenit = waktuKeluar - waktuMasuk;
      if (selisihMenit < 0) selisihMenit += 24 * 60;

      const jam = Math.floor(selisihMenit / 60);
      const menit = selisihMenit % 60;

      totalDisplay.value = `${jam} jam ${menit} menit`;
      totalHidden.value = selisihMenit; // ini yg dikirim ke DB
    } else {
      totalDisplay.value = '';
      totalHidden.value = '';
    }
  }

  jamMasukInput.addEventListener('change', hitungTotalWaktu);
  jamKeluarInput.addEventListener('change', hitungTotalWaktu);
});
</script>