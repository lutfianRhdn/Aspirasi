<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title> @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    {{-- <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script> --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/750f19868d.js" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    {{-- icon --}}
<link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
</head>
<body>
    <div class="d-flex wrapper toggled">

        <!-- sidebar -->
        @if(auth()->check() AND request()->segment(1) == 'admin' )
            @include('layouts.sidebar')
        @endif
        <!-- end sidebar -->

        <!-- container -->
        <div class="page-content-wrapper bg-white">
            
            <!-- navbar -->
            @include('layouts.nav')
            <!-- end nav -->
            
            <!-- if has confirm-->
            @if (session('status'))
            <div class="row mt-5">
                <div class="col-md-12 mt-5">
                    <div class="alert alert-success mt-5" role="alert">
                        {{ session('status') }}
                    </div>                    
                </div>
            </div>
            @endif
            <!--  -->

            <!-- main -->  
            @yield('content')
            <!-- end main -->
            
            <!-- footer -->
            @include('layouts.footer')
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
    <!-- <script src="{{ asset('assets/js/all.js') }}"></script> -->
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
        $(document).ready(()=>{
            // let aspiration = $('#aspiration').attr('data-aspiration')
            // console.log(aspiration)

            $('#aspiration').load("{{ Route('aspiration.ajax') }}")

        });

        $('.page-link').on('click', function(){
   
        });

        const page = e =>{
            // $('.page-link').preventDefault();
            // alert('ok')
            $(this).load("{{url('/aspirations/beranda')}}?page="+e)
        }
    </script>
    <!-- end of menu toggle script -->
    
</body>
</html>
