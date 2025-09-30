{{-- filepath: c:\laragon\www\cuti-karyawanstm\resources\views\partials\superadmin\navbar.blade.php --}}
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="white" style="padding: 15px 25px;">
    <div class="container-fluid">
        {{-- Logo atau Judul Navbar --}}
        <a href="{{ route('superadmin.dashboard') }}" class="navbar-brand">
            <h4 style="margin: 0; font-weight: bold;">Dashboard</h4>
        </a>

        {{-- Right Section --}}
        <ul class="navbar-nav topbar-nav ml-auto align-items-center">
            {{-- Icon Envelope --}}
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-envelope"></i></a>
            </li>

            {{-- Notifications --}}
            <li class="nav-item dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                    <span class="notification">4</span>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                        <div class="dropdown-title">You have 4 new notifications</div>
                    </li>
                </ul>
            </li>

            {{-- Icon Layer --}}
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-layer-group"></i></a>
            </li>

            {{-- Profile Dropdown --}}
            <li class="nav-item dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <img src="{{ asset('kaiadmin/assets/img/profile.jpg') }}" alt="user-img" width="36" class="img-circle">
                    <span>Hi, Superadmin</span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> My Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><div class="dropdown-divider"></div></li>
                    <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>