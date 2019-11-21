@extends('layouts.app')

@section('content')

<div class="container center mt-5 ">
    <div class="bg-dark-50 w-sm-75 m-auto p-5 border-radius align-items-center">
        <h1 class="text-center">Edit Profile</h1>
        <hr class="border-white">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form-row form-group">
                <div class="col ">
                    <label for="FirstName">Full Name: </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="FirstName" placeholder="Full name" name="name" value="{{ $user->name ?? old('name') }}">
                    @error('name')
                    <small class="text-danger font-italic">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Example@example.com" name="email" value="{{ $user->email ?? old('email') }}" readonly="true">
                    @error('email')
                    <small class="text-danger font-italic">{{ $message }}</small>
                    @enderror
            </div>
            
            <div class="form-group">
                <label>Status</label>
                <textarea name="status" class="form-control"></textarea>
            </div>


            <div class="d-flex mt-4 justify-content-start w-100 align-items-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('title','Edit Profile')
