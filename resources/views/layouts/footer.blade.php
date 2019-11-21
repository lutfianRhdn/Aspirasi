<!-- footer -->
<footer class=" footer w-100 text-white-50 bg-dark bottom-10 ">
    <div class="d-flex p-5 justify-content-between">

        <!-- left footer -->
        <div class="ml-md-5">
            <h4>Hubungi kami</h4>
            <hr class="w-100 border-white-50">
            <div class=" d-flex flex-column ">
                <div class="d-flex align-items-center">
                    <i class="fab fa-instagram fa-1x mr-2"></i>
                    <a href="" class="text-white-50">instagram</a>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fab fa-whatsapp fa-1x mr-2"></i>
                    <a href="" class="text-white-50">whatsapp</a>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-envelope fa-1x mr-2"></i>
                    <a href="mailto:RakyatAspiration@gmail.com" target="_blank" class="text-white-50">Email</a>
                </div>
            </div>
        </div>
        <!-- end of left -->

        <!-- right footer -->
        <div class="mr-md-5">

            <h4>Tentang kami</h4>
            <hr class="w-100 border-white-50">
            <div class=" d-flex flex-column ml-3">
                <div class="d-flex align-items-center">
                    <i class="far fa-user"></i>
                    <a href="{{ route('profile') }}" class="text-white-50 ml-2">Profile</a>
                </div>
                <div class="d-flex align-items-center">
                    <i class="far fa-address-card"></i>
            <a href="{{route('about')}}" class="text-white-50 ml-2">About</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end of right -->

    <!-- bottom footer -->
    <p class="text-center  mt-4 mb-0"> &copy;Sans Skuy CopyRight 2019</p>
    <!-- end of bottom -->

</footer>
<!-- end of footer -->