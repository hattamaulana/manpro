<!DOCTYPE html>
<html lang="en">

<head>
    <title>mhApps</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('public/landing-page/img/favicon.png') }}"" rel=" icon">
    <link href="{{ asset('public/landing-page/img/apple-touch-icon.png') }}"" rel=" apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

    <!-- Bootstrap css -->
    <!-- <link rel="stylesheet" href="{{ asset('public/landing-page/css/bootstrap.css') }}"> -->
    <link href="{{ asset('public/landing-page/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('public/landing-page/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/landing-page/lib/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/landing-page/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/landing-page/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/landing-page/lib/modal-video/css/modal-video.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('public/landing-page/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <header id="header" class="header header-hide">
        <div class="container">
            <div id="logo" class="pull-left">
                <h1><a href="#hero" class="scrollto"><span>mh</span>Apps</a></h1>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#hero">Home</a></li>
                    <li><a href="#pricing">Paket</a></li>
                    <li><a href="#about-us">Alur</a></li>
                    <li><a href="#features">Psikolog</a></li>
                    <li><a href="#testimonials">Testimoni</a></li>
                    <li><a href="#team">About Us</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

    <!--========================== Hero Section ============================-->
    <section id="hero" class="wow fadeIn">
        <div class="hero-container">
            <h1 style="position: absolute;">Jangan takut<br>untuk mengutamakan<br>kesehatan mentalmu</h1>
            <img src="{{ asset('public/landing-page/img/background.jpg') }}"" alt=" Hero Imgs">

            <a href="{{ url('chat') }}" class="btn-get-started scrollto" style="position: absolute; margin-right: 777px;">
                Chat Dengan Psikolog
            </a>

            <a href="{{ url('/register/consult') }}" class="btn-get-started scrollto"
                style="position: absolute; margin-right: 247px;">Daftar Konsultasi</a>
        </div>
    </section>

    <!--========================== Get Started Section ============================-->
    <section id="get-started" class="padd-section text-center wow fadeInUp" style="padding-top: 237px;">
        <div class="container">
            <div class="section-title text-center">
                <h2>Pentingnya Konsultasi Psikologi </h2>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="feature-block">
                        <img src="{{ asset('public/landing-page/img/svg/1.png') }}"" alt=" img"
                            class="img-fluid">
                        <h4>Membantu mengatasi<br>rasa kehilangan</h4>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="feature-block">

                        <img src="{{ asset('public/landing-page/img/svg/2.png') }}"" alt=" img"
                            class="img-fluid" style="width: 123px;">
                        <h4>Membantu Mengatasi<br>Stres dan Kecemasan</h4>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="feature-block">

                        <img src="{{ asset('public/landing-page/img/svg/3.png') }}"" alt=" img"
                            class="img-fluid">
                        <h4>Membantu Kelola Depresi</h4>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4" style="margin-left: 167px;">
                    <div class="feature-block">
                        <img src="{{ asset('public/landing-page/img/svg/4.png') }}"" alt=" img"
                            class="img-fluid" style="width: 123px;">
                        <h4>Kejernihan Mental</h4>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="feature-block">
                        <img src="{{ asset('public/landing-page/img/svg/5.png') }}"" alt=" img"
                            class="img-fluid">
                        <h4>Bantu mengatasi<br>masalah keluarga dan hubungan</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--========================== Pricing Table Section ============================-->
    <section id="pricing" class="padd-section text-center wow fadeInUp">
        <div class="container">
            <div class="section-title text-center">
                <h2>Paket Konsultasi</h2>
            </div>
        </div>

        <div class="container" style="margin-top: -65px;">
            <img src="{{ asset('public/landing-page/img/price.png') }}"" alt=" Hero Imgs">
        </div>
    </section>

    <!--========================== About Us Section ============================-->
    <section id="about-us" class="about-us padd-section wow fadeInUp">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-7">
                    <img src="{{ asset('public/landing-page/img/alur.jpg') }}"" alt=" About" style="height:535px;">
                </div>

                <div class="col-md-7 col-lg-5">
                    <div class="about-content">
                        <h2><span>Alur Konsultasi</span></h2>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right"></i>Daftar Konsultasi</li>
                            <li><i class="fa fa-angle-right"></i>Pilih Paket</li>
                            <li><i class="fa fa-angle-right"></i>Selesaikan Pembayaran</li>
                            <li><i class="fa fa-angle-right"></i>Terima Notifikasi di Email</li>
                            <li><i class="fa fa-angle-right"></i>Mulai Konsultasi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--========================== Features Section ============================-->
    <section id="features" class="padd-section text-center wow fadeInUp">
        <div class="container">
            <div class="section-title text-center">
                <h2>Psikolog</h2>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($psikolog as $i => $item)
                    <div class="col-md-6 col-lg-3">
                        <div class="feature-block">
                            <img src="{{ asset($item->jenis_kelamin == 'Perempuan' ? 'public/landing-page/img/svg/psikolog2.png' : 'public/landing-page/img/svg/psikolog1.png') }}"" alt="
                                img" class="img-fluid">
                            <h4>{{ $item->nama }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--========================== Team Section ============================-->
    <section id="team" class="padd-section text-center wow fadeInUp">
        <div class="container">
            <div class="section-title text-center">
                <h2>About Us</h2>
                <p class="separator"><b>mhApps</b> adalah Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>

        <div class="container">
            <h2 style="margin-bottom: 43px;margin-top: -37px;">Our Team</h2>
            <div class="row">

                <div class="col-md-6 col-md-4 col-lg-3">
                    <div class="team-block bottom">
                        <img src="{{ asset('public/landing-page/img/team/hatta.png') }}"" class="  img-responsive"
                            alt="img">
                        <div class="team-content">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <h4>Hatta</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3">
                    <div class="team-block bottom">
                        <img src="{{ asset('public/landing-page/img/team/addin.png') }}"" class="  img-responsive"
                            alt="img">
                        <div class="team-content">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <h4>Addin</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3">
                    <div class="team-block bottom">
                        <img src="{{ asset('public/landing-page/img/team/fildzah.png') }}"" class="  img-responsive"
                            alt="img">
                        <div class="team-content">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <h4>Fildzah</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-4 col-lg-3">
                    <div class="team-block bottom">
                        <img src="{{ asset('public/landing-page/img/team/ima.png') }}"" class="  img-responsive"
                            alt="img">
                        <div class="team-content">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <h4>Ima</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <a href="#hero" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('public/landing-page/lib/jquery/jquery.min.js') }}""></script>
    <script src="{{ asset('public/landing-page/lib/jquery/jquery-migrate.min.js') }}""></script>
    <script src="{{ asset('public/landing-page/lib/bootstrap/js/bootstrap.bundle.min.js') }}""></script>
    <script src="{{ asset('public/landing-page/lib/superfish/hoverIntent.js') }}""></script>
    <script src="{{ asset('public/landing-page/lib/superfish/superfish.min.js') }}""></script>
    <script src="{{ asset('public/landing-page/lib/easing/easing.min.js') }}""></script>
    <script src="{{ asset('public/landing-page/lib/modal-video/js/modal-video.js') }}""></script>
    <script src="{{ asset('public/landing-page/lib/owlcarousel/owl.carousel.min.js') }}""></script>
    <script src="{{ asset('public/landing-page/lib/wow/wow.min.js') }}""></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{ asset('public/landing-page/contactform/contactform.js') }}""></script>
    <!-- Template Main Javascript File -->
    <script src="{{ asset('public/landing-page/js/main.js') }}""></script>

</body>

</html>
