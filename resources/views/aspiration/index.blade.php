@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<h1>Aspirations</h1>
			</div>	
		</div>
		<div class="row">
			<div class="col text-center">
				" MAKE INDONESIA BETTER AGAIN "
			</div>
		</div>
		<hr>

		@foreach($popularAspirations as $aspiration)
		<div class="content my-5">
			<div class="row">
				<div class="col-md-6 offset-6 text-right">
					{{ $aspiration->created_at->diffForHumans() }}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center"><h3>{{ $aspiration->title }}</h3></div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					{{ substr($aspiration->aspiration, 0, random_int(256, 512)) }}
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