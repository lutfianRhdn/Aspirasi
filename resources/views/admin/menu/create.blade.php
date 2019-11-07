@extends('layouts.app')

@section('content')
<main class=" height-100vh ">
	<div class="container my-5 mx-5">
	    <div class="col-md-7 m-auto">

	        <form action="{{ route('menus.store') }}" method="POST">
	        	@csrf
	            <div class="form-group">
	                <label for="Menu">Menu </label>
	                <input type="text" class="form-control" id="Menu" aria-describedby="emailHelp"
	                    placeholder="Enter Menu" name="menu">
	            </div>

	            <div class="form-group">
	                <label for="icon">Icon </label>
	                <input type="text" class="form-control" id="icon" aria-describedby="emailHelp"
	                    placeholder="Enter icon" name="icon"></input>
	            </div>

	            <button type="submit" class="btn mt-3 btn-primary" name="submit">Submit</button>

	        </form>
	    </div>
	</div>

</main>




@endsection