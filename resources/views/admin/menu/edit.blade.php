@extends('layouts.app')

@section('content')

<div class="container center mt-5 ">
    <div class="bg-dark-50 w-sm-75 m-auto p-5 border-radius align-items-center">
        <h1 class="text-center">Edit</h1>
        <hr class="border-white">
        <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            
            <input type="hidden" name="id" value="{{ $menu->id }}">
            <div class="form-row form-group">
                <div class="col ">
                    <label for="FirstName">Menu: </label>
                    <input type="text" class="form-control @error('menu') is-invalid @enderror" id="Firstmenu" placeholder="menu" name="menu" value="{{ $menu->menu ?? old('menu') }}">
                    @error('menu')
                    <small class="text-danger font-italic">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="d-flex mt-4 justify-content-start w-100 align-items-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('title','Edit Menu')
