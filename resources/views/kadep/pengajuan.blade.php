{{-- filepath: c:\laragon\www\cuti_stm\resources\views\kadep\pengajuan.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Pengajuan Cuti</h4>
                <div class="d-flex">
                    <input type="text" id="search-karyawan" class="form-control me-2" placeholder="Cari karyawan...">
                    <select id="filter-department" class="form-select me-2">
                        <option value="">Semua Departemen</option>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="pengajuan-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>123456</td>
                            <td>Manager</td>
                            <td>IT</td>
                            <td>
                                <button class="btn btn-sm btn-success">Setuju</button>
                                <button class="btn btn-sm btn-danger">Tolak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>654321</td>
                            <td>Staff</td>
                            <td>HR</td>
                            <td>
                                <button class="btn btn-sm btn-success">Setuju</button>
                                <button class="btn btn-sm btn-danger">Tolak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Michael Johnson</td>
                            <td>789012</td>
                            <td>Supervisor</td>
                            <td>Finance</td>
                            <td>
                                <button class="btn btn-sm btn-success">Setuju</button>
                                <button class="btn btn-sm btn-danger">Tolak</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- Pagination --}}
                <nav>
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('search-karyawan');
    const filterDepartment = document.getElementById('filter-department');
    const tableRows = document.querySelectorAll('#pengajuan-table tbody tr');

    // Filter by search
    searchInput.addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        tableRows.forEach(row => {
            const nameCell = row.querySelector('td:nth-child(2)');
            if (nameCell.textContent.toLowerCase().includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Filter by department
    filterDepartment.addEventListener('change', function() {
        const departmentValue = this.value.toLowerCase();
        tableRows.forEach(row => {
            const departmentCell = row.querySelector('td:nth-child(5)');
            if (departmentValue === '' || departmentCell.textContent.toLowerCase() === departmentValue) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection