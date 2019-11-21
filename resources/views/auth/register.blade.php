@extends('layouts.app')

@section('content')

<div class="bg-gradient p-5">

<div class="container center  ">
    <div class="bg-white-50 w-sm-75 m-auto p-5 border-radius align-items-center">
        <h1 class="text-center">Register</h1>
        <hr class="border-white">
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row form-group">
                <div class="col ">
                    <label for="FirstName">Full Name: </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="FirstName"
                        placeholder="Full name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <small class="text-danger font-italic">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Example@example.com" name="email"
                    value="{{ old('email') }}">
                @error('email')
                <small class="text-danger font-italic">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="custoFile">Image : </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="profile_image" accept="image/*" value="{{old('profile_image')}}"
                        id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                @error('profile_image')
                <small class="text-danger font-italic">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-row">
                <div class="col">

                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password" class="@error('password') is-invalid @enderror">
                    @error('password')
                    <small class="text-danger font-italic">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col">

                    <label for="exampleInputPassword1">Password Confirm</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password_confirmation">
                </div>
            </div>



            <div class="d-flex mt-4 justify-content-start w-100 align-items-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
            <a href="{{ route('login') }}" class="ml-3 text-white-50 font-italic">i've account</a>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
@section('title','Register')
