<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fc7fc33899.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @yield('custom-css')

    <title>@yield('title')</title>

</head>

<body class="overflow-x-hidden">
    <nav class="navbar navbar-expand-lg bg-navbar py-0" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/logo.svg') }}" class="logo-header" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-lg-5 fs-5">
                        <a class="nav-link active" aria-current="page" href="/">ACCUEIL</a>
                    </li>
                    <li class="nav-item me-lg-5 fs-5">
                        <a class="nav-link" aria-current="page" href="/rules">JEUX</a>
                    </li>
                    <li class="nav-item me-lg-5 fs-5">
                        <a class="nav-link" aria-current="page" href="/gallery">GALERIE</a>
                    </li>
                    <li class="nav-item me-lg-5 fs-5">
                        <a class="nav-link" aria-current="page" href="/booking">RÉSERVATION</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link" aria-current="page" href="/contact">CONTACT</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <footer style="background: #F0EFEF;">
        <div class="footer-one py-5 w-100">
            <div class="container fs-4">
                <div class="row">
                    <div class="col d-flex justify-content-center ">
                        <img src="{{ asset('assets/images/logo.svg') }}" class="logo-footer" alt="logo">
                    </div>
                    <div class="col d-flex justify-content-center ">
                        <ul class="ul-footer">
                            <li class="font-montserrat fs-4">Jeux</li>
                            <li class="font-montserrat fs-4">Galerie</li>
                            <li class="font-montserrat fs-4">Réservation</li>
                            <li class="font-montserrat fs-4">Contact</li>
                        </ul>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="socialMedia-footer d-flex gap-3">
                            <i class="fa-brands fa-square-instagram"></i>
                            <i class="fa-brands fa-square-facebook"></i>
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </footer>
    <div class="footer-two d-flex justify-content-center align-items-center pt-3">
        <p class="font-montserrat">© Tous droits réservés - 2023 Insilo Lazer-quest | Conditions générales </p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('dist/js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    @yield('custom-scripts')
</body>

</html>
