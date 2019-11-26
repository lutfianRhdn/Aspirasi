@extends('layouts.app')

@section('content')
<main>


    <!-- header -->
    <div class="bg-quots-animate h-75v  w-100 d-flex flex-column  text-center ">
        <h1 class=" m-auto text-capitalize  quots">
            Berikan Aspirasi Terbaik Untuk Indonesia Yang Maju
        </h1>

    </div>
    <!-- end of header -->

    <div class="container my-5">
        <div class="col-md-7 m-auto">

            <form action="{{ route('aspirations.store') }}" method="POST">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="form-group">
                    <label for="title">Title </label>
                    <input type="text" class="form-control" id="Title" aria-describedby="emailHelp"
                        placeholder="Enter Title" name="title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                    <div class="text-danger">{{ $errors->first() }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="aspiration">Aspiration </label>
                    <textarea class="form-control" aria-describedby="emailHelp" placeholder="Enter Aspiration"
                        name="aspiration" value="{{ old('aspiration') }}"></textarea>
                    @if($errors->has('aspiration'))
                    <div class="text-danger">{{ $errors->first() }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category"> Categories</label>
                    <select class="custom-select" id="category" required name="aspiration_category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('aspiration_category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('aspiration_category_id'))
                    <div class="text-danger">{{ $errors->first() }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="d-block" for="inlineFormCustomSelect">Visible</label>
                    <div class="btn-group btn-group-toggle " data-toggle="buttons">
                        <label class="btn btn-info">
                            <input type="radio" name="is_anonim" id="option1" autocomplete="off" checked value="0">
                            Public
                        </label>
                        <label class="btn btn-info">
                            <input type="radio" name="is_anonim" id="option2" autocomplete="off" value="1"> Private
                        </label>
                    </div>
                    @if($errors->has('is_anonim'))
                    <div class="text-danger">{{ $errors->first() }}</div>
                    @endif
                </div>

                <button type="submit" class="btn mt-3 btn-primary" name="submit">Submit</button>

            </form>
        </div>
    </div>

</main>




@endsection
@section('title','Buat Aspirasi')
