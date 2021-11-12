<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>MH Apps</title>

    <!-- Favicons -->
    <link href="{{ asset('public/assets/user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/image-uploader/dist/image-uploader.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" integrity="sha512-BjUcsqlmxCfopFFJpQr57VRWk3/N+csTp8cwWSNeOmBnz8QriGor88ZiHlLKPvutKvTpRU7HRT08E0y/FM0TCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/components.min.css') }}">

    <!-- CustomCSS -->
    @yield('customCSS')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.navbar')
            @include('layouts.sidebar')
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            @include('layouts.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script src="{{ asset('public/node_modules/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('public/node_modules/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('public/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('public/node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('public/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('public/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('public/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('public/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('public/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('public/image-uploader/dist/image-uploader.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Other JS  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js" integrity="sha512-e+JSf1UWuoLdiGeXXi5byQqIN7ojQLLgvC+aV0w9rnKNwNDBAz99sCgS20+PjT/r+yitmU7kpGVZJQDDgevhoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Template JS File -->
    <script src="{{ asset('public/assets/js/stisla.js') }}"></script>
    <script src="{{ asset('public/assets/js/scripts.js') }}"></script>
    {{-- <script src="{{ asset('public/assets/js/custom.js') }}"></script> --}}

    <!-- CustomJS -->
    <script>
        let datatable
    </script>

    @yield('customJS')
    {{-- @include('sweetalert::alert') --}}
</body>

</html>
