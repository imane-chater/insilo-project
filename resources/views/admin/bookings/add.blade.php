@extends('layouts.admin')

@section('title', "Réservations")

@section('custom-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" integrity="sha512-MQXduO8IQnJVq1qmySpN87QQkiR1bZHtorbJBD0tzy7/0U9+YIC93QWHeGTEoojMVHWWNkoCp8V6OzVSYrX0oQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Réservations</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route("admin.bookings") }}">Réservations</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <form action="{{ route("post.admin.bookings.add") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title m-b-0">Réservation</h5>
                            <div class="form-group m-t-20">
                                <label>Prix</label>
                                <input type="number" name="price" class="form-control" placeholder="Prix de la réservation" required>
                            </div>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Nom</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Nom du client" required>
                            </div>
                            @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Prénom</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Prénom du client" required>
                            </div>
                            @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email du client" required>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Nombre de joueurs</label>
                                <input type="number" name="number_of_gamers" class="form-control" placeholder="Nombre de joueurs" required>
                            </div>
                            @error('number_of_gamers')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Date et Heure Réservation</label>
                                <input type="text" class="booking_date form-control">
                                <input type="hidden" class="date-value" name="booking_date" class="booking_date form-control" required>
                            </div>
                            @error('booking_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group m-t-20">
                                <label>Pack</label>
                                <select class="form-control" name="pack_id">
                                    @foreach ($packs as $pack)
                                    <option value="{{ $pack->id }}">{{ $pack->title }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            @error('pack_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror 
                            <div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    flatpickr(".booking_date", {
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
</script>
@endsection