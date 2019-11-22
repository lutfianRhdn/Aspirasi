@extends('layouts.app')

@section('content')

{{-- {{ dd($category)}} --}}
<div class="container center mt-5 ">
    <div class="bg-dark-50 w-sm-75 m-auto p-5 border-radius align-items-center">
        <h1 class="text-center">Edit</h1>
        <hr class="border-white">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="form-row form-group">
                <div class="col ">
                    <label for="FirstName">category: </label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" id="Firstcategory"
                        placeholder="category" name="category" value="{{ $category->category ?? old('category') }}">
                    @error('category')
                    <small class="text-danger font-italic">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="icon">Icon</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" accept="image/*"
                        value="{{ $category->image ?? old('profile_image')}}" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                @error('icon')
                <small class="text-danger font-italic">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="email">Category email</label>
                <input type="email" name="email_address" class="form-control"
                    value="{{ $category->email_address ?? old('icon') }}">
                @error('email')
                <small class="text-danger font-italic">{{ $message }}</small>
                @enderror
            </div>


            <div class="d-flex mt-4 justify-content-start w-100 align-items-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('title','Edit category')
