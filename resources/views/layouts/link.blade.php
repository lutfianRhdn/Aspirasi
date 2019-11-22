    
<form class="d-inline" method="POST" action="{{ route($link.'.destroy', $data->id) }}">
    @csrf
    @method('DELETE')
    <button class="badge badge-danger">Delete</button>
</form>
||
<a href="{{ route($link.'.edit', $data->id) }}">
    <button class="badge badge-alert">Edit</button>
</a>

