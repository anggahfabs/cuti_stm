@extends('layouts.app')

@section('title', 'Data Karyawan')

@section('content')

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
      <form action="{{ route('admin.karyawanadmin') }}" method="GET">
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
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered text-center align-middle">
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
                  <td>{{ $index + 1 }}</td>
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

                  {{-- ✅ QR Code + Modal Popup --}}
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

                  {{-- Tombol Aksi --}}
                  <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editKaryawanModal{{ $row->user_id }}">
                      <i class="fas fa-edit"></i> Edit
                    </button>

                    <form action="{{ route('admin.karyawanadmin.destroy', $row->user_id) }}" method="POST" class="d-inline"
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
        </div>
      </div>
    </div>
  </div>

  {{-- MODAL TAMBAH & EDIT --}}
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  {{-- Modal Tambah Karyawan --}}
  <div class="modal fade" id="addKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="addKaryawanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="addKaryawanModalLabel">Tambah Karyawan</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.karyawanadmin.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
            </div>
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="form-group">
              <label for="departemen_id">Departemen</label>
              <select class="form-control" id="departemen_id" name="departemen_id" required>
                <option value="">-- Pilih Departemen --</option>
                @foreach($departemen as $d)
                <option value="{{ $d->departemen_id }}">{{ $d->nama_departemen }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="jabatan_id">Jabatan</label>
              <select class="form-control" id="jabatan_id" name="jabatan_id" required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach($jabatan as $j)
                <option value="{{ $j->jabatan_id }}">{{ $j->nama_jabatan }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="role_id">Role</label>
              <select class="form-control" id="role_id" name="role_id" required>
                <option value="">-- Pilih Role --</option>
                @foreach($role as $r)
                <option value="{{ $r->role_id }}">{{ $r->nama_role }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="form-group">
              <label for="no_hp">No HP</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No HP">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan Alamat"></textarea>
            </div>
            <div class="form-group">
              <label for="tanggal_masuk">Tanggal Masuk</label>
              <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
            </div>
            <div class="form-group">
              <label for="status_karyawan">Status Karyawan</label>
              <select class="form-control" id="status_karyawan" name="status_karyawan" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
              </select>
            </div>
            <div class="form-group text-right">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Edit Karyawan --}}
  @foreach($karyawan as $row)
  <div class="modal fade" id="editKaryawanModal{{ $row->user_id }}" tabindex="-1" role="dialog" aria-labelledby="editKaryawanModalLabel{{ $row->user_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="editKaryawanModalLabel{{ $row->user_id }}">Edit Karyawan</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.karyawanadmin.update', $row->user_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" name="nik" value="{{ $row->nik }}" required>
            </div>
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_lengkap" value="{{ $row->nama_lengkap }}" required>
            </div>
            <div class="form-group">
              <label for="departemen_id">Departemen</label>
              <select class="form-control" name="departemen_id" required>
                @foreach($departemen as $d)
                <option value="{{ $d->departemen_id }}" {{ $row->nama_departemen == $d->nama_departemen ? 'selected' : '' }}>
                  {{ $d->nama_departemen }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="jabatan_id">Jabatan</label>
              <select class="form-control" name="jabatan_id" required>
                @foreach($jabatan as $j)
                <option value="{{ $j->jabatan_id }}" {{ $row->nama_jabatan == $j->nama_jabatan ? 'selected' : '' }}>
                  {{ $j->nama_jabatan }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="role_id">Role</label>
              <select class="form-control" name="role_id" required>
                @foreach($role as $r)
                <option value="{{ $r->role_id }}" {{ $row->nama_role == $r->nama_role ? 'selected' : '' }}>
                  {{ $r->nama_role }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $row->email }}" required>
            </div>
            <div class="form-group">
              <label for="no_hp">No HP</label>
              <input type="text" class="form-control" name="no_hp" value="{{ $row->no_hp }}">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" name="alamat">{{ $row->alamat }}</textarea>
            </div>
            <div class="form-group">
              <label for="tanggal_masuk">Tanggal Masuk</label>
              <input type="date" class="form-control" name="tanggal_masuk" value="{{ $row->tanggal_masuk }}" required>
            </div>
            <div class="form-group">
              <label for="status_karyawan">Status Karyawan</label>
              <select class="form-control" name="status_karyawan" required>
                <option value="aktif" {{ $row->status_karyawan == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $row->status_karyawan == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
              </select>
            </div>
            <div class="form-group text-right">
              <button type="submit" class="btn btn-warning">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
