{{-- filepath: resources/views/staff/ajukan_cuti.blade.php --}}
@extends('layouts.staff')

@section('title', 'Ajukan Cuti')

@section('content')

<div class="container-fluid" style="padding: 20px; margin-top: 10px;">
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body">
            <h3 class="mb-4 fw-semibold">Ajukan Cuti</h3>

            {{-- Notifikasi Sukses --}}
            @if(session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: "{{ addslashes(session('success')) }}",
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

            {{-- FORM AJUKAN CUTI --}}
            <form action="{{ route('staff.cuti.store') }}" method="POST">
                @csrf
                <div class="row g-3">

                    <!-- Nama -->
                    <div class="col-md-6">
                        <label for="nama" class="form-label fw-semibold">Nama</label>
                        <input type="text" class="form-control" id="nama" value="{{ $user->nama_lengkap }}" disabled>
                    </div>

                    <!-- NIK -->
                    <div class="col-md-6">
                        <label for="nik" class="form-label fw-semibold">NIK</label>
                        <input type="text" class="form-control" id="nik" value="{{ $user->nik }}" disabled>
                    </div>

                    <!-- Departemen -->
                    <div class="col-md-6">
                        <label for="departemen" class="form-label fw-semibold">Departemen</label>
                        <input type="text" class="form-control" id="departemen"
                            value="{{ $user->departemen->nama_departemen ?? 'Belum diatur' }}" disabled>
                    </div>


                    <!-- Jenis Cuti -->
                    <div class="col-md-6">
                        <label for="jenis_cuti" class="form-label fw-semibold">Jenis Cuti</label>
                        <select class="form-control" id="jenis_cuti" name="jenis_cuti" required>
                            <option value="">Pilih Jenis Cuti</option>
                            <option value="tahunan">Cuti Tahunan</option>
                            <option value="sakit">Cuti Sakit</option>
                            <option value="besar">Cuti Besar</option>
                            <option value="tanpa bayar">Izin Tanpa Bayar</option>
                        </select>


                    </div>

                    <!-- Tanggal Mulai -->
                    <div class="col-md-6">
                        <label for="tanggal_mulai" class="form-label fw-semibold">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                    </div>

                    <!-- Tanggal Selesai -->
                    <div class="col-md-6">
                        <label for="tanggal_selesai" class="form-label fw-semibold">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                    </div>

                    <!-- Jumlah Hari -->
                    <div class="col-md-6">
                        <label for="jumlah_hari" class="form-label fw-semibold">Jumlah Hari</label>
                        <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" placeholder="Masukkan jumlah hari cuti" required>
                    </div>

                    <!-- Alasan -->
                    <div class="col-md-6">
                        <label for="alasan" class="form-label fw-semibold">Alasan Cuti</label>
                        <textarea class="form-control" id="alasan" name="alasan" rows="2" placeholder="Masukkan alasan cuti" required></textarea>
                    </div>

                    <!-- Alamat Selama Cuti -->
                    <div class="col-md-6">
                        <label for="alamat_selama_cuti" class="form-label fw-semibold">Alamat Selama Cuti</label>
                        <textarea class="form-control" id="alamat_selama_cuti" name="alamat_selama_cuti" rows="2" placeholder="Masukkan alamat selama cuti" required></textarea>
                    </div>

                    <!-- Pengganti -->
                    <div class="col-md-6">
                        <label for="pengganti_id" class="form-label fw-semibold">Pengganti/Backup</label>
                        <select class="form-control" id="pengganti_id" name="pengganti_id" required>
                            <option value="">Pilih Pengganti</option>
                            @foreach ($penggantiList as $p)
                            <option value="{{ $p->user_id }}">{{ $p->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary fw-semibold px-4 py-2">Ajukan Cuti</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection