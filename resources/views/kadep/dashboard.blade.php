{{-- filepath: c:\laragon\www\cuti_stm\resources\views\kadep\dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Data Karyawan</h4>
                <div>
                    <select id="filter-department" class="form-select">
                        <option value="">Semua Departemen</option>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="employee-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Email</th>
                            <th>Tanggal Masuk</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>123456</td>
                            <td>Manager</td>
                            <td>IT</td>
                            <td>john.doe@example.com</td>
                            <td>2020-01-15</td>
                            <td>
                                <button class="btn btn-sm btn-info btn-detail" 
                                    data-nama="John Doe"
                                    data-nik="123456"
                                    data-jabatan="Manager"
                                    data-departemen="IT"
                                    data-email="john.doe@example.com"
                                    data-tanggal="2020-01-15">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>654321</td>
                            <td>Staff</td>
                            <td>HR</td>
                            <td>jane.smith@example.com</td>
                            <td>2021-03-20</td>
                            <td>
                                <button class="btn btn-sm btn-info btn-detail" 
                                    data-nama="Jane Smith"
                                    data-nik="654321"
                                    data-jabatan="Staff"
                                    data-departemen="HR"
                                    data-email="jane.smith@example.com"
                                    data-tanggal="2021-03-20">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Michael Johnson</td>
                            <td>789012</td>
                            <td>Supervisor</td>
                            <td>Finance</td>
                            <td>michael.johnson@example.com</td>
                            <td>2019-07-10</td>
                            <td>
                                <button class="btn btn-sm btn-info btn-detail" 
                                    data-nama="Michael Johnson"
                                    data-nik="789012"
                                    data-jabatan="Supervisor"
                                    data-departemen="Finance"
                                    data-email="michael.johnson@example.com"
                                    data-tanggal="2019-07-10">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Detail --}}
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="detailModalLabel">Detail Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <table class="table table-bordered">
              <tr>
                  <th>Nama</th>
                  <td id="detail-nama"></td>
              </tr>
              <tr>
                  <th>NIK</th>
                  <td id="detail-nik"></td>
              </tr>
              <tr>
                  <th>Jabatan</th>
                  <td id="detail-jabatan"></td>
              </tr>
              <tr>
                  <th>Departemen</th>
                  <td id="detail-departemen"></td>
              </tr>
              <tr>
                  <th>Email</th>
                  <td id="detail-email"></td>
              </tr>
              <tr>
                  <th>Tanggal Masuk</th>
                  <td id="detail-tanggal"></td>
              </tr>
          </table>
      </div>
    </div>
  </div>
</div>

<script>
    // Filter Departemen
    document.getElementById('filter-department').addEventListener('change', function() {
        const department = this.value.toLowerCase();
        const rows = document.querySelectorAll('#employee-table tbody tr');

        rows.forEach(row => {
            const cell = row.querySelector('td:nth-child(5)');
            if (department === '' || cell.textContent.toLowerCase() === department) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Detail Modal
    document.querySelectorAll('.btn-detail').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('detail-nama').textContent = this.dataset.nama;
            document.getElementById('detail-nik').textContent = this.dataset.nik;
            document.getElementById('detail-jabatan').textContent = this.dataset.jabatan;
            document.getElementById('detail-departemen').textContent = this.dataset.departemen;
            document.getElementById('detail-email').textContent = this.dataset.email;
            document.getElementById('detail-tanggal').textContent = this.dataset.tanggal;

            const modal = new bootstrap.Modal(document.getElementById('detailModal'));
            modal.show();
        });
    });
</script>
@endsection
