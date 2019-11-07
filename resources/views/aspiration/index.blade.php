@extends('layouts.app')

@section('content')
	<main>
        <div class="bg-quots h-75v  w-100 d-flex flex-column  text-center ">
            <h1 class=" m-auto text-capitalize  quots"> 
                BERIKAN ASPIRASI TERBAIKMU UNTUK INDONESIA YANG LEBIH BAIK
            </h1>

        </div>
        <!-- aspiration content -->
        <div class="container  p-3 my-5">
            <h4 class="text-secondary text-center"> Popular Aspirations </h4>

            @foreach($popularAspirations as $aspiration)
            <div class="card card-hover my-5">
                <div class="card-header ">
                    <div class="d-flex align-self-center">
                        <img class="img-circle img-small" src="img/pendidikan.png" alt="">
                        <h5 class=" mt-auto mb-auto ml-2 text-info"> {{ $aspiration->aspirationCategory->category }}</h5>
                    </div>
                </div>

                <div class="card-body" id="">
                    <h5 class="card-title">{{ $aspiration->title }}</h5>
                    <!-- text aspiration -->
                    <span class="more card-text">
                        {{ substr($aspiration->aspiration, 256,512) }}
                    </span>
                    <!-- end text Aspiration -->
                    <div class="divider"></div>
                    <div class="d-flex">

                        <!-- like -->
                        <div class="d-flex flex-column align-items-center">

                            <i class="far  fa-thumbs-up text-danger" id="like"></i>
                            <p class=" text-small text-black">{{ $aspiration->upvotes->count() }} upvotes</p>
                        </div>

                        <!-- comment -->
                        <div class="d-flex flex-column ml-2 align-items-center">

                            <a href="">
                                <i class="far fa-comment text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
            @endforeach
        </div>
        <!-- end aspiration content -->

    </main>
@endsection