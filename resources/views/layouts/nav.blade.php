<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">

    <!-- for admin -->
    @if(auth()->check() AND auth()->user()->role_id = 1 AND request()->segment(1) == 'admin')
    <div id="menu-toggle" class="d-flex mr-4 ml-2 menu-toggle flex-row"> > </div>
    @endif 
    <a class="navbar-brand" href="{{ route('aspirations.index') }}">Aspirations</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-md-flex align-items-center justify-content-between"
        id="navbarNavAltMarkup">
        <!-- nav left -->
        <div class="navbar-nav">
            <a class="nav-item nav-link text-center active" href="{{ route('aspirations.beranda') }}">Beranda</a>
            <a class="nav-item nav-link text-center active" href="{{ route('aspirations.create') }}">Buat Aspirasi</a>

            @if(auth()->check() AND auth()->user()->role_id == 1)
            <a class="nav-item nav-link text-center active" href="{{ route('admins.index') }}">Admin</a>
            @endif
        </div>
        <!-- end nav left -->

        <!-- nav right -->
        <div class="d-flex align-items-center justify-content-between">
            <div class="dropdown mr-2 ">
                <i class="dropdown-toggle dropdown-toggle-hide fas fa-search" id="dropdownMenuButton"
                    data-toggle="dropdown">
                </i>
                <div class="dropdown-menu-md-right  dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <form class="form-inline my-2 w-75v my-lg-0 dropdown-item">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="dropdown pl-2 border-left border-dark ">
                @if(!auth()->check())
                <a href="{{ route('login') }}" class="btn btn-gradient m-auto border-0">Login</a>
                <a href="{{ route('register') }}" class="btn btn-gradient m-auto border-0">Register</a>
                @else
                <div class="dropdown pl-2 ml-auto ">
                     <p class="dropdown-toggle m-auto" id="dropdownMenuButton" data-toggle="dropdown">
                         {{ auth()->user()->name }}
                     </p>
                     <div class="dropdown-menu dropdown-menu-md-right">
                        <a class="dropdown-item" href="{{ route('aspirations.profile') }}">
                            <i class="fas fa-user fa-fw"></i>  
                            My Profile
                        </a>
                         <a class="dropdown-item"> <i class="fas fa-fw fa-lightbulb text-warning"></i> My
                             Profile</a>
                         <div class="dropdown-divider"></div>
                         <form class="d-flex justify-content-around" method="POST" action="{{ route('logout') }}">
                             @csrf
                             <button class=" dropdown-item ">
                             <i class="fas fa-fw fa-sign-out-alt"></i>logout</button>
                         </form>

                     </div>
                </div>
                @endif
            </div>

        </div>
        <!-- nav right -->

    </div>

</nav>