@extends('layouts.app')

@section('content')
    <div class="container-fluid center my-5">
        <div class="bg-dark-50 shadow-sm w-sm-75 m-auto p-5 border-radius  align-items-center">
            
            <h1 class="text-center">LOGIN</h1>
            <hr class="border-white">

            <form class="mb-2" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <small class="font-italic text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password"  required>
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary ">LOGIN</button>
                <a href="{{ route('register')}}" class="text-black-50 ml-2 font-italic"> I Don't Have Account </a>
            </form>
        </div>
    </div>

@endsection
