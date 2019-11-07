@extends('layouts.app')

@section('content')
<main>
	<div class="contaner my-5 mx-5">
	    <div class="col-md-7 m-auto">

	        <form action="{{ route('aspirations.store') }}" method="POST">
	        	@csrf

	        	<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
	            <div class="form-group">
	                <label for="Title">Title </label>
	                <input type="text" class="form-control" id="Title" aria-describedby="emailHelp"
	                    placeholder="Enter Title" name="title">
	            </div>

	            <div class="form-group">
	                <label for="aspiration">Aspiration </label>
	                <textarea type="email" class="form-control" id="aspiration" aria-describedby="emailHelp"
	                    placeholder="Enter Aspiration" name="aspiration"></textarea>
	            </div>
	            <div class="form-group">
	                <label for="category"> Categories</label>
	                <select class="custom-select" id="category" required name="aspiration_category_id">
	                    @foreach($categories as $category)
	                    <option value="{{ $category->id }}">{{ $category->category }}</option>
	                    @endforeach
	                </select>
	            </div>

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
	            <div class="custom-control custom-checkbox mt-3">
	                <input type="checkbox" class="custom-control-input" id="customCheck1">
	                <label class="custom-control-label" for="customCheck1">Accept Police and bla bla bla</label>
	            </div>
	            <button type="submit" class="btn mt-3 btn-primary" name="submit">Submit</button>

	        </form>
	    </div>
	</div>

</main>




@endsection