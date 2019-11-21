@extends('layouts.app')

@section('content')
<main>
    <!-- aspiration content -->
    <div class="container  p-3 my-5">
        <h4 class="text-secondary text-center"> Menus </h4>
        <div class="row">
        	<div class="col-md-6">
        		<form action="{{ route('menus.index') }}" method="GET">
        			<div class="form-group">
	        			<input type="text" name="s" class="form-controll">
	        			<button type="submit">Cari</button>
	        		</div>
        		</form>
        	</div>

            <div class="col-md-6 text-right">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Menu
                </button>

                <!-- The Modal -->
                <div class="modal text-left" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
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

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                    </div>
                  </div>
                </div>

        </div>      
        </div>

        <table class="table table-hover">
        	<thead>
        		<tr>
	        		<th>No</th>
	        		<th>Menu</th>
                    <th>Jumlah Sub Menu</th>
	        		<th>Action</th>
        		</tr>
        	</thead>
        	@php $no = 1; @endphp
        	@foreach($menus as $menu)
        	<tbody>
        		<tr>	
	        		<td>{{ $no }}</td>
	        		<td>{{ $menu->menu }}</td>
                    <td>{{ $menu->subMenus->count() }}</td>
	        		<td>
                        <form method="POST" action="{{ route('menus.destroy', $menu->id) }}" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="badge badge-danger">Delete</button>
                        </form>         
                        ||
                        <a href="{{ route('menus.edit', $menu->id) }}"><button class="badge badge-success">Edit</button></a>
                    </td>
        		</tr>
        	</tbody>
        	@php $no++ @endphp
        	@endforeach
        </table>

    </div>

@endsection
@section('title','Menu')
