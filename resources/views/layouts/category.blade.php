<!-- categories -->
<div class="card">
    <div class="card-body d-flex p-2 ml-md-2 justify-content-around">
        <a href="{{ route('aspirations.beranda', [ 'o' => request('o')] ) }}" class="category d-flex m-2 flex-column">
            <img class="img-circle m-auto img-small" src="{{ asset('assets/img/pendidikan.') }}png" alt="" title="my">
        </a>
        @foreach($categories as $category)
        <a href="{{ route('aspirations.beranda', ['c' => $category->id, 'o' => request('o')] ) }}" class="category d-flex m-2 flex-column">
            <img class="img-circle m-auto img-small w-sm-25" src="{{ asset('assets/img/category/' . $category->image) }}" alt="" title="{{ $category->category}}">
        </a>
        @endforeach

    </div>
</div>
<!-- end categories -->
