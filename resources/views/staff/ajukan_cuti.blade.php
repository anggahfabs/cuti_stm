{{-- filepath: resources/views/staff/ajukan_cuti.blade.php --}}
@extends('layouts.staff')

@section('title', 'Ajukan Cuti')

@section('content')

    <div class="container-fluid" style="padding: 20px; margin-top: 10px;">
        <div class="card shadow-sm border-0" style="border-radius: 12px;">
            <div class="card-body">
                <h3 class="mb-4 fw-semibold">Ajukan Cuti</h3>

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">

                        <!-- Nama -->
                        <div class="col-md-6">
                            <label for="nama" class="form-label fw-semibold">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                   placeholder="Masukkan nama Anda" required>
                        </div>

                        <!-- Tanggal Cuti -->
                        <div class="col-md-6">
                            <label for="tgl_cuti" class="form-label fw-semibold">Tanggal Cuti</label>
                            <input type="date" class="form-control" id="tgl_cuti" name="tgl_cuti" required>
                        </div>

                        <!-- NIK -->
                        <div class="col-md-6">
                            <label for="nik" class="form-label fw-semibold">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                   placeholder="Masukkan NIK Anda" required>
                        </div>

                        <!-- Tanggal Masuk -->
                        <div class="col-md-6">
                            <label for="tgl_masuk" class="form-label fw-semibold">Tanggal Masuk Kerja</label>
                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" required>
                        </div>

                        <!-- Departemen -->
                        <div class="col-md-6">
                            <label for="departemen" class="form-label fw-semibold">Departemen</label>
                            <select class="form-control" id="departemen" name="departemen" required>
                                <option value="">Pilih Departemen</option>
                                <option value="BMO">BMO</option>
                                <option value="Security">Security</option>
                                <option value="Teknik">Teknik</option>
                                <option value="Administrasi & General">Administrasi & General</option>
                                <option value="Purchasing">Purchasing</option>
                                <option value="Acc & Fin">Acc & Fin</option>
                                <option value="BRD & HKG">BRD & HKG</option>
                                <option value="F&B">F&B</option>
                                <option value="HR & GA">HR & GA</option>
                                <option value="Tim Khusus">Tim Khusus</option>
                            </select>
                        </div>

                        <!-- Alamat Cuti -->
                        <div class="col-md-6">
                            <label for="alamat_cuti" class="form-label fw-semibold">Alamat Cuti</label>
                            <textarea class="form-control" id="alamat_cuti" name="alamat_cuti" rows="2"
                                      placeholder="Masukkan alamat selama cuti" required></textarea>
                        </div>

                        <!-- Jenis Cuti -->
                        <div class="col-md-6">
                            <label for="jenis_cuti" class="form-label fw-semibold">Jenis Cuti</label>
                            <select class="form-control" id="jenis_cuti" name="jenis_cuti" required>
                                <option value="">Pilih Jenis Cuti</option>
                                <option value="Cuti Tahunan">Cuti Tahunan</option>
                                <option value="Cuti Besar">Cuti Besar</option>
                                <option value="Izin Tanpa Bayar">Izin Tanpa Bayar</option>
                                <option value="Izin Khusus (Dispensasi)">Izin Khusus (Dispensasi)</option>
                                <option value="Sisa Cuti">Sisa Cuti</option>
                            </select>
                        </div>

                        <!-- Keperluan -->
                        <div class="col-md-6">
                            <label for="keperluan" class="form-label fw-semibold">Keperluan</label>
                            <textarea class="form-control" id="keperluan" name="keperluan" rows="2"
                                      placeholder="Masukkan keperluan cuti" required></textarea>
                        </div>

                        <!-- Jumlah Hari -->
                        <div class="col-md-6">
                            <label for="jumlah_hari" class="form-label fw-semibold">Jumlah Hari Cuti</label>
                            <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari"
                                   placeholder="Masukkan jumlah hari cuti" required>
                        </div>

                        <!-- Nama Pengambil Alih -->
                        <div class="col-md-6">
                            <label for="pengambil_alih" class="form-label fw-semibold">Nama Pengambil Alih</label>
                            <input type="text" class="form-control" id="pengambil_alih" name="pengambil_alih"
                                   placeholder="Masukkan nama pengambil alih tugas" required>
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

