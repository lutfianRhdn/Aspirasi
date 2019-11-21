@extends('layouts.app')

@section('content')
<main class="container">

    <!-- profile user -->
    <div class="row mt-5">
        <div class="col-md-12">
            
    <div class="border p-3 m-auto  w-50">
        <div class="d-flex justify-content-center   ">
            <img class=" img-circle " height="100px" src="{{ asset('storage/profile_images/' . $user->profile_image) }}" 
                title="profile {{ $user->name }}"  class="pt-5">
            <div class=" ml-3 mt-2 flex-grow-1">
                <h4 class="text-capitalize"> {{ $user->name }}</h5>

                    <p  class="more"> {{ $user->status }}</p>
                <hr class="w-100">
                    <p>gmail : {{ $user->email}}</p>
                    <div class="d-flex justify-content-lg-between">
                        <i class="text-small text-dark-50">{{ $user->created_at}}</i>
                        @if(auth()->check() AND $user->id == auth()->user()->id)
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">Edit Profile</a>
                        @endif
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- end of profile user -->

    <div class="row text-center my-5">
        <div class="col-md-12">
            <h1>My Aspirations</h1>
        </div>
    </div>



    <!-- card -->
    <div class="tab-pane fade text-black show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        @foreach($aspirations as $aspiration)
        @include('aspiration.aspiration_card.card', compact('aspiration'))
        @endforeach


    </div>
    <!-- end card -->
</main>

@endsection
@section('title','Profile')

