{{-- filepath: resources/views/partials/staff/navbar.blade.php --}}
@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

<nav class="navbar navbar-header navbar-expand-lg" data-background-color="white" style="padding: 15px 25px;">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        {{-- Kiri: Dashboard --}}
        <a href="{{ route('staff.dashboard') }}" class="navbar-brand">
            <h4 style="margin: 0; font-weight: bold;">Dashboard Staff</h4>
        </a>

        {{-- Kanan: Icon & Profile --}}
        <ul class="navbar-nav d-flex align-items-center">
            {{-- Profile --}}
            <li class="nav-item dropdown mx-2">
                <a class="dropdown-toggle profile-pic d-flex align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
                    <img src="{{ asset('kaiadmin/assets/img/profile.jpg') }}" alt="user-img" width="36" class="rounded-circle">
                    <span class="ml-2 d-none d-lg-inline">
                        Hi, {{ $user->nama_lengkap ?? 'Staff' }}
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-user dropdown-menu-right animated fadeIn">
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user"></i> Profil Saya
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cog"></i> Pengaturan
                        </a>
                    </li>

                    <li><div class="dropdown-divider"></div></li>

                    {{-- Logout pakai form POST --}}
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

{{-- Font Awesome (pastikan hanya sekali di-include di layout utama) --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
