@extends('layouts.app')

@section('content')
<main>
    <!-- aspiration content -->
    <div class="container  p-3 my-5">
        <h4 class="text-secondary text-center"> Menus </h4>
        <div class="row">
        	<div class="col">
        		<form action="" method="GET">
        			@csrf
        			<div class="form-group">
	        			<input type="text" name="s" class="form-controll">
	        			<button>Cari</button>
	        		</div>
        		</form>
        	</div>
        </div>

        <table class="table table-hover">
        	<thead>
        		<tr>
	        		<th>No</th>
	        		<th>Menu</th>
	        		<th>Action</th>
        		</tr>
        	</thead>
        	@php $no = 1; @endphp
        	@foreach($menus as $menu)
        	<tbody>
        		<tr>	
	        		<td>{{ $no }}</td>
	        		<td>{{ $menu->menu }}</td>
	        		<td>
                        <form method="POST" action="{{ route('menus.destroy', $menu->id) }}">
                            @method('DELETE')
                            @csrf
                            <button class="badge badge-danger">Delete</button>
                        </form>         
                        ||
                        <a href=""><button class="badge badge-success">Edit</button></a>
                    </td>
        		</tr>
        	</tbody>
        	@php $no++ @endphp
        	@endforeach
        </table>

    </div>

@endsection