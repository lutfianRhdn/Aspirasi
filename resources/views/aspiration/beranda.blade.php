@extends('layouts.app')

@section('content')
<div class="container  p-3 mt-5">
	@include('layouts.category')

	<!-- options -->
	 <div class=" mt-4">
        <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
             <a class="nav-item nav-link" id="nav-contact-tab"  href="{{ route('aspirations.beranda', ['o' => 'popular', 'c' => request('c')] ) }}"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Populer</a>

            <a class="nav-item nav-link" href="{{ route('aspirations.beranda', ['o' => 'new', 'c' => request('c')] ) }}"
                role="tab" aria-controls="nav-profile" aria-selected="false">Terbaru</a>
            <a class="nav-item nav-link" href="{{ route('aspirations.beranda', ['o' => 'accepted', 'c' => request('c')]) }}"
                role="tab" aria-controls="nav-contact" aria-selected="true">Tercapai</a>
        </div>
    </div>
	<!-- end of options -->

	@foreach($aspirations as $aspiration)
    <!-- card -->
    <div class="tab-content border h-100 p-4 my-5" id="nav-tabContent">
        <!-- terbaru tab -->
        <div class="tab-pane fade text-black show active" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab">


            <!-- aspiration card -->
            <div class="card card-hover">
                <div class="card-header d-flex justify-content-between">
                    <div class="d-flex align-self-center">
                        <img class="img-circle img-small" src="{{ asset('assets/img/pendidikan.png') }}" alt="">
                        <h5 class=" mt-auto mb-auto ml-2 text-info"> {{ $aspiration->aspirationCategory->category }}</h5>
                    </div>

                    <div>
                        {{ $aspiration->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="card-body" id="">
                    <h5 class="card-title">{{ $aspiration->title }}</h5>
                    <!-- text aspiration -->
                    <span class="more card-text">
                        {{ substr($aspiration->aspiration, 256,512)  }}<a href=""> read more...</a>
                    </span>
                    <!-- end text Aspiration -->
                    <div class="divider"></div>
                    <div class="d-flex">

                        <!-- upvote -->
                        <div class="d-flex flex-column align-items-center">

                            <i class="far  fa-thumbs-up text-danger" id="like"></i>
                            <p class=" text-small text-black">{{ $aspiration->upvotes_count }} upvotes</p>
                        </div>
                        <!-- end of upvots -->

                        <!-- comment -->
                        <!-- <div class="d-flex flex-column ml-2 align-items-center">

                            <a href="">
                                <i class="far fa-comment text-primary"></i>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- terPopuler tab -->
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            ...
        </div>
        <!-- terWujud tab -->
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            ...
        </div>
    </div>
    @endforeach
</div>
@endsection