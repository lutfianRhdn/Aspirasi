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
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/all.css') }}">

    <style type="text/css">
        .container{
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="d-flex wrapper toggled">

        <!-- sidebar -->
        @if(auth()->check() AND auth()->user()->role_id == 1 AND request()->segment(1) == 'admin' )
            @include('layouts.sidebar')
        @endif
        <!-- end sidebar -->

        <!-- container -->
        <div class="page-content-wrapper bg-white">
            
            <!-- navbar -->
            @include('layouts.nav')
            <!-- end nav -->
            
            <!-- main -->
                
            @yield('content')
            <!-- end main -->
            
            <!-- footer -->
            <footer class=" footer w-100 text-white-50 bg-dark bottom-10 mt-5">
                <div class="d-flex p-5 justify-content-between">

                    <div class="ml-md-5">
                        <h4>Hubungi kami</h4>
                        <hr class="w-100 border-white-50">
                        <div class=" d-flex flex-column ">
                            <div class="d-flex align-items-center">
                                <i class="fab fa-instagram fa-1x mr-2"></i>
                                <a href="" class="text-white-50">instagram</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fab fa-whatsapp fa-1x mr-2"></i>
                                <a href="" class="text-white-50">whatsapp</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope fa-1x mr-2"></i>
                                <a href="" class="text-white-50">Email</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fab fa-line fa-1x mr-2"></i>
                                <a href="" class="text-white-50">line</a>
                            </div>
                        </div>
                    </div>
                    <div class="mr-md-5">

                        <h4>Tentang kami</h4>
                        <hr class="w-100 border-white-50">
                        <div class=" d-flex flex-column ml-3">
                            <a href="" class="text-white-50">instagram</a>
                            <a href="" class="text-white-50">whatsapp</a>
                        </div>
                    </div>
                </div>
                <p class="text-center  mt-4 mb-0"> &copy;Sans Skuy CopyRight 2019</p>

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
