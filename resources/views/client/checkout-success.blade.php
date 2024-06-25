@extends('layouts.client')
@section('title', 'Succès payment')

@section('content')
    <section class="w-100 py-5" style="background-image: url('{{ asset('assets/images/background/bg-online-reservation.png') }}');">
        <!--Section heading-->
        <div class="row container px-5">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <h1 class="fs-1 text-white text-center mb-4">Réservation confirmée</h1>
            <!--Grid column-->
            <div class="col-md-12 text-center">
                <a class="btn btn-hero-section btn-lg font-montserrat px-5 text-uppercase rounded-1" href="{{ route('download-invoice', ['bookingId' => $bookingId]) }}">
                    Télécharger votre reçu de paiement
                </a>
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
