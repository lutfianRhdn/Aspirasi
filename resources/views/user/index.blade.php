@extends('layouts.app')

@section('content')
<main>
    <!-- aspiration content -->
    <div class="container  p-3 my-5">
        <h4 class="text-secondary text-center"> Users Management </h4>
        <div class="row">
        	<div class="col">
			<form action="{{ Route('admin-users') }}" method="GET">
        			{{-- @csrf --}}
        			<div class="form-group">
	        			<input type="text" name="s" class="form-controll">
	        			<button type="submit">Cari</button>
	        		</div>
        		</form>
        	</div>
        </div>
        <table class="table table-hover">
        	<thead>
        		<tr>
	        		<th>No</th>
	        		<th>Name</th>
                    <th>Role</th>
	        		<th>Email</th>
                    <th>Action</th>
        		</tr>
        	</thead>
        	@php $no = 1; @endphp
        	@foreach($users as $user)
        	<tbody>
        		<tr>	
	        		<td>{{ $no }}</td>
	        		<td><a href="{{ route('users.show', $user->id)}}">{{ $user->name }}</a></td>
                    <td>{{ $user->is_admin == 1 ? 'Admin' : 'User' }}</td>
	        		<td>{{ $user->email }}</td>
                    <td>
                        <form class="d-inline" method="POST" action="{{ route('users.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="badge badge-danger">Delete</button>
                        </form>
                        ||
                        <a href="{{ route('users.edit', $user->id) }}">
                            <button class="badge badge-alert">Edit</button>
                        </a>
                    </td>
        		</tr>
        	</tbody>
        	@php $no++ @endphp
        	@endforeach
        </table>

        {{ $users->links() }}

    </div>

@endsection
@section('title','User Management')
