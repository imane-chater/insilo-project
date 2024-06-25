@extends('layouts.client')
@section('title', 'Réservation')

@section('custom-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" integrity="sha512-MQXduO8IQnJVq1qmySpN87QQkiR1bZHtorbJBD0tzy7/0U9+YIC93QWHeGTEoojMVHWWNkoCp8V6OzVSYrX0oQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- START HERO SECTION -->
    <!-- ============================================================== -->
    <section class="w-100 position-relative bg-black d-flex justify-content-center align-items-center overflow-hidden"
        style="height: 75vh">
        <img src="{{ asset('assets/images/background/bg-hero-section.png') }}" alt=""
            class="vh-100 position-absolute opacity-50">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="container position-relative">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-11 col-lg-9 col-xl-7 col-xxl-6 text-center text-white" data-aos="fade-up"
                    data-aos-duration="1000">
                    <h1 class="display-3 mb-3">Prêt à relever le défi?</h1>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <button type="button"
                            class="btn btn-hero-section btn-lg font-montserrat px-5 text-uppercase rounded-1">Reserver</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 h-25 position-absolute bg-gradient-bttom"></div>
    </section>
    <!-- ============================================================== -->
    <!-- END HERO SECTION -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- START RESERVATION CARDS SECTION -->
    <!-- ============================================================== -->
    <section class="w-100 p-5 bg-black d-flex reserver-cards d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row gap-5">
                @foreach ($packs as $pack)
                    <div onclick="selectPack({{ $pack->id }})" class="col d-flex justify-content-center position-relative curs">
                        <div class="h-100 position-absolute bg-reserver-card card" style="width: 20rem;"></div>
                        <div class="card text-center py-5 reserver-card text-white d-flex flex-column justify-content-center align-items-center"
                            style="width: 20rem;">
                            <img src="{{ asset('assets/images/icon.png') }}" alt="" class="card-header-icon mb-5">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mb-3">{{ $pack->title }}</h5>
                                <h5 class="fs-1">{{ $pack->price }}€</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

    <!-- ============================================================== -->
    <!-- END RESERVATION CARDS SECTION -->
    <!-- ============================================================== -->

    <section class="w-100 position-relative d-flex flex-column justify-content-center align-items-center overflow-hidden">
        <img src="{{ asset('assets/images/background/bg-online-reservation.png') }}" alt="" height="80%"
            height="auto" class="bg-reservation-enlign">
        <div class="glass mx-4 container-sm rounded-4">
            <div class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                <h1 class="text-white pb-5 pt-5">RÉSERVATION EN LIGNE</h1>
            <form action="{{ route('book') }}" method="POST">
                @csrf
                <input type="hidden" name="pack_id" />
                <div class="row mb-3">
                    <label class="col-6 form-label text-white pe-3 fs-2" for="inputTitle">Nom:</label>
                    <div class="col-6">
                        <input placeholder="Nom" name="first_name" type="text" class="form-control fs-4 ">
                    </div>
                </div>
                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
                <div class="row mb-3">
                    <label class="col-6 form-label text-white pe-3 fs-2" for="inputTitle">Prénom:</label>
                    <div class="col-6">
                        <input placeholder="Prénom" name="last_name" type="text" class="form-control fs-4 ">
                    </div>
                </div>
                @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
                <div class="row mb-3">
                    <label class="col-6 form-label text-white pe-3 fs-2" for="inputTitle">Email:</label>
                    <div class="col-6">
                        <input name="email" placeholder="Email" type="email" class="form-control fs-4 ">
                    </div>
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
                <div class="row mb-3">
                    <label class="col-6 form-label text-white pe-3 fs-2" for="inputTitle">Nombre de joueurs:</label>
                    <div class="col-6">
                        <input name="number_of_gamers" placeholder="Nombre de Joueurs" type="number" class="form-control fs-4 ">
                    </div>
                </div>
                @error('number_of_gamers')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
                <div class="row mb-3">
                    <label class="col-6 form-label text-white pe-3 fs-2" for="inputTitle">Pack</label>
                    <div class="col-6">
                        <select class="form-control fs-4" name="pack_id">
                            @foreach ($packs as $pack)
                            <option value="{{ $pack->id }}">{{ $pack->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                @error('pack_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
                <div class="row mb-3">
                    <label class="col-6 form-label text-white pe-3 fs-2" for="inputTitle">Date de réservation:</label>
                    <div class="col-6">
                      <input id="booking_date" placeholder="Date Réservation" class="form-control fs-4">
                      <input type="hidden" class="date-value form-control fs-4" name="booking_date" required>
                    </div>
                    @error('booking_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror 
                    <div class="d-flex justify-content-center pb-5 pt-3">
                        <button type="submit"
                        class="btn home_btn-hero-secrion btn-lg font-montserrat px-5 text-capitalize fw-semibold rounded-1">RÉSERVER</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    flatpickr("#booking_date", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        onChange: function(selectedDates, dateStr, instance) {  
            $('.date-value').val(dateStr);
        },
        disable: [
            function (date) {
               return [0, 1, 2, 3, 4, 5].includes(date.getDay());
            }
        ],
    });

    const selectPack = (packId) => {
        
    }
</script>
@endsection
