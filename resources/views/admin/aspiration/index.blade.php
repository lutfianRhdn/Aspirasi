@extends('layouts.app')

@section('content')
<div class="container  p-3 mt-5">

    <!-- categories -->
	@include('layouts.category')
    <!-- end of categories -->

	<!-- options -->
	 <div class=" mt-4">
        <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
             <a class="nav-item nav-link" id="nav-contact-tab"  href="{{ route('aspiration-admin.index', ['o' => 'popular', 'c' => request('c')] ) }}"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Populer</a>

            <a class="nav-item nav-link" href="{{ route('aspiration-admin.index', ['o' => 'new', 'c' => request('c')] ) }}"
                role="tab" aria-controls="nav-profile" aria-selected="false">Terbaru</a>

            <a class="nav-item nav-link" href="{{ route('aspiration-admin.index', ['o' => 'accepted', 'c' => request('c')]) }}"
                role="tab" aria-controls="nav-contact" aria-selected="true">Tercapai</a>
        </div>
    </div>
	<!-- end of options -->

    <!-- aspirations -->
	@foreach($aspirations as $aspiration)
        @include('aspiration.aspiration_card.card', compact('aspiration'))
    @endforeach
    <!-- end of aspiraitons -->

    <!-- link -->
    {{ $aspirations->links() }}
    <!-- end link -->
</div>
@endsection
@section('title','Aspiration')
    