<!-- navbar background color -->
<div class="navbar-bg"></div>
<!-- navbar -->
<nav class="navbar navbar-expand-lg main-navbar">
    <!-- navbar nav left -->
    <form class="form-inline mr-auto">
        <!-- navbar toggler -->
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <!-- navbar right -->
    <ul class="navbar-nav navbar-right">
        <!-- navbar notification toggle -->

        <!-- navbar right item -->
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">            
                <div class="d-sm-none d-lg-inline-block">Halo, {{ Auth::user()->username }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('profile')}}" class="dropdown-item has-icon">
                    <i class="fas fa-user"></i> Profil
                </a>
                <a href="{{route('pengaturan')}}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Pengaturan
                </a>
            </div>
        </li>
    </ul>
</nav>