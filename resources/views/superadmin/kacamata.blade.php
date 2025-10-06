{{-- filepath: c:\laragon\www\cuti-karyawanstm\resources\views\superadmin\kacamata.blade.php --}}
@extends('layouts.app')

@section('title', 'Pengajuan Kacamata')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4" style="font-weight: bold;">Pengajuan Kacamata</h2>
            <p>Berikut adalah daftar pengajuan kacamata karyawan.</p>
        </div>
    </div>

    {{-- Filter --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <form action="{{ route('superadmin.kacamata') }}" method="GET">
                <div class="form-group">
                    <label for="departemen">Filter Departemen</label>
                    <select class="form-control" id="departemen" name="departemen">
                        <option value="">Semua Departemen</option>
                        <option value="HRD">HRD</option>
                        <option value="IT">IT</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                    </select>
                </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Filter Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="">Semua Status</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Disetujui">Disetujui</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button class="btn btn-primary w-100" type="submit">
                <i class="fas fa-search"></i> Filter
            </button>
            </form>
        </div>
    </div>

    {{-- Tabel Data Pengajuan Kacamata --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Pengajuan Kacamata</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pegawai</th>
                                <th>Departemen</th>
                                <th>Jenis Kacamata</th>
                                <th>Total Biaya</th>
                                <th>Jumlah Disetujui</th>
                                <th>Status</th>
                                <th>Dokumen</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contoh Data --}}
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>IT</td>
                                <td>Lensa + Frame</td>
                                <td>Rp 1.200.000</td>
                                <td>Rp 1.000.000</td>
                                <td><span class="badge badge-warning">Menunggu</span></td>
                                <td><a href="#" data-toggle="modal" data-target="#dokumenModal">Lihat Dokumen</a></td>
                                <td class="d-flex justify-content-start">
                                    <button class="btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#approveModal">
                                        <i class="fas fa-check"></i> Approve
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectModal">
                                        <i class="fas fa-times"></i> Reject
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Dokumen --}}
<div class="modal fade" id="dokumenModal" tabindex="-1" role="dialog" aria-labelledby="dokumenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="dokumenModalLabel">Dokumen Pengajuan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Struk / Nota:</strong></p>
                <img src="{{ asset('kaiadmin/assets/img/sample-receipt.jpg') }}" alt="Dokumen" class="img-fluid">
                <p class="mt-3"><strong>Hasil Pemeriksaan:</strong></p>
                <a href="{{ asset('kaiadmin/assets/documents/sample-report.pdf') }}" target="_blank">Download Hasil Pemeriksaan</a>
            </div>
        </div>
    </div>
</div>

{{-- Modal Approve --}}
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="approveModalLabel">Setujui Pengajuan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menyetujui pengajuan ini?</p>
                <div class="text-right">
                    <button class="btn btn-success">Setujui</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Reject --}}
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="rejectModalLabel">Tolak Pengajuan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="reason">Alasan Penolakan</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection