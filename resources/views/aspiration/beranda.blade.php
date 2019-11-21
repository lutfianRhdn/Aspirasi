@extends('layouts.app')

@section('content')
<div class="container  p-3 mt-5">

    <!-- categories -->
    @include('layouts.category')
    <!-- end of categories -->

    <!-- options -->
    <div class=" mt-4">
        <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
            <a class="nav-item nav-link" id="nav-contact-tab"
                href="{{ route('aspirations.beranda', ['o' => 'popular', 'c' => request('c')] ) }}" role="tab"
                aria-controls="nav-contact" aria-selected="false">Populer</a>

            <a class="nav-item nav-link" href="{{ route('aspirations.beranda', ['o' => 'new', 'c' => request('c')] ) }}"
                role="tab" aria-controls="nav-profile" aria-selected="false">Terbaru</a>

            <a class="nav-item nav-link"
                href="{{ route('aspirations.beranda', ['o' => 'accepted', 'c' => request('c')]) }}" role="tab"
                aria-controls="nav-contact" aria-selected="true">Tercapai</a>
        </div>
    </div>
    <!-- end of options -->

    <!-- aspirations -->

    @foreach($aspirations as $aspiration)
        @include('aspiration.aspiration_card.card',compact('aspiration'))
    @endforeach
    @php
    $aspirations = [];
    @endphp


    {{-- @include('aspiration') --}}

    <!-- link -->
    {{-- {{ $aspirations->links() }} --}}
    <!-- end link -->
    <div id="test"></div>
    <button id="load-more">more...</button>
    
    <img src="{{ asset('assets/loader.gif') }}" class="loader m-auto" id="loader" alt="">
</div>
<div class=" w-100v">

</div>


<script>
    $(document).ready(function () {
        // alert('ok')
        let categories = "{{request('o') !== null ? request('o') : 'popular'}}"
        // console.log(categoriess)
        let categoriess = {{request('c') !== null ? request('c') : 1}}
        let number = {{request('page') !== null ? request('page') : 2}};

        // let aspirationss = '';
        $("#load-more").on('click', function () {
            $.ajax({
                url: " {{ url('aspirations/get-ajax?page=' )}}" + number + "&o=" + categories +
                    "&c=" + categoriess,
                type: "GET",
                beforeSend: function () {
                    $('#loader').show()
                },
                complete: function () {
                    $('#loader').hide()
                },
                success: function (a) {
                    // alert('ok')
                    // console.log(a)

                    aspirations = a.html
                    $('#test').append(`${a}`)
                    // let
                    // $('.paralax-hide').each(i => {
                    //     // i /= number
                    //     console.log(i)
                    //     setTimeout(() => {
                    //         $('.paralax-hide').eq(i).addClass('paralax-show');
                    //         $('.paralax').eq(i).removeClass('paralax-hide');
                    //     }, 1000 * i);
                    // })
                    $('.paralax').addClass('paralax-hide')
                    $('.paralax-hide').each(e => {
                        let i = (1000 * e)
                    setTimeout(() => {
                            $('.paralax-hide').eq(e).addClass('paralax-show');
                            $('.paralax').eq(e).removeClass('paralax-hide');
                        }, i  );
                    })

                    number++
                    // console.log(i);
                }
            })
            // $('#test').append("<h1>sdfdsffsdf</h1>")
        });
    });

</script>
@endsection
@section('title','Beranda')
