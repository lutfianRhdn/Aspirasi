@extends('layouts.app')

@section('content')

<div class="container center mt-5 ">
    <div class="bg-dark-50 w-sm-75 m-auto p-5 border-radius align-items-center">
        <h1 class="text-center">Edit</h1>
        <hr class="border-white">
        <form action="{{ route('sub-menus.update', $subMenu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            
            <input type="hidden" name="id" value="{{ $subMenu->id }}">

            <div class="form-group">
                <label for="category">Menu </label>
                <select class="custom-select" id="category" required name="menu_id">
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" {{ old('menu_id') ?? $menu->id == $subMenu->menu->id ? 'selected' : ''}} >{{ $menu->menu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-row form-group">
                <div class="col ">
                    <label for="FirstName">subMenu: </label>
                    <input type="text" class="form-control @error('subMenu') is-invalid @enderror" id="FirstsubMenu" placeholder="subMenu" name="sub_menu" value="{{ $subMenu->sub_menu ?? old('subMenu') }}">
                    @error('subMenu')
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
@section('title','edit Sub Menu')
