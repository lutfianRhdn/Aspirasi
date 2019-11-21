<nav class="navbar navbar-expand-lg navbar-light bg-light  shadow">

    <!-- for admin to toggle sidebar -->
    @can('isAdmin', auth()->user() )
    <div id="menu-toggle" class="d-flex mr-4 ml-2 menu-toggle flex-row ">
        {{ request()->segment(1) == 'admin' ? '>>' : '' }} </div>
    @endcan
    <!-- end for admin -->

    <!-- title nav -->
    <a class="navbar-brand" href="{{ route('aspirations.index') }}">
        <img src="{{ asset('assets/img/logo.png') }}" class="img img-small">
    </a>
    <!-- end of title nav -->

    <!-- collpase button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- end of collapse button -->

    <!-- main nav -->
    <div class="collapse navbar-collapse d-lg-flex align-items-center justify-content-between" id="navbarNavAltMarkup">

        <!-- nav left -->
        <div class="navbar-nav">

            <!-- user page -->
            <a class="nav-item nav-link text-center {{ request()->segment(2) == 'beranda' ? 'active' : '' }}"
                href="{{ route('aspirations.beranda') }}">Beranda</a>
            <a class="nav-item nav-link text-center {{ request()->segment(2) == 'create' ? 'active': '' }}"
                href="{{ route('aspirations.create') }}">Buat Aspirasi</a>
            <!-- end of user page -->

            <!-- admin page -->
            @can('isAdmin', auth()->user())
            <a class="nav-item nav-link text-center {{ request()->segment(1) == 'admin' ? 'active' : '' }}"
                href="{{ route('admins.index') }}">Admin</a>
            @endcan
            <!-- end of admin page -->

        </div>
        <!-- end nav left -->

        <!-- nav right -->
        <div class="d-flex align-items-center justify-content-between">

            @if(auth()->check())
            <!-- search button -->
            <div class="dropdown ">
                <i class="dropdown-toggle dropdown-toggle-hide fas fa-search" id="dropdownMenuButton"
                    data-toggle="dropdown">
                </i>
                <div class="dropdown-menu-md-right dropdown-menu-sm-left  dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <form class="form-inline my-2 w-75v my-lg-0 dropdown-item"
                        action="{{ route('aspirations.search') }}" method="GET">
                        <div class="d-flex flex-row ">

                        <div class="d-flex flex-column">

                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                            name="search" autocomplete="off" id="search">
                            <div id="search-view"> </div>
                        </div>
<div>

    <button class="btn btn-outline-success my-2  my-sm-0" type="submit">Search</button>
</div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- end search button -->
            @endif

            <!-- login and user profile -->
            <div class="dropdown pl-2 ">

                @if(!auth()->check())
                <!-- if not login -->
                <div class="navbar-nav">
                    <a class="nav-item nav-link text-center {{ request()->segment(1) == 'login' ? 'active' : '' }}"
                        href="{{ route('login') }}">Login</a>
                    <a class="nav-item nav-link text-center {{ request()->segment(1) == 'register' ? 'active': '' }}"
                        href="{{ route('register') }}">Register</a>
                </div>
                <!-- end if nont login -->
                @else

                <!-- if user has login -->
                <div class="dropdown pl-2 ml-auto border-left">
                    <p class="dropdown-toggle m-auto" id="dropdownMenuButton" data-toggle="dropdown">
                        {{ auth()->user()->name }}
                    </p>
                    <div class="dropdown-menu dropdown-menu-md-right">
                        <a class="dropdown-item" href="{{ route('aspirations.profile') }}">
                            <i class="fas fa-user fa-fw"></i>
                            My Profile
                        </a>
                        <!--  <a class="dropdown-item"> <i class="fas fa-fw fa-lightbulb text-warning"></i> My
                             Profile</a> -->
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}">
                            <button class=" dropdown-item ">
                                <i class="fas fa-fw fa-sign-out-alt"></i>logout</button>
                        </a>

                    </div>
                </div>
                <!-- end if user has login -->
                @endif

            </div>
            <!-- end login and user -->

        </div>
        <!-- nav right -->

    </div>
    <!-- end of main nav -->
</nav>
<script>
    $(document).ready(()=>{
$('#search').on('keyup',function(){
        let keyword = $('#search').val()
    // ajax search
$.ajax({
    url:"{{url('aspirations/ajax-search?search=')}}"+keyword,
    type:'GET',
    success:function(e){
        // alert('ok')
        $('#search-view').html(e)
    }
});

})

        // 
    })
</script>