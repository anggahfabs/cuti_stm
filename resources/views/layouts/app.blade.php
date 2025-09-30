<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Cuti Karyawan STM')</title>

    <!-- Fonts and Icons -->
    <script src="{{ asset('kaiadmin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid", 
                    "Font Awesome 5 Regular", 
                    "Font Awesome 5 Brands", 
                    "simple-line-icons"
                ],
                urls: ['{{ asset('kaiadmin/assets/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Kaiadmin CSS -->
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/kaiadmin.min.css') }}">
</head>
<body>
    <div class="wrapper">

        {{-- Sidebar Superadmin --}}
        @include('partials.superadmin.sidebar')

        <div class="main-panel">
            @include('partials.superadmin.navbar')   {{-- Navbar dengan toggle --}}


            {{-- Main Content --}}
            <div class="container mt-4">
                @yield('content')
            </div>

            {{-- Footer Superadmin --}}
            @include('partials.superadmin.footer')
        </div>
    </div>

    <!-- Kaiadmin Core JS -->
    <script src="{{ asset('kaiadmin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('kaiadmin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('kaiadmin/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('kaiadmin/assets/js/kaiadmin.min.js') }}"></script>
</body>
</html>