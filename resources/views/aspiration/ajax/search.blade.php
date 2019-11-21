<ul class="list-group  mr-sm-2">
    @foreach ($searchs as $search)
<a href="{{ route('aspirations.show',$search->id) }}">

        <li class="list-group-item m-auto">{{ $search->title }}</li>
    </a>
    @endforeach
</ul>
