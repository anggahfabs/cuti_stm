
{{-- filepath: c:\laragon\www\cuti_stm\resources\views\kadep\monitoring.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Monitoring Ketidakhadiran Karyawan</h4>
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Karyawan Tidak Masuk</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="monitoring-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Tanggal Tidak Masuk</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>123456</td>
                            <td>Manager</td>
                            <td>IT</td>
                            <td>2025-10-01</td>
                            <td>Cuti Tahunan</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>654321</td>
                            <td>Staff</td>
                            <td>HR</td>
                            <td>2025-10-02</td>
                            <td>Sakit</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Michael Johnson</td>
                            <td>789012</td>
                            <td>Supervisor</td>
                            <td>Finance</td>
                            <td>2025-10-03</td>
                            <td>Izin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Karyawan Tidak Masuk --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addModalLabel">Tambah Karyawan Tidak Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama karyawan">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK karyawan">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" placeholder="Masukkan jabatan karyawan">
                    </div>
                    <div class="mb-3">
                        <label for="departemen" class="form-label">Departemen</label>
                        <select class="form-select" id="departemen">
                            <option value="IT">IT</option>
                            <option value="HR">HR</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Tidak Masuk</label>
                        <input type="date" class="form-control" id="tanggal">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukkan keterangan"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Filter Departemen
    document.getElementById('filter-department').addEventListener('change', function() {
        const department = this.value.toLowerCase();
        const rows = document.querySelectorAll('#monitoring-table tbody tr');

        rows.forEach(row => {
            const cell = row.querySelector('td:nth-child(5)');
            if (department === '' || cell.textContent.toLowerCase() === department) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection