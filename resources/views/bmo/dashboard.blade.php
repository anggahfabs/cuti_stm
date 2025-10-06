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
                            {{-- 
                            <a href="{{ route('karyawan.detail', ['id' => 1]) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            --}}

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
                                {{--
                                <a href="{{ route('karyawan.detail', ['id' => 2]) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                --}}
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
                                {{--
                                <a href="{{ route('karyawan.detail', ['id' => 3]) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>
@endsection