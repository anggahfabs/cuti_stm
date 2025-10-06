{{-- filepath: c:\laragon\www\cuti-karyawanstm\resources\views\partials\superadmin\sidebar.blade.php --}}
<div class="sidebar sidebar-style-2" style="background-color: #5041BC; font-family: 'Nunito', sans-serif;">
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">

            {{-- Logo Perusahaan + Toggle Sidebar --}}
            <div class="sidebar-header d-flex align-items-center justify-content-between px-3 py-2">
                <a href="{{ route('superadmin.dashboard') }}" class="logo">
                    <img src="{{ asset('kaiadmin/assets/img/srs.png') }}"
                        alt="Company Logo"
                        class="navbar-brand"
                        style="max-height: 45px;">
                </a>
                <a href="#" class="nav-link toggle-sidebar">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            {{-- Navigation Menu --}}
            <ul class="nav nav-primary">

                {{-- ================= SUPERADMIN MENU ================= --}}
            @if( (Auth::check() && Auth::user()->role?->nama_role === 'Superadmin') || session('role') === 'superadmin')
                    {{-- Section Title --}}
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fas fa-ellipsis-h" style="color: #fff;"></i>
                        </span>
                        <h4 class="text-section">SUPERADMIN</h4>
                    </li>

                    {{-- Dashboard --}}
                    <li class="nav-item {{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }} ">
                        <a href="{{ route('superadmin.dashboard') }}">
                            <i class="fas fa-home" style="color: #fff;"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Manajemen User --}}
                    <li class="nav-item {{ request()->routeIs('superadmin.karyawan') ? 'active' : '' }} ">
                        <a href="{{ route('superadmin.karyawan') }}">
                            <i class="fas fa-users" style="color: #fff;"></i>
                            <p>Data Karyawan</p>
                        </a>
                    </li>

                    {{-- Cuti --}}
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#cutiMenu">
                            <i class="fas fa-calendar-check" style="color: #fff;"></i>
                            <p>Pengajuan Cuti</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="cutiMenu" style="color: #fff;">
                            <ul class="nav nav-collapse">
                                <li><a href="{{ route('superadmin.cuti') }}"><span class="sub-item">Pengajuan Cuti</span></a></li>
                                <li><a href="{{ route('superadmin.medical') }}"><span class="sub-item">Pengajuan Medical</span></a></li>
                                <li><a href="{{ route('superadmin.kacamata') }}"><span class="sub-item">Pengajuan Kacamata</span></a></li>
                            </ul>
                        </div>
                    </li>

                    {{-- Laporan --}}
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#laporanMenu">
                            <i class="fas fa-file-alt" style="color: #fff;"></i>
                            <p>Laporan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="laporanMenu" style="color: #fff;">
                            <ul class="nav nav-collapse">
                                <li><a href="#"><span class="sub-item">Data Laporan Cuti</span></a></li>
                                <li><a href="#"><span class="sub-item">Data Laporan Medical</span></a></li>
                                <li><a href="#"><span class="sub-item">Data Laporan Referensi</span></a></li>
                            </ul>
                        </div>
                    </li>
                @endif

                {{-- ================= ADMIN MENU ================= --}}
               @if( (Auth::check() && Auth::user()->role?->nama_role === 'Admin') || session('role') === 'admin')
                    {{-- Section Title --}}
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fas fa-ellipsis-h" style="color: #fff;"></i>
                        </span>
                        <h4 class="text-section">Admin Panel</h4>
                    </li>

                    {{-- Dashboard --}}
                    <li class="nav-item {{ request()->routeIs('admin.dashboardadmin') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboardadmin') }}">
                            <i class="fas fa-home" style="color: #fff;"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Manajemen User --}}
                    <li class="nav-item {{ request()->routeIs('admin.karyawanadmin') ? 'active' : '' }} ">
                        <a href="{{ route('admin.karyawanadmin') }}">
                            <i class="fas fa-users" style="color: #fff;"></i>
                            <p>Data Karyawan</p>
                        </a>
                    </li>
                @endif

                    {{-- ================= KEPALA DEPARTEMEN MENU ================= --}}
       @if( (Auth::check() && Auth::user()->role?->nama_role === 'Kadep') || session('role') === 'Kadep')
                    {{-- Section Title --}}
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fas fa-ellipsis-h" style="color: #fff;"></i>
                        </span>
                        <h4 class="text-section">Kepala Departemen</h4>
                    </li>

                    {{-- Dashboard --}}
                    <li class="nav-item {{ request()->routeIs('kadep.dashboard') ? 'active' : '' }} ">
                        <a href="{{ route('kadep.dashboard') }}">
                            <i class="fas fa-home" style="color: #fff;"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Manajemen User --}}
                    <li class="nav-item {{ request()->routeIs('kadep.pengajuan') ? 'active' : '' }} ">
                        <a href="{{ route('kadep.pengajuan') }}">
                            <i class="fas fa-users" style="color: #fff;"></i>
                            <p>Data Pengajuan</p>
                        </a>
                    </li>

                  {{-- Manajemen User --}}
                    <li class="nav-item {{ request()->routeIs('kadep.monitoring') ? 'active' : '' }} ">
                        <a href="{{ route('kadep.monitoring') }}">
                            <i class="fas fa-user-check" style="color: #fff;"></i>
                            <p>Monitoring Staff</p>
                        </a>
                    </li>

                    {{-- Cuti --}}
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#cutiMenu">
                            <i class="fas fa-calendar-check" style="color: #fff;"></i>
                            <p>Tambah Pengajuan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="cutiMenu" style="color: #fff;">
                            <ul class="nav nav-collapse">
                                <li><a href="#"><span class="sub-item">Cuti</span></a></li>
                                <li><a href="#"><span class="sub-item">Kacamata</span></a></li>
                                <li><a href="#"><span class="sub-item">Medical</span></a></li>
                            </ul>
                        </div>
                    </li>
                @endif

                             {{-- ================= BMO MENU ================= --}}
              @if( (Auth::check() && Auth::user()->role?->nama_role === 'BMO') || session('role') === 'bmo')
                    {{-- Section Title --}}
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fas fa-ellipsis-h" style="color: #fff;"></i>
                        </span>
                        <h4 class="text-section">Building Management Officer</h4>
                    </li>

                    {{-- Dashboard --}}
                    <li class="nav-item {{ request()->routeIs('kadep.dashboard') ? 'active' : '' }} ">
                        <a href="{{ route('kadep.dashboard') }}">
                            <i class="fas fa-home" style="color: #fff;"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Manajemen User --}}
                    <li class="nav-item {{ request()->routeIs('kadep.pengajuan') ? 'active' : '' }} ">
                        <a href="{{ route('kadep.pengajuan') }}">
                            <i class="fas fa-users" style="color: #fff;"></i>
                            <p>Data Pengajuan Kadep</p>
                        </a>
                    </li>


                    {{-- Cuti --}}
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#cutiMenu">
                            <i class="fas fa-calendar-check" style="color: #fff;"></i>
                            <p>Tambah Pengajuan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="cutiMenu" style="color: #fff;">
                            <ul class="nav nav-collapse">
                                <li><a href="#"><span class="sub-item">Cuti</span></a></li>
                                <li><a href="#"><span class="sub-item">Kacamata</span></a></li>
                                <li><a href="#"><span class="sub-item">Medical</span></a></li>
                            </ul>
                        </div>
                    </li>
                @endif


            </ul>
        </div>
    </div>
</div>
