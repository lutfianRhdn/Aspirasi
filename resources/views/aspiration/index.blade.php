@extends('layouts.app')

@section('content')
	 <!-- categories -->
                <div class="card">
                    <div class="card-body d-flex p-2 ml-md-2 justify-content-around">
                        <a href="" class="category d-flex m-2 flex-column">
                            <img class="img-circle m-auto img-small" src="img/pendidikan.png" alt="" title="pendidikan">
                        </a>
                        <a href="" class="category d-flex m-2 flex-column">
                            <img class="img-circle m-auto img-small" src="img/ekonomi.jfif" alt="">
                        </a>
                        <a href="" class="category d-flex m-2 flex-column">
                            <img class="img-circle m-auto img-small" src="img/politik.png" alt="">
                        </a>

                    </div>
                </div>
                <!-- end categories -->

                <!-- card -->
                <div class=" mt-4">
                    <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">

                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">populer</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Ter-Baru</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Ter-capai</a>
                    </div>
                </div>
                <div class="tab-content border h-100 p-4" id="nav-tabContent">
                    <!-- terbaru tab -->
                    <div class="tab-pane fade text-black show active" id="nav-home" role="tabpanel"
                        aria-labelledby="nav-home-tab">


                        <!-- aspiration card -->
                        <div class="card card-hover">
                            <div class="card-header ">
                                <div class="d-flex align-self-center">
                                    <img class="img-circle img-small" src="img/pendidikan.png" alt="">
                                    <h5 class=" mt-auto mb-auto ml-2 text-info"> category</h5>
                                </div>
                            </div>
                            <div class="card-body" id="">
                                <h5 class="card-title">Judul</h5>
                                <!-- text aspiration -->
                                <span class="more card-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                    officia deserunt mollit anim id est laborum.
                                </span>
                                <!-- end text Aspiration -->
                                <div class="divider"></div>
                                <div class="d-flex">

                                    <!-- like -->
                                    <div class="d-flex flex-column align-items-center">

                                        <i class="far  fa-thumbs-up text-danger" id="like"></i>
                                        <p class=" text-small text-black">25 Like</p>
                                    </div>

                                    <!-- comment -->
                                    <div class="d-flex flex-column ml-2 align-items-center">

                                        <a href="">
                                            <i class="far fa-comment text-primary"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- terPopuler tab -->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        ...
                    </div>
                    <!-- terWujud tab -->
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        ...
                    </div>
                </div>
@endsection