@extends('layouts.client')
@section('title', 'Jeux')


@section('content')

    <!-- ============================================================== -->
    <!-- START GAMES CAROUSEL SECTION -->
    <!-- ============================================================== -->
    <section id="slider" class="py-5 bg-black">
        <div class="container">
            <div class="slider">
                <div class="owl-carousel">
                    {{-- @foreach ($games as $game) --}}
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <span>
                                {{-- <img src="/storage/{{ $game->image }}" alt="{{ $game->name }}" height="60%" alt=""> --}}
                                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/insilo-1.jpeg?updatedAt=1707052439321"
                                    alt="" height="60%" alt="">
                        </div>
                    </div>
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <span>
                                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/insilo-2.jpeg?updatedAt=1707052783631"
                                    alt="" height="60%" alt="">
                        </div>
                    </div>
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <span>
                                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/insilo-3.jpg?updatedAt=1707052995917"
                                    alt="" height="60%" alt="">
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- END GAMES CAROUSEL SECTION -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- START GAME DESCRIPTION SECTION -->
    <!-- ============================================================== -->

    <section class="py-5" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-around flex-row-reverse">
                <div class="col-lg-6">
                    {{-- <div class="text-center">
                        <h3 class="display-3">{{ $games[0]->name }}</h3>
                        <p class="font-montserrat">
                            {{ $games[0]->description }}
                        </p>
                    </div> --}}
                    <div class="text-center">
                        <h3 class="display-3">Description des jeux</h3>
                        <p class="font-montserrat">
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="font-montserrat">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum."
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 p-2">
                    {{-- <div class="p-5"><img src="/storage/{{ $games[0]->image }}" alt="{{ $games[0]->name }}"
                            class="img-fluid"></div> --}}
                    <div class="p-4"><img
                            src="https://ik.imagekit.io/r3dmzmb1w/insilo/insiolo-4.jpg?updatedAt=1707053155584"
                            alt="{{ $games[0]->name }}" class="img-fluid rounded-2"></div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('owl-carousel-js')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
@endsection
