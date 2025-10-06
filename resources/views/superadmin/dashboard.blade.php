{{-- filepath: c:\laragon\www\cuti-karyawanstm\resources\views\superadmin\dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard Superadmin')

@section('content')
<div class="container">
  {{-- Header Dashboard --}}
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4" style="font-weight: bold;">Dashboard</h2>
      <p>Selamat datang di sistem cuti karyawan STM.</p>
    </div>
  </div>

  {{-- Statistik Cards --}}
  <div class="row">
    <div class="col-md-3">
      <div class="card card-stats card-primary">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="icon-big text-center">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <div class="col-7">
              <div class="numbers">
                <p class="card-category">Total Karyawan</p>
                <h4 class="card-title">{{ $totalKaryawan }}</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
          <div class="stats">
            <i class="fas fa-sync-alt"></i> Diperbarui hari ini
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-stats card-success">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="icon-big text-center">
                <i class="fas fa-calendar-check"></i>
              </div>
            </div>
            <div class="col-7">
              <div class="numbers">
                <p class="card-category">Cuti Disetujui</p>
                <h4 class="card-title">45</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
          <div class="stats">
            <i class="fas fa-sync-alt"></i> Diperbarui hari ini
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-stats card-warning">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="icon-big text-center">
                <i class="fas fa-clock"></i>
              </div>
            </div>
            <div class="col-7">
              <div class="numbers">
                <p class="card-category">Cuti Pending</p>
                <h4 class="card-title">10</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
          <div class="stats">
            <i class="fas fa-sync-alt"></i> Diperbarui hari ini
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-stats card-danger">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <div class="icon-big text-center">
                <i class="fas fa-times-circle"></i>
              </div>
            </div>
            <div class="col-7">
              <div class="numbers">
                <p class="card-category">Cuti Ditolak</p>
                <h4 class="card-title">5</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
          <div class="stats">
            <i class="fas fa-sync-alt"></i> Diperbarui hari ini
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tabel Data Cuti --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Cuti Terbaru</h4>
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jenis Cuti</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>Cuti Tahunan</td>
                <td>2025-09-01</td>
                <td>2025-09-10</td>
                <td><span class="badge badge-success">Disetujui</span></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>Cuti Sakit</td>
                <td>2025-09-05</td>
                <td>2025-09-07</td>
                <td><span class="badge badge-warning">Pending</span></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Michael Johnson</td>
                <td>Cuti Tahunan</td>
                <td>2025-09-10</td>
                <td>2025-09-15</td>
                <td><span class="badge badge-danger">Ditolak</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection