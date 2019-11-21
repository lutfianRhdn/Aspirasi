@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center " >
    <div class=" mt-5 flex-column ">

        <img src="{{ asset('assets/img/logo.png') }}" class="img mx-auto d-block img-logo">
        <h1 class="text-center font-montsrrat  mt-4"> Aspiration </h1>
        <hr>
        <small> Created By : </small>
        <div class="row  w-100">
            <div class="card mt-2 col-md-4">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <h4 class="card-title mx-auto mt-4 font-sm">
                    Lutfian Rahdiansyah
                </h4>
                <hr>
                <div class="card-body">
                    <p class="card-text font-sm font-montsrrat  size-text text-nowrap text-center">( Berperan Sebagai Pembuat Front End ).</p>
                </div>
            </div>
            
            <div class="card mt-2 col-md-4">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <h4 class="card-title mx-auto mt-4 font-sm">
                    Zahra Zhafira Sudrajat
                </h4>
                <hr>
                <div class="card-body">
                    <p class="card-text font-sm font-montsrrat  size-text text-nowrap text-center">( Berperan  Pembuatan Proposal ).</p>
                </div>
            </div>
            
            <div class="card mt-2 col-md-4">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <h5 class="card-title mx-auto mt-4 font-sm">
                    Muhammad Genta Ath-Tharriq
                </h5>
                <hr>
                <div class="card-body">
                    <p class="card-text font-sm font-montsrrat  size-text text-nowrap text-center ">( Berperan Sebagai Pembuat Back End ).</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('title','Profile')
