@extends('layouts.app')

@section('content')
<main class="">
    <!-- aspiration content -->
    <div class="container  p-3 my-5">
        <h4 class="text-secondary text-center"> Sub Menus </h4>
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
                    <th>Sub Menu</th>
                    <th>Url</th>
	        		<th>Action</th>
        		</tr>
        	</thead>
        	@php $no = 1; @endphp
        	@foreach($subMenus as $subMenu)
        	<tbody>
        		<tr>	
	        		<td>{{ $no }}</td>
                    <td>{{ $subMenu->menu->menu }}</td>
	        		<td>{{ $subMenu->sub_menu }}</td>
	        		<td>{{ $subMenu->url }}</td>
                    <td>
                        <form method="POST" action="{{ route('sub-menus.destroy', $subMenu->id) }}" class="d-inline">
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