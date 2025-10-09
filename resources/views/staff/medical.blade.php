@extends('layouts.staff')

@section('title', 'Klaim Medical')

@section('content')

<div class="container-fluid" style="padding: 20px; margin-top: 10px;">
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body">
            <h3 class="mb-4 fw-semibold">Form Klaim Medical</h3>

{{-- Notifikasi Sukses --}}
@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: @json(session('success')),
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        });
    </script>
@endif


            {{-- Notifikasi Error --}}
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

            {{-- Form Klaim Medical --}}
            <form action="{{ route('staff.medical.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label for="nama" class="form-label fw-semibold">Nama</label>
                        <input type="text" class="form-control" id="nama"
                               value="{{ Auth::user()->nama_lengkap ?? '-' }}" readonly>
                    </div>

                    {{-- Departemen --}}
                    <div class="col-md-6">
                        <label for="departemen" class="form-label fw-semibold">Departemen</label>
                        <input type="text" class="form-control" id="departemen"
                               value="{{ Auth::user()->departemen->nama_departemen ?? '-' }}" readonly>
                    </div>

                    {{-- Budget --}}
                    <div class="col-md-6">
                        <label for="budget" class="form-label fw-semibold">Budget Medical</label>
                        <input type="number" class="form-control" id="budget" name="budget"
                               value="5000000" readonly>
                        <small class="text-muted">Budget Medical Anda saat ini (tidak dapat diubah)</small>
                    </div>

                    {{-- Upload Resep Dokter --}}
                    <div class="col-md-6">
                        <label for="resep_dokter" class="form-label fw-semibold">Resep Dokter</label>
                        <input type="file" class="form-control" id="resep_dokter" name="resep_dokter"
                               accept=".jpg,.jpeg,.png,.pdf" required>
                        <small class="text-muted">Format file: JPG, PNG, atau PDF</small>
                    </div>

                    {{-- Upload Receipt Pembayaran --}}
                    <div class="col-md-6">
                        <label for="receipt_pembayaran" class="form-label fw-semibold">Receipt Pembayaran</label>
                        <input type="file" class="form-control" id="receipt_pembayaran" name="receipt_pembayaran"
                               accept=".jpg,.jpeg,.png,.pdf" required>
                        <small class="text-muted">Format file: JPG, PNG, atau PDF</small>
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary fw-semibold px-4 py-2">
                        Kirim Klaim
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

{{-- SweetAlert --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
