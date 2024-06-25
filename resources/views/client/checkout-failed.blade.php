@extends('layouts.client')
@section('title', 'Contact')

@section('content')
    <section class="w-100 py-5" style="background-image: url('{{ asset('assets/images/background/bg-online-reservation.png') }}');">
        <!--Section heading-->
        <h2 class="fs-1 text-white text-center mb-4">pour nous contacter</h2>
        <div class="row container px-5">

            <!--Grid column-->
            <div class="col-md-6 mb-md-0 mb-5">
                <p class="alert alert-danger">Paiement annulé - Echec Réservation</p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-envelope mt-4 fa-2x contact-icon"></i>
                        <p class="lead mt-2 text-white">contact@lazer-quest.com</p>
                    </li>
                    <li><i class="fas fa-phone mt-4 fa-2x text-white contact-icon"></i>
                        <p class="lead mt-2 text-white">0032 6 56 78 98 54</p>
                    </li>
                </ul>
            </div>
        </div>

    </section>
@endsection
