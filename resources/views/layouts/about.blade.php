@extends('layouts.app')

@section('content')
<div class="container row justify-content-center mx-auto flex-row mt-5">
    <div class="align-items-start col-md-4 align-items-end ">
        <img src="{{ asset('assets/img/logo.png') }}" class="img mx-auto d-inline img-logo">
    </div>
    <div class="d-flex flex-column col-md-6 align-items-start">

        <h1 class=" font-montsrrat  mt-4"> Aspiration </h1>
        {{-- <hr class="border"> --}}
        <p class="text-justify font-sm border-top border-dark pt-2 text-capitalize indent-paragraph"> Disusun Oleh Sans Skuy
            Team, Kami membuat website ini dengan bertujuan masyarakat indonesia bisa ikut berpartisipasi dalam
            pembangunan indonesia lebih maju kedepannyaa nanti, karena indonesia akan maju jika masyarakat indonesia dan
            pemerintah nya bersatu </p>
   
        <br>
    </div>

    <blockquote class="blockquote text-center border px-5  shadow">
            <img src="{{asset('assets/img/soekarno.jfif')}}" class="img my-4 img-small rounded-circle" alt="">
            <p class="mb-0 text-capitalize font-sm">“Negeri ini, Republik Indonesia, bukanlah milik suatu golongan, bukan milik suatu agama, bukan milik suatu kelompok etnis, bukan juga milik suatu adat-istiadat tertentu, tapi milik kita semua dari Sabang sampai Merauke!”</p>
            <footer class="blockquote-footer">By <cite title="Source Title">Soekarno</cite></footer>
        </blockquote>
</div>
@endsection
@section('title','Profile')
