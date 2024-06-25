@extends('layouts.admin')

@section('title', "Réservations")

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
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
                            <li class="breadcrumb-item active" aria-current="page">Réservations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <a type="button" href="{{ route('admin.bookings.add') }}" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i>Ajouter une réservation</a>
        <div class="row">
            <div class="col-12">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Détails Réservations</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Prix</th>
                                        <th>Nom du client</th>
                                        <th>Prénom du client</th>
                                        <th>Email du client</th>
                                        <th>Nombre de Joueurs</th>
                                        <th>Pack</th>
                                        <th>Date Réservation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @forelse ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->price }}</td>
                                            <td>{{ $booking->client->last_name }}</td>
                                            <td>{{ $booking->client->first_name }}</td>
                                            <td>{{ $booking->client->email }}</td>
                                            <td>{{ $booking->number_of_gamers }}</td>
                                            <td>{{ $booking->pack->title }}</td>
                                            <td>{{ $booking->booking_date }}</td>
                                            <td>
                                                <a type="button" href="{{ route("admin.bookings.update", ["id" => $booking->id]) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i>Détails</a>
                                                <a type="button" href="{{  route("admin.bookings.delete", ['id' => $booking->id]) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-circle"></i>Supprimer</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="7">Aucune réservations</td></tr>
                                    @endforelse 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Prix</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Nombre de Joueurs</th>
                                        <th>Pack</th>
                                        <th>Date Réservation</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="{{  asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
<script src="{{  asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
<script src="{{  asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>
@endsection