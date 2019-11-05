@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<h1>Beranda</h1>
			</div>	
		</div>
		<hr>

		<div class="row mb-2">
			<div class="col text-center">CATEGORY</div>
		</div>
		<div class="row text-center d-flex flex-row justify-content-center">
			<div class="category"><a href="{{ route('aspirations.beranda') }}" class="{{ request()->has('c') ? '' : 'active-link'}}">default</a></div>
			@foreach($categories as $category)
				<div class="category "><a href="{{ route('aspirations.beranda', ['c' => $category->id])}}" class="{{ $category->id == request('c') ? 'active-link' : '' }}">{{ $category->category }}</a></div>
			@endforeach
		</div>

		<div class="row mt-5 mb-2">
			<div class="col text-center d-flex justify-content-center">
				<div class="category"><a href="{{ route('aspirations.beranda', ['c' => request('c'), 'o' => 'popular']) }}">POPULAR</a></div>
				<div class="category"><a href="{{ route('aspirations.beranda', ['c' => request('c'), 'o' => 'new']) }}">NEWEST</a></div>
				<div class="category"><a href="{{ route('aspirations.beranda', ['c' => request('c'), 'o' => 'acc']) }}">ACCEPTED</a></div>
			</div>
		</div>

		@foreach($aspirations as $aspiration)
		<div class="content my-5">
			<div class="row">
				<div class="col text-right">
					{{ $aspiration->created_at->diffForHumans() }}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center"><h1>{{ $aspiration->title }}</h1></div>
			</div>

			<div class="row">
				<div class="col-md-8 offset-2 text-center">
					{{ substr($aspiration->aspiration, 0, random_int(256, 512)) }}
					<a href="">see more</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 text-danger"><a href="{{ route('aspirations.delete', $aspiration->id) }}" class="text-danger">DELETE</a></div>
				
				<form class="col-md-6 text-right" method="POST" action="{{ route('aspirations.upvote') }}">
					@csrf
					<input type="hidden" name="aspiration_id" value="{{ $aspiration->id }}">
					{{ $aspiration->upvotes->count()}}|| <button >upvote</button>
				</form>
			</div>
		</div>
		@endforeach


	</div>
@endsection