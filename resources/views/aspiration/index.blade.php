@extends('layouts.app')

@section('content')
	<main>

        <!-- header -->
        <div class="bg-quots-animate h-75v  w-100 d-flex flex-column  text-center ">
            <h1 class=" m-auto text-capitalize  quots"> 
                Indonesia Akan Maju Jika Rakyat Dan Pemerintah Bersatu
            </h1>

        </div>
        <!-- end of header -->


        <!-- aspiration content -->
        <div class="container  p-3 my-5">
            <h4 class="text-secondary text-center"> Popular Aspirations </h4>
<hr>
            <!-- tombol buat dan lihat aspirasi -->
            <div class="row text-center d-flex justify-content-around mt-5 mb-2">
                    <a href="{{ route('aspirations.create') }} " class="badge text-white py-2 px-5 bg-quots">Buat Aspirasimu</a>
                    <a href="{{ route('aspirations.beranda') }}" class="badge text-white py-2 px-5 bg-quots">Lihat Aspirasi</a>
            </div>
            <!-- end of tombol -->

            <!-- aspirations -->
            @foreach($popularAspirations as $aspiration)
                @include('aspiration.aspiration_card.card', compact('aspiration'))    
            @endforeach
            <!-- end of aspirations -->
            
        </div>
        <!-- end aspiration content -->

    </main>
@endsection
@section('title','Aspiration')
