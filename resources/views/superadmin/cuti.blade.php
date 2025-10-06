{{-- filepath: c:\laragon\www\cuti-karyawanstm\resources\views\superadmin\cuti.blade.php --}}
@extends('layouts.app')

@section('title', 'Pengajuan Cuti')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4" style="font-weight: bold;">Pengajuan Cuti</h2>
            <p>Berikut adalah daftar pengajuan cuti karyawan.</p>
        </div>
    </div>

    {{-- Filter Search --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('superadmin.cuti') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan nama, NIK, atau departemen..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Data Cuti --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Pengajuan Cuti</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>Jabatan</th>
                                <th>NIK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contoh Data --}}
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>IT</td>
                                <td>Staff</td>
                                <td>123456</td>
                                <td>
                                    <button class="btn btn-success btn-sm">
                                        <i class="fas fa-check"></i> Setuju
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"></i> Tolak
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>HRD</td>
                                <td>Manager</td>
                                <td>654321</td>
                                <td>
                                    <button class="btn btn-success btn-sm">
                                        <i class="fas fa-check"></i> Setuju
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"></i> Tolak
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Michael Johnson</td>
                                <td>Finance</td>
                                <td>Analyst</td>
                                <td>789012</td>
                                <td>
                                    <button class="btn btn-success btn-sm">
                                        <i class="fas fa-check"></i> Setuju
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"></i> Tolak
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
@endsection