@extends('layouts.staff')

@section('title', 'Klaim Kacamata')

@section('content')

<div class="container-fluid" style="padding: 20px; margin-top: 10px;">
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body">
            <h3 class="mb-4 fw-semibold">Form Klaim Kacamata</h3>

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

            {{-- Form Klaim --}}
            <form action="{{ route('staff.kacamata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    <!-- Nama -->
                    <div class="col-md-6">
                        <label for="nama" class="form-label fw-semibold">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                               value="{{ Auth::user()->nama_lengkap }}" readonly>
                    </div>

                    <!-- Departemen -->
                    <div class="col-md-6">
                        <label for="departemen" class="form-label fw-semibold">Departemen</label>
                        <input type="text" class="form-control" id="departemen" name="departemen"
                               value="{{ Auth::user()->departemen->nama_departemen ?? '-' }}" readonly>
                    </div>

                    <!-- Jenis Klaim -->
                    <div class="col-md-6">
                        <label for="jenis" class="form-label fw-semibold">Jenis Klaim</label>
                        <select class="form-control" id="jenis" name="jenis" required>
                            <option value="">Pilih Jenis</option>
                            <option value="Lensa">Lensa</option>
                            <option value="Lensa dan Frame">Lensa dan Frame</option>
                        </select>
                    </div>

                    <!-- Budget -->
                    <div class="col-md-6">
                        <label for="budget" class="form-label fw-semibold">Budget Kacamata</label>
                        <input type="text" class="form-control" id="budget" name="budget"
                               value="Rp 1.500.000" readonly>
                        <small class="text-muted">Nilai ini otomatis diambil dari data karyawan.</small>
                    </div>

                    <!-- Upload Receipt -->
                    <div class="col-md-6">
                        <label for="file_receipt" class="form-label fw-semibold">Receipt Pembayaran</label>
                        <input type="file" class="form-control" id="file_receipt" name="file_receipt"
                               accept=".jpg,.jpeg,.png,.pdf" required>
                        <small class="text-muted">Format: JPG, PNG, atau PDF</small>
                    </div>

                    <!-- Upload Hasil Pemeriksaan -->
                    <div class="col-md-6">
                        <label for="file_hasil_pemeriksaan" class="form-label fw-semibold">Hasil Pemeriksaan</label>
                        <input type="file" class="form-control" id="file_hasil_pemeriksaan"
                               name="file_hasil_pemeriksaan" accept=".jpg,.jpeg,.png,.pdf" required>
                        <small class="text-muted">Format: JPG, PNG, atau PDF</small>
                    </div>

                </div>

                <!-- Tombol -->
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary fw-semibold px-4 py-2">Kirim Klaim</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

{{-- Tambahkan SweetAlert --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
