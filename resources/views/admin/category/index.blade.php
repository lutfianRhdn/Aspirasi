@extends('layouts.app')

@section('content')
<main>
    <!-- aspiration content -->
    <div class="container  p-3 my-5">
        <h4 class="text-secondary text-center"> Categories </h4>
        <div class="row">
        	<div class="col-md-6">
        		<form action="{{ route('categories.index') }}" method="GET">
        			<div class="form-group">
	        			<input type="text" name="s" class="form-controll">
	        			<button type="submit">Cari</button>
	        		</div>
        		</form>
        	</div>

            <div class="col-md-6 text-right">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Add Category
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

                      <!-- Modapl body -->
                      <div class="modal-body">
                          <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category">Category Name </label>
                                    <input type="text" class="form-control" id="category" aria-describedby="emailHelp"
                                        placeholder="Enter category" name="category">
                                </div>

                                <div class="form-group">
                                    <label for="icon">Icon </label>
                                    <input type="text" class="form-control" id="icon" aria-describedby="emailHelp"
                                        placeholder="Enter icon" name="image"></input>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp"
                                        placeholder="Enter email" name="email_address"></input>
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
	        		<th>icon</th>
                    <th>Category Name</th>
                    <th>Category Email</th>
	        		<th>Action</th>
        		</tr>
        	</thead>
        	@php $no = 1; @endphp
        	@foreach($categories as $category)
            {{-- {{dd($category)}} --}}
            <tbody>
        		<tr>	
	        		<td>{{ $no }}</td>
                    <td>{{ $category->image }}</td>
	        		<td>{{ $category->category }}</td>
	        		<td>{{ $category->email_address }}</td>
	        		<td>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="badge badge-danger">Delete</button>
                        </form>         
                        ||
                        <a href="{{ route('categories.edit', $category->id) }}"><button class="badge badge-success">Edit</button></a>
                    </td>
        		</tr>
        	</tbody>
        	@php $no++ @endphp
        	@endforeach
        </table>

    </div>

@endsection
@section('title','Categories')
