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

                    {{-- Section Title --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Cuti Karyawan</h4>
                </li>
                
                {{-- Dashboard --}}
                <li class="nav-item active">
                    <a href="{{ route('superadmin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                     {{-- Manajemen User --}}
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-users"></i>
                        <p>Data Karyawan</p>
                    </a>
                </li>

                
                {{-- Cuti --}}
                <li class="nav-item">
                    <a data-toggle="collapse" href="#cutiMenu">
                        <i class="fas fa-calendar-check"></i>
                        <p>Approval Cuti</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="cutiMenu">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item">Data Cuti</span></a></li>
                            <li><a href="#"><span class="sub-item">Approval Cuti</span></a></li>
                        </ul>
                    </div>
                </li>

            
                {{-- Laporan --}}
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-file-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>