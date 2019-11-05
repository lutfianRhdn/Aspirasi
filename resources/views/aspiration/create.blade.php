@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<h1>Aspirations Create</h1>
			</div>	
		</div>

		<form method="POST" action="{{ route('aspirations.store') }}">
			@csrf
			<div class="form-group row">
				<lable class="form-controll col-md-3">Title</lable>
				<input class="form-controll col-md-6 col-offset-3" name="title"></input>
				
				<!-- validatoin -->
				@if($errors->has('title'))
					<div class="text-danger">{{ $errors->first('title') }}</div>
				@endif
			</div>


			<div class="form-group row">
				<lable class="form-controll col-md-3">Aspiration</lable>
				<textarea class="form-controll col-md-6 col-offset-3" name="aspiration"></textarea>
			</div>

			<div class="form-group row">
				<lable class="form-controll col-md-3">Category</lable>
				<select class="form-controll col-md-6 col-offset-3" name="aspiration_category_id">
					@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->category }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group row">
				<div class="col-md-12 text-end">
					<button class="btn btn-primary" type="submit">Save</button>
				</div>				
			</div>	
		</form>
	</div>




@endsection