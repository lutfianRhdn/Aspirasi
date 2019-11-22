{{-- {{ $aspiration->user->id}} {{die}} --}}
<!-- card -->
<div class="tab-content border h-100 p-4 my-5 paralax paralax-hide" id="nav-tabContent">
    <div class="card card-hover">

        <!-- header -->
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-self-center ">
                <img class="img-circle img-small "
                    src="{{ asset('assets/img/category/'. $aspiration->aspirationCategory->image) }}" alt="">
                <h5 class=" mt-auto mb-auto ml-2 text-category text-info"> {{ $aspiration->aspirationCategory->category }}</h5>
            </div>

            <div class="text-about row text-right">
                <div class="col-xs-6">
                    {{ $aspiration->created_at->diffForHumans()}}&nbsp;

                </div>
                <div class="col-xs-6 ">
                    {{-- {{ $aspiration }} --}}
                    @if ($aspiration->is_anonim == 0 )
                    {{-- {{ $aspiration->user['name'] }} --}}
                    by <a href="{{ route('aspirations.user', intval($aspiration->user['id'])) }}">
                        {{ $aspiration->user['name'] }}
                    </a>

                    @else

                    by anonim
                    @endif

                </div>
            </div>
        </div>
        <!-- end of header -->

        <!-- body -->
        <div class="card-body" id="">

            <!-- aspiration title -->
            <h5 class="card-title">{{ $aspiration->title }}</h5>
            <!-- end of aspiration title -->

            <!-- aspiration content -->
            <span class="card-text @if(request()->segment(3)=='show') aspiration-text @endif">
                @if(request()->segment(3) == 'show')
                {{ $aspiration->aspiration }}
                @else
                {{ substr($aspiration->aspiration, 1,256)  }}<a href="{{ route('aspirations.show', $aspiration->id) }}">
                    read more...</a>
                @endif
            </span>
            <!-- end of aspiration content-->

            <div class="divider"></div>

            <!-- footer aspiration card -->
            <div class="d-flex">

                <!-- upvote -->
                <div class="d-flex flex-column align-items-center">
                    @if(auth()->check())
                        @php
                        $upvote = DB::table('upvotes')->where('aspiration_id', $aspiration->id)->where('user_id',
                        auth()->user()->id)->get();
                        @endphp

                        {{-- jika belum like --}}
                        @if($upvote->count() <= 0) 
                            {{-- <a href="{{ route('aspirations.upvote', $aspiration->id) }}">
                                <i class="far  fa-thumbs-up text-danger"  id="like"></i>
                            </a> --}}
                            <a href="#myModal" data-toggle="modal" data-target="#myModal">
                                <i class="far  fa-thumbs-up text-danger"  id="like"></i>
                            </a>

                        @else
                            {{-- jika sudah like --}}
                            <i class="fas fa-thumbs-up text-danger"></i>
                        @endif

                    @else
                        <a href="#myModal" data-toggle="modal" data-target="#myModal">
                            <i class="far  fa-thumbs-up text-danger" id="like"></i>
                        </a>
                    @endif





                        <p class=" text-small text-black">{{ $aspiration->upvotes_count }} upvotes</p>
                        {{-- {{ $aspiration->user->id }} {{die}} --}}
                        @if(auth()->check() AND ( Auth::id() === $aspiration->user['id'] OR auth()->user()->is_admin ==
                        1))
                        <form action="{{ route('aspirations.delete', $aspiration->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="badge badge-danger">delete</button>

                        </form>
                        @endif
                </div>
                <!-- end of upvots -->

                <!-- comment -->
                <div class="d-flex flex-column ml-2 align-items-center">

                    <a href="">
                        <i class="far fa-comment text-primary"></i>
                    </a>
                </div>
            </div>


            @if(request()->segment(3) == 'show')
            {{-- comments --}}
            <form action="{{ route('aspirations.comment') }}" method="POST" class="d-flex">
                @csrf
                <input type="hidden" name="aspiration_id" value="{{ $aspiration->id }}" id="">
                <input type="text" name="comment" class="w-100 flex-1 border-trl-0" id="">
                <button type="submit" class="fas bg-transparent border-0 fa-paper-plane button-comment"></button>
            </form>
            {{-- end of comment --}}

            {{-- comments kontent --}}
            @foreach($aspiration->comments as $comment)
            <div class="d-flex flex-row border p-4 mt-4">

                <div class="profile">
                    <img src="{{ asset('storage/profile_images/' . $comment->user->profile_image) }}"
                        class="img-small img-circle" alt="">
                </div>
                <div class="d-flex flex-column ml-3">
                    <a href="" class="text-small"> {{ $comment->user->name }}</a>
                    <p>{{ $comment->comment }} </p>
                </div>
            </div>
            @endforeach
            {{-- end of content comments --}}

            {{-- end of comments --}}

            @endif
            <!-- end of footer aspiration card -->
        </div>
        <!-- end of aspiration bocy -->
    </div>
</div>
<!-- end of card -->


@if(auth()->check())
<!-- The Modal -->
<div class="modal text-left" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Aspirasi</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p>
                    Bantu {{ $aspiration->is_anonim == 1 ? 'seseorang' : $aspiration->name  }} untuk mewujudkan aspirasinya untuk Indonesia yang lebih baik dengan memberikan upvotemu. Setiap 10 upvote yang diberikan berarti 10 kemungkinan aspirasi akan terwujud
                </p>
                <form action="{{ route('aspirations.upvote', $aspiration->id) }}" method="GET">
                    @csrf
                    <div class="form-group">    
                        <label for="pesan">Pesanmu</label>
                        <textarea name="pesan"  placeholder="Berikan Aspirasimu..." class="form-control"></textarea>
                        @if($errors->has('pesan'))
                            {{ $errors->first }}
                        @endif
                    </div> 
                    <button type="submit" class="btn mt-3 btn-primary" name="submit">Submit</button>

                </form>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer d-flex">
                <a href="">
                    
                </a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@else
<!-- The Modal -->
<div class="modal text-left" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Aspirasi</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p>Dengan aspirasi terbaikmu, kamu dapat membuat indonesia lebih baik kedepannya. Sebelumnya                 <a href="{{ route('login') }}">Login</a> terlebih dahulu.</p>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer d-flex">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@endif
