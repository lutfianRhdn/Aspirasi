<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

</head>
<body>
    <div class="d-flex wrapper toggled">

        @if(auth()->check())
        <!-- sidebar -->
        <div class="sidebar-wrapper bg-light">
            <div class="sidebar-heading">Menu

            </div>
            <div class="dropdown-divider border-dark"></div>
            <div class="list-group list-group-flush sidebar-menu mt-4">

                <!-- sidebar item -->
                <a href="userAdmin.html" class="sidebar-item ">
                    <i class="fas fa-users mr-2"></i>
                    Users</a>
                <a href="#" class="sidebar-item active ">
                    <i class="fas fa-users mr-2"></i>
                    Aspirations</a>
                <a href="category.html" class="sidebar-item ">
                    <i class="fas fa-users mr-2"></i>
                    Categories</a>
             <!-- end sidebar item -->

            </div>

        </div>
        <!-- end sidebar -->
        @endif

        <!-- container -->
        <div class="page-content-wrapper">
            
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-md-flex align-items-center justify-content-between"
                    id="navbarNavAltMarkup">
                    <!-- nav left -->
                    <div class="navbar-nav">

                        <a class="nav-item nav-link text-center active" href="#">Beranda</a>
                        <a class="nav-item nav-link text-center" href="aspiration.html">Aspiration</a>
                    </div>
                    <!-- end nav left -->
                    <!-- nav right -->
                    <div class="d-flex align-items-center">
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
                            <a class=" btn btn-gradient m-auto border-0" href="makeAspiration.html">
                                Make Aspirations
                            </a>

                        </div>

                    </div>
                    <!-- nav right -->
                </div>

            </nav>
            <!-- end nav -->
            
            <!-- main -->
            <div class="container  p-3 mt-5">
               @yield('content')
            </div>
            <!-- end main -->
            
            <!-- footer -->
            <footer class="">

            </footer>
            <!-- end footer -->

        </div>
        <!-- end content -->
    </div>

    <!-- /#wrapper -->

    <!-- Modal delete -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    mau di hapus?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal delete -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/js/all.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $(".wrapper").toggleClass("toggled");
            $(".burger").toggleClass("hideSidebar");
        });
        $("#like").click(e => {
            $("#like").addClass("far")
            $("#like").removeClass("fas")
        })
    </script>
</body>
</html>
