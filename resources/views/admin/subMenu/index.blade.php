@extends('layouts.app')

@section('content')
<main class="">
    <!-- aspiration content -->
    <div class="container  p-3 my-5">
        <h4 class="text-secondary text-center"> Sub Menus </h4>
        <div class="row">
        	<div class="col-md-6">
        		<form action="{{route('sub-menus.index')}}" method="GET">
        			
        			<div class="form-group">
	        			<input type="text" name="s" class="form-controll">
	        			<button>Cari</button>
	        		</div>
        		</form>
        	</div>

            <div class="col-md-6 text-right">
                 <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Sub Menu
                </button>


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
                        <a href="{{ route('sub-menus.edit', $subMenu->id) }}" class="badge badge-success">edit</a>
                    </td>
        		</tr>
        	</tbody>
        	@php $no++ @endphp
        	@endforeach
        </table>

        {{ $subMenus->links() }}
    </div>



<!-- ADD -->
<div class="modal text-left" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Menu</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
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
                    placeholder="Enter Sub Menu" name="sub_menu" id="sub_menu"></input>
            </div>

            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" name="url" id="url" class="form-control">
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


@endsection
@section('title','Sub Menu Management')
