@extends('layouts.client')
@section('title', 'Galerie')

@section('content')

    <section class="w-100 bg-black position-relative">
        <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-galerie%20(1).jpg?updatedAt=1707056131593" alt=""
            class="w-100 position-relative">
        {{-- <div class="container py-5 rounded-3 ">
            <div class="p-5">
                <div class="d-block">
                    <div>
                        <h2 class="fw-bolder display-3 text-white">Explorer notre Galerie <br /> Photos et Vidéos</h2>
                    </div>
                </div>

                <div class="d-block">
                    <button type="button"
                        class="btn home_btn-hero-secrion btn-lg font-montserrat px-5 text-capitalize fw-semibold rounded-1">Galerie</button>
                </div>
            </div>
        </div> --}}
    </section>

    <!-- Gallery -->
    <section class="w-100 position-relative d-flex justify-content-center align-content-center overflow-hidden">
        <img src="{{ asset('assets/images/background/bg-online-reservation.png') }}" alt=""
            class="w-100 h-100 z-0 position-absolute">
        <div class="row position-relative z-1 container py-5">
            {{-- @foreach ($medias as $media)
                @if ($media->type == 'image')
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="/storage/{{ $media->path }}"
                        class="w-100 shadow-1-strong rounded mb-4" height="230" alt="{{ $media->title }}" /> 
                    </div>
                @else
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <iframe class="w-100 shadow-1-strong rounded mb-4" height="230" src="{{ $media->path }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                @endif
            @endforeach --}}


            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-12.jpeg?updatedAt=1707053785844"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-14.jpeg?updatedAt=1707053785494"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-11.jpeg?updatedAt=1707053784588"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-4.jpeg?updatedAt=1707053783634"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-2.jpeg?updatedAt=1707053783478"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/isnilo-6.jpeg?updatedAt=1707053783451"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-5.jpeg?updatedAt=1707053783200"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-3.jpeg?updatedAt=1707053782931"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-410.jpeg?updatedAt=1707053782605"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-9.jpeg?updatedAt=1707053782539"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-1.jpg?updatedAt=1707053781357"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-8.jpeg?updatedAt=1707053780610"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-7.jpeg?updatedAt=1707053779507"
                    class="w-100 shadow-1-strong rounded mb-4 object-fit-cover" height="230" alt="" />
            </div>
           

    </section>
    <!-- Gallery -->
@endsection
