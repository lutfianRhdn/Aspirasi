@extends('layouts.app')

@section('content')
	<main>

        <!-- aspiration content -->
        <div class="container  p-3 my-5">
            
            <!-- users -->
            <div class="row mb-5">
                <div class="col-md-6 offset-3 text-center">
                    All request for {{ request('search') }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-3">PEOPLE </div>      
            </div>

            @foreach($users as $user) 
            <div class="row mt-2">
                <div class="col-md-6 offset-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                        <img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" class="img mr-2 rounded-circle img-small shadow-md">
                            <a href=""> {{ $user->name }} </a>
                        </div>
                    </div>  
                </div>
            </div>
            @endforeach

            @foreach($aspirations as $aspiration)
            <div class="card card-hover my-5">
                <div class="card-header ">
                    <div class="d-flex align-self-center">
                        <img class="img-circle img-small img" src="{{ asset('assets/img/category/'.$aspiration->aspirationCategory->image )}}" alt="">
                        <h5 class=" mt-auto mb-auto ml-2 text-info"> {{ $aspiration->aspirationCategory->category }}</h5>
                    </div>
                </div>

                <div class="card-body" id="">
                    <h5 class="card-title">{{ $aspiration->title }}</h5>
                    <!-- text aspiration -->
                    <span class="card-text">
                        {{ substr($aspiration->aspiration, 256,512) }}
                        <a href="{{ route('aspirations.show', $aspiration->id) }}"> read more...</a>
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
@section('title','Cari Aspirasi')
