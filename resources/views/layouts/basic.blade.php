<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>MH Apps</title>

    <!-- Favicons -->
    <link href="{{ asset('public/assets/user/assets/img/logo-kediri.png') }}" rel="apple-touch-icon" />

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/components.min.css') }}">

    @yield('css')
</head>

<body>
    <div id="app">
        <section class="section">
            @yield('content')
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('public/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('public/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('public/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('public/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('public/assets/js/scripts.js') }}"></script>

    @yield('javascript')
</body>

</html>
