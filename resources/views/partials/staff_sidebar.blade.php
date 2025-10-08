{{-- filepath: c:\laragon\www\cuti_stm\resources\views\partials\staff_sidebar.blade.php --}}
<div class="sidebar sidebar-style-2" style="background-color: #FFFFFF; font-family: 'Nunito', sans-serif;">
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">

            {{-- Logo Perusahaan --}}
            <div class="sidebar-header d-flex align-items-center justify-content-between px-3 py-2">
                <a href="#" class="logo">
                    <img src="{{ asset('kaiadmin/assets/img/srs.png') }}" alt="Company Logo" class="navbar-brand" style="max-height: 45px;">
                </a>
                <a href="#" class="nav-link toggle-sidebar">
                    <i class="fas fa-bars" style="color: #000;"></i>
                </a>
            </div>

            {{-- Navigation Menu --}}
            <ul class="nav nav-primary">

                {{-- Dashboard Section --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-ellipsis-h" style="color: #000;"></i>
                    </span>
                    <h4 class="text-section" style="color: #000;">Dashboard</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('staff.dashboard') }}">
                        <i class="fas fa-home" style="color: #000;"></i>
                        <p style="color: #000;">Beranda</p>
                    </a>
                </li>


                {{-- Tunjangan Section --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-ellipsis-h" style="color: #000;"></i>
                    </span>
                    <h4 class="text-section" style="color: #000;">Tunjangan</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#tunjanganMenu">
                        <i class="fas fa-wallet" style="color: #000;"></i>
                        <p style="color: #000;">Tunjangan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tunjanganMenu">
                        <ul class="nav nav-collapse">
                            <li><a href="#"><span class="sub-item" style="color: #000;">Medical</span></a></li>
                            <li><a href="{{ route('staff.kacamata.index') }}"><span class="sub-item" style="color: #000;">Kacamata</span></a></li>
                        </ul>
                    </div>
                </li>

                {{-- Pengajuan Section --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-ellipsis-h" style="color: #000;"></i>
                    </span>
                    <h4 class="text-section" style="color: #000;">Pengajuan</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#pengajuanMenu">
                        <i class="fas fa-file-alt" style="color: #000;"></i>
                        <p style="color: #000;">Pengajuan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pengajuanMenu">
                        <ul class="nav nav-collapse">
                            <li><a href="{{ route('staff.ajukan_cuti') }}"><span class="sub-item" style="color: #000;">Izin Cuti</span></a></li>
                            <li><a href="{{ route('staff.izin_meninggalkan') }}"><span class="sub-item" style="color: #000;">Izin Meninggalkan Kerja</span></a></li>
                            <li><a href="{{ route('staff.izin_terlambat') }}"><span class="sub-item" style="color: #000;">Izin Terlambat</span></a></li>
                            <li><a href="{{ route('staff.settings') }}"><span class="sub-item" style="color: #000;">Settings</span></a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>

{{-- Pastikan Font Awesome sudah di-load di layout utama --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">