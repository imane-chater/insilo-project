@extends('layouts.client')
@section('title', 'Accueil')

@section('content')
    <div class="bg-black vw-100 vh-100 position-fixed top-0 start-0 loader-wrapper">
        <video autoplay muted class="w-100 object-fit-cover">
            <source src="{{ asset('assets/video/intro.mp4') }}" type="video/mp4">
        </video>
    </div>
    <!-- ============================================================== -->
    <!-- START HERO SECTION -->
    <!-- ============================================================== -->
    <section class="w-100 bg-black py-5 py-lg-0" data-aos="fade-right">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-xl-6 mb-lg-0 h-100">
                <img class="img-fluid position-relative" style="left: -5rem"
                    src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/insilo-herp-2.png?updatedAt=1707059001706" srcset="" alt=""
                    loading="lazy">
            </div>

            <div class="col-12 col-xl-5 mx-auto">
                <div>
                    <h1 class="fw-bolder font-montserrat text-white display-3 text-capitalize mb-0"
                        style="letter-spacing: -2px !important" data-aos="fade-down">
                        insilo</h1>
                    <h1 class="fw-medium font-montserrat text-white text-uppercase display-4"
                        style="letter-spacing: 0.5rem !important" data-aos="fade-down">Lazer-Quest</h1>
                </div>
                <div class="mb-3 me-lg-5">
                    <h1 class="font-montserrat text-white lead fw-light py-3">Domptez le Labyrinthe laser et incarnez le
                        héros suprême. Unissez vos forces en équipe, affrontez les obstacles et triomphez de vos adversaires
                        pour atteindre la gloire et la victoire.
                    </h1>
                </div>
                <div class="d-grid gap-3 d-lg-block">

                    <a type="button" href="{{ route('booking') }}"
                        class="btn home_btn-hero-secrion btn-lg font-montserrat px-5 text-capitalize fw-semibold rounded-1">Réservation</a>
                </div>
            </div>
    </section>
    <!-- ============================================================== -->
    <!-- END HERO SECTION -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- START GAME INFOS SECTION -->
    <!-- ============================================================== -->

    <section class="py-5 py-xl-8" style="background: #F0EFEF">
        <div class="container overflow-hidden">
            <div class="row gy-5 gx-md-4 gy-lg-0 gx-xxl-5 justify-content-center">
                {{-- CARD INFO ONE --}}
                <div class="col-11 col-sm-6 col-lg-3 text-center " data-aos="fade-down" data-aos-duration="500">
                    <div class="badge p-3 mb-4">
                        <img src="{{ asset('assets/images/labyrinth.png') }}" alt="" class="icon-cards-info">
                    </div>
                    <h4 class="mb-3 font-montserrat title-cards-color fw-medium">Concept du jeu</h4>
                    <p class="mb-3 text-secondary font-montserrat">Le laser game est un jeu d’équipe amusant où les
                        participants se trouvent
                        dans un labyrinthe avec des obstacles et doivent tirer au laser sur leurs adversaires</p>
                </div>
                {{-- CARD INFO TWO --}}
                <div class="col-11 col-sm-6 col-lg-3 text-center " data-aos="fade-down" data-aos-duration="1000">
                    <div class="badge p-3 mb-4">
                        <img src="{{ asset('assets/images/community.png') }}" alt="" class="icon-cards-info">
                    </div>
                    <h4 class="mb-3 font-montserrat title-cards-color fw-medium">Qui peut participer?</h4>
                    <p class="mb-3 text-secondary font-montserrat">Aussi bien les enfants que les adultes peuvent participer
                        au laser game.
                        Âge : à partir de 6 ans</p>
                </div>
                {{-- CARD INFO THREE --}}
                <div class="col-11 col-sm-6 col-lg-3 text-center " data-aos="fade-down" data-aos-duration="1500">
                    <div class="badge p-3 mb-4">
                        <img src="{{ asset('assets/images/target.png') }}" alt="" class="icon-cards-info">
                    </div>
                    <h4 class="mb-3 font-montserrat title-cards-color fw-medium">Règle du jeu</h4>
                    <p class="mb-3 text-secondary font-montserrat">L’objectif consiste à accumuler des points en tirant sur
                        les membres de l’équipe adverse à l’aide de faisceaux laser émis par des pistolets spéciaux</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- END GAME INFOS SECTION -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- START EXPLORE GAMES SECTION -->
    <!-- ============================================================== -->

    <section
        class="text-center d-flex justify-content-center align-content-center position-relative overflow-hidden">
        <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/Black%20and%20White%20Simple%20Coming%20Soon%20Facebook%20Cover%20(3).jpg?updatedAt=1707059391323" alt=""
            class="w-100">
        <div class="position-absolute w-100 h-100 d-flex justify-content-center align-content-center"
            style="padding: 12rem 0;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white" data-aos="zoom-in">
                    <h1 class="mb-3">pret à relever le défi du laser game et des énigmes?</h1>
                    <h4 class="mb-3 font-montserrat fs-2 fw-light " style="letter-spacing: 0.5rem">L’aventure vous attend !
                    </h4>
                    <a type="button" href="{{ route('rules') }}"
                        class="btn home_btn-hero-secrion btn-lg font-montserrat px-5 text-capitalize fw-semibold rounded-1">Jeux
                        & énigmes</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- END EXPLORE GAMES SECTION -->
    <!-- ============================================================== -->

    <section class="px-2 position-relative bg-black" style="padding: 12rem 0;">
        <img src="https://ik.imagekit.io/r3dmzmb1w/insilo/Galerie/Black%20Transparent%20Corporate%20Personal%20Profile%20Instagram%20Post%20(1).png?updatedAt=1707059670517" alt=""
            class="position-absolute z-0 end-0 bottom-0 h-100">
        <div class="container position-relative z-3" data-aos="fade-right" data-aos-duration="2000">
            <div class="row">
                <div class="col-12 col-md-9 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-0 text-white display-2">explore notre galerie</h2>
                    <h3 class="fs-2 font-montserrat text-white mb-4">Photos et videos</h3>
                    <a type="button" href="{{ route('gallery') }}"
                        class="btn home_btn-hero-secrion btn-lg font-montserrat px-5 text-capitalize fw-semibold rounded-1">Galerie</a>
                </div>
            </div>
        </div>
    </section>


    <script>
        $(window).on("load", function() {
            var $loaderWrapper = $(".loader-wrapper");
            setTimeout(function() {
                $loaderWrapper.fadeOut("slow");
            }, 4000);
        });
    </script>
@endsection
