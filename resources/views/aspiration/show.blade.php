@extends('layouts.app')

@section('content')
<main>
    {{-- {{ $notification }} --}}
	<div class="container">
        <!-- tab -->
        <div class="tab-pane fade text-black show active" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab">
            <!-- aspiration -->
                @include('aspiration.aspiration_card.card', compact('aspiration'))
            <!-- end of aspiraiton -->
        </div>
        <!-- end of tab -->
	</div>
</main>
@endsection
@section('title','Lihat Aspirasi')
