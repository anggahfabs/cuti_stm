{{-- filepath: resources/views/partials/superadmin/navbar.blade.php --}}
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="white" style="padding: 15px 25px;">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        {{-- Kiri: Dashboard --}}
        <a href="{{ route('superadmin.dashboard') }}" class="navbar-brand">
            <h4 style="margin: 0; font-weight: bold;">Dashboard</h4>
        </a>

        {{-- Kanan: Icon & Profile --}}
        <ul class="navbar-nav d-flex align-items-center">

            {{-- Profile --}}
            <li class="nav-item dropdown mx-2">
                <a class="dropdown-toggle profile-pic d-flex align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
                    <img src="{{ asset('kaiadmin/assets/img/profile.jpg') }}" alt="user-img" width="36" class="rounded-circle">
                    <span class="ml-2 d-none d-lg-inline">Hi, Superadmin</span>
                </a>
                <ul class="dropdown-menu dropdown-user dropdown-menu-right animated fadeIn">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> My Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a></li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

{{-- Pastikan di layout utama sudah load Font Awesome 5 --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">