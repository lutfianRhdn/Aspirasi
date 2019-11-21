@extends('layouts.app')

@section('content')
<main class=" h-100 ">
	<div class="container my-5 mx-5">
	    <div class="col-md-7 m-auto">

	        <form action="{{ route('sub-menus.store') }}" method="POST">
	        	@csrf
	            <div class="form-group">
	                <label for="Menu">Menu </label>
	                <select name="menu_id" class="form-control">
	                	@foreach($menus as $menu)
	                	<option value="{{ $menu->id }}" class="form-controll">{{ $menu->menu }}</option>
	                	@endforeach
	                </select>
	            </div>

	            <div class="form-group">
	                <label for="Sub Menu">Sub Menu </label>
	                <input type="text" class="form-control" id="Sub Menu"
	                    placeholder="Enter Sub Menu" name="sub_menu"></input>
	            </div>

	            <div class="form-group">
	                <label for="url">Url</label>
	                <input type="text" name="url" class="form-control">
	            </div>


	            <button type="submit" class="btn mt-3 btn-primary" name="submit">Submit</button>

	        </form>
	    </div>
	</div>

</main>




@endsection
@section('title','Tambah Sub Menu')
