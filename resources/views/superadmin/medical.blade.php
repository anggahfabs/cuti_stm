{{-- filepath: c:\laragon\www\cuti-karyawanstm\resources\views\superadmin\medical.blade.php --}}
@extends('layouts.app')

@section('title', 'Pengajuan Medical')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4" style="font-weight: bold;">Pengajuan Medical</h2>
            <p>Berikut adalah daftar pengajuan medical karyawan.</p>
        </div>
    </div>

    {{-- Filter & Search --}}
    <div class="row mb-3">
        <div class="col-md-3">
            <form action="{{ route('superadmin.medical') }}" method="GET">
                <div class="form-group">
                    <label for="status">Filter Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="">Semua Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
        </div>
       <div class="col-md-3">
    <div class="form-group">
        <label for="departemen">Filter Departemen</label>
        <select class="form-control" id="departemen" name="departemen">
            <option value="">-- Semua Departemen --</option>
            <option value="HRD">HRD</option>
            <option value="Finance">Finance</option>
            <option value="IT">IT</option>
            <option value="Marketing">Marketing</option>
            <option value="Produksi">Produksi</option>
        </select>
    </div>
</div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="search">Cari Nama Karyawan</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Cari nama karyawan...">
            </div>
        </div>
        <div class="col-md-2 d-flex align-items-center" style="margin-top: 8px;">
            <button class="btn btn-primary w-100" type="submit">
                <i class="fas fa-search"></i> Filter
            </button>
            </form>
        </div>
    </div>

    {{-- Tabel Data Pengajuan Medical --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Pengajuan Medical</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Pengajuan</th>
                                <th>Nominal Klaim</th>
                                <th>Bukti Upload</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contoh Data --}}
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>2025-10-01</td>
                                <td>Medical</td>
                                <td>Rp 1.500.000</td>
                                <td><a href="#" data-toggle="modal" data-target="#detailModal">Lihat Bukti</a></td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td class="d-flex justify-content-start">
                                    <button class="btn btn-info btn-sm mr-3" data-toggle="modal" data-target="#detailModal">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                    <button class="btn btn-success btn-sm mr-3">
                                        <i class="fas fa-check"></i> Approve
                                    </button>
                                    <button class="btn btn-danger btn-sm">
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

{{-- Modal Detail Pengajuan --}}
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel">Detail Pengajuan Medical</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Karyawan:</strong> John Doe</p>
                <p><strong>NIK / Departemen:</strong> 123456 / IT</p>
                <p><strong>Tanggal Pengajuan:</strong> 2025-10-01</p>
                <p><strong>Deskripsi:</strong> Klaim biaya pengobatan di rumah sakit.</p>
                <p><strong>Nominal Klaim:</strong> Rp 1.500.000</p>
                <p><strong>Bukti Upload:</strong></p>
                <img src="{{ asset('kaiadmin/assets/img/sample-receipt.jpg') }}" alt="Bukti Upload" class="img-fluid">
                <div class="text-right mt-3">
                    <button class="btn btn-success">Approve</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModal">Reject</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Reject Pengajuan --}}
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