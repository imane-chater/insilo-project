@extends('layouts.client')
@section('title', 'Contact')

@section('content')
    <section class="w-100 py-5" style="background-image: url('{{ asset('assets/images/background/bg-online-reservation.png') }}');">
        <!--Section heading-->
        <h2 class="fs-1 text-white text-center mb-4">pour nous contacter</h2>
        <div class="row container px-5">

            <!--Grid column-->
            <div class="col-md-6 mb-md-0 mb-5">
                <form id="contact-form" action="{{  route('send-message') }}" name="contact-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-4">
                                <input type="text" name="sender" class="form-control rounded-1" placeholder="Nom">
                            </div>
                            @error('sender')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-4">
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-4">
                                <input type="text" name="subject" class="form-control" placeholder="Objet">
                            </div>
                            @error('subject')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">
                            <div class="md-form mb-4">
                                <textarea id="monInput" name="message" type="text" rows="5" class="form-control md-textarea" placeholder="Message"></textarea>
                            </div>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="text-center text-md-left my-5">
                        <button type="submit"
                            class="btn home_btn-hero-secrion btn-lg font-montserrat px-5 text-capitalize fw-semibold rounded-1">ENVOYER</button>
                    </div>
                </form>
                @if(session('success'))
                    <div class="status">{{  session('success') }}</div>
                @elseif(session('error'))
                    <div class="status">{{  session('error') }}</div>
                @endif
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
