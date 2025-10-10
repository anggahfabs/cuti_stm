@extends('layouts.app')

@section('title', 'Data Karyawan')

@section('content')

<style>
  .table-responsive {
    max-width: 100%;
  }
  table th, table td {
    white-space: nowrap; /* Biar teks gak turun ke bawah */
    vertical-align: middle;
  }
  .card {
    overflow-x: hidden;
  }
  @media (max-width: 992px) {
    table {
      font-size: 13px;
    }
  }
</style>


<style>
  .cursor-pointer {
    cursor: pointer;
    transition: transform 0.2s ease;
  }
  .cursor-pointer:hover {
    transform: scale(1.05);
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4" style="font-weight: bold;">Data Karyawan</h2>
      <p>Berikut adalah daftar karyawan yang terdaftar di sistem.</p>
    </div>
  </div>

  {{-- Filter Search dan Tombol Tambah Karyawan --}}
  <div class="row mb-3">
    <div class="col-md-6">
      <form action="{{ route('superadmin.karyawan') }}" method="GET">
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
    <form action="{{ route('superadmin.karyawan') }}" method="GET" class="mb-3 d-flex gap-2">
      {{-- Filter Departemen --}}
      <select class="form-control w-auto" name="departemen" onchange="this.form.submit()">
        <option value="">-- Semua Departemen --</option>
        @foreach ($departemen as $dept)
        <option value="{{ $dept->departemen_id }}" {{ request('departemen') == $dept->departemen_id ? 'selected' : '' }}>
          {{ $dept->nama_departemen }}
        </option>
        @endforeach
      </select>

      {{-- Pencarian --}}
      <input type="text" name="search" class="form-control w-auto" placeholder="Cari nama / NIK" value="{{ request('search') }}">

      <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    <div class="col-md-6 text-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#addKaryawanModal">
        <i class="fas fa-plus"></i> Tambah Karyawan
      </button>
    </div>
  </div>

  {{-- Tabel Data Karyawan --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Karyawan</h4>
        </div>
<div class="card-body p-3">
  <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
    <table class="table table-striped table-bordered align-middle text-center" style="width: 100%; table-layout: auto;">
              <thead class="thead-primary">
                <tr>
                  <th>#</th>
                  <th>NIK</th>
                  <th>Nama Lengkap</th>
                  <th>Departemen</th>
                  <th>Jabatan</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                  <th>Tanggal Masuk</th>
                  <th>Status Karyawan</th>
                  <th>QR Code</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($karyawan as $index => $row)
                <tr>
                  <td>{{ $karyawan->firstItem() + $index }}</td>
                  <td>{{ $row->nik }}</td>
                  <td>{{ $row->nama_lengkap }}</td>
                  <td>{{ $row->nama_departemen }}</td>
                  <td>{{ $row->nama_jabatan }}</td>
                  <td>{{ $row->nama_role }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->no_hp }}</td>
                  <td>{{ $row->alamat }}</td>
                  <td>{{ $row->tanggal_masuk }}</td>
                  <td>{{ $row->status_karyawan }}</td>

                  {{-- ✅ QR Code + Popup --}}
                  <td class="text-center">
                    @if(file_exists(public_path('qr_code/' . $row->nik . '.png')))
                      <img src="{{ asset('qr_code/' . $row->nik . '.png') }}"
                          alt="QR Code"
                          width="80"
                          height="80"
                          class="rounded shadow-sm cursor-pointer"
                          data-toggle="modal"
                          data-target="#qrModal{{ $row->user_id }}">
                    @else
                      <span class="text-muted">Belum ada QR</span>
                    @endif
                  </td>

                  <td>
                    {{-- Tombol Edit --}}
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editKaryawanModal{{ $row->user_id }}">
                      <i class="fas fa-edit"></i> Edit
                    </button>

                    {{-- Tombol Delete --}}
                    <form action="{{ route('superadmin.karyawan.destroy', $row->user_id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin ingin menghapus karyawan ini?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Delete
                      </button>
                    </form>
                  </td>
                </tr>

                {{-- 🔹 Modal QR Popup --}}
                <div class="modal fade" id="qrModal{{ $row->user_id }}" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel{{ $row->user_id }}" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content text-center">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="qrModalLabel{{ $row->user_id }}">QR Code - {{ $row->nama_lengkap }}</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <img src="{{ asset('qr_code/' . $row->nik . '.png') }}" alt="QR Code" class="img-fluid mb-3" style="max-width: 300px;">
                        <br>
                        <a href="{{ asset('qr_code/' . $row->nik . '.png') }}" download="QR_{{ $row->nik }}.png" class="btn btn-success">
                          <i class="fas fa-download"></i> Unduh QR Code
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- End Modal --}}
                @empty
                <tr>
                  <td colspan="13" class="text-center">Belum ada data karyawan.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center mt-3">
            {{ $karyawan->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Tambah Karyawan --}}
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  {{-- ... (Modal Tambah & Edit tetap seperti sebelumnya) --}}
  {{-- Pastikan modal tambah dan edit di bawah ini tetap ada --}}

</div>
@endsection
